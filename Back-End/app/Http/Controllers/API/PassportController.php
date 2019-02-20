<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use App\Notifications\Register;
use App\Notifications\Edit;
use App\Notifications\Delete;
use Auth;
use App\User;
use App\Project;
use App\Work;
use DB;

class PassportController extends Controller
{
    public $successStatus = 200;

    public function login(){ //retorna o Token para authenticaçao do usuario
                            //que já estiver cadastrado no banco de dados.
        if (Auth::attempt(['email' => request('email'), 'password' =>request('password')])){

            $user = Auth::user();
            $success['token'] = $user -> createToken('MyApp') -> accessToken;
            return response() -> json(['success' => $success], $this ->successStatus);

        }
        else {
        return response() -> json (['error' => 'Unauthorised'], 401);
        }
    }

    //Cria a conta do usuario(registra no banco de dados),loga o usuario e gera um Token.
    public function register(UserRequest $request) {

        $newUser = new User;
        $newUser->name = $request->name;
        $newUser->username = $request->username;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);

        //checa para saber se foi passado um aquivo de foto e salva caso tenha sido.
        if($request->picture){
          $newUser->picture = $request->picture;


          $file = $request->file('picture');
          $filename = 'pic.'.$file->getClientOriginalExtension();

          if (!Storage::exists('localPhotos/')){
              Storage::makeDirectory('localPhotos/',0775,true);
          }

          $path = $file->storeAs('localPhotos', $filename);
          $newUser->picture = $path;
        }

        $newUser->save();
        $newUser->notify(new Register($newUser));
        $success['token'] = $newUser->createToken('MyApp')->accessToken;
        $success['name'] = $newUser->name;
        return response() -> json(['success' => $success], $this ->successStatus);
    }

    //Função para pegar as informações do usuário logado.
    public function getDetails() {
        $user = Auth::user();
        return response()->json(['success' => $user], $this ->
        successStatus);
    }

    public function logout(){ //expira o token do usuario para ele deslogar.
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id',
        $accessToken->id)->update(['revoked' => true]);
        $accessToken->revoke();
        return response()->json( null, 204);
    }

    //Função para o usuário logado atualizar os próprios dados.
    public function selfUpdate(UserRequest $request){
        $user = Auth::user();
        $user->notify(new Edit($user));
        $user->updateUser($request);
        return response()->json([$user]);
    }

    //Função para o usuário logado deletar a propria conta.
    public function selfDelete(){
        $user = Auth::user();
        $user->notify(new Delete($user));
        User::destroy($user);
        return response()->json(["O usuário $user->username foi deletado."]);
    }

    //Mostra os projetos.
    public function getProjects(){
      return Project::all();
    }

    //Mostra os usuarios do site filtrando os dados.
    public function getUsers(){
        return UserResource::collection(User::all());
    }


    //Pega foto do usuário logado
    public function getSelfPic(){
        $user = Auth::user();
        return response()->download(storage_path('app/'.$user->picture));
    }


}
