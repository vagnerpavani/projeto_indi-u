<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Notifications\Register;
use Auth;
use App\User;
use DB;

class PassportController extends Controller
{
    public $successStatus = 200;

    public function login(){
        if (Auth::attempt(['email' => request('email'), 'password' =>
        request('password')])){

        $user = Auth::user();
        $success['token'] = $user -> createToken('MyApp') -> accessToken;
        return response() -> json(['success' => $success], $this ->
        successStatus);
        }
        else {
        return response() -> json (['error' => 'Unauthorised'], 401);
        }
    }

    public function register(UserRequest $request) {

        $newUser = new User;
        $newUser->name = $request->name;
        $newUser->username = $request->username;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        $newUser->language = $request->language;
        $newUser->save();
        $newUser->notify(new Register($newUser));
        $success['token'] = $newUser->createToken('MyApp')->accessToken;
        $success['name'] = $newUser->name;
        return response() -> json(['success' => $success], $this ->
        successStatus);
    }

    public function getDetails() {
        $user = Auth::user();
        return response() -> json(['success' => $user], $this ->
        successStatus);
    }

    public function logout(){
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id',
        $accessToken->id)->update(['revoked' => true]);
        $accessToken->revoke();
        return response()->json( null, 204);
    }

    public function selfUpdate(UserRequest $request){
        $user = Auth::user();
        $user->updateUser($request);
        return response()->json([$user]);
    }

    public function selfDelete(){
        $user = Auth::user();
        User::destroy($user);
        return response()->json(["O usuário $user->username foi deletado."]);
    }
}
