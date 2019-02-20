<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avaliation;
use App\User;
use Auth;
use DB;
use App\Http\Resources\AvaliationResource;
use App\Http\Requests\AvaliationRequest;
use Carbon\Carbon;

class AvaliationController extends Controller
{
    // -------CRUD--------//
  public function index(){
      return AvaliationResource::collection(Avaliation::all());
  }

  public function store(AvaliationRequest $request){
      $date = new Carbon();
      $avaliation = new Avaliation;
      $avaliation->newAvaliation($request, $date);
      return new AvaliationResource($avaliation);
  }

  public function show($id){
      $avaliation = Avaliation::findOrFail($id);
      return new AvaliationResource($avaliation);
  }

  public function update(AvaliationRequest $request, $id){
      $avaliation = Avaliation::findOrFail($id);
      $avaliation->changeAvaliation($request);
      return new AvaliationResource($avaliation);
  }

  public function destroy($id){
    $avaliation = Avaliation::findOrFail($id);
    Avaliation::destroy($id);
    return response()->json("A validação do usuário $avaliation->id_user_measured para o usuário $avaliation->id_user_measurer foi deletada com sucesso!");
  }
  //-------------------------------------------------//

 // Cria avalição do usuário logado para outro usuário.
  public function createAvaliation(AvaliationRequest $request){
    $date = new Carbon();
    $user = Auth::user();

    $avaliation = new Avaliation;
    $avaliation->comment = $request->comment;
    $avaliation->grade = $request->grade;
    $avaliation->date = $date;
    $avaliation->id_user_measurer = $user->id;
    $avaliation->id_user_measured = $request->id_user_measured;

    $avaliation->save();
    return new AvaliationResource($avaliation);
  }

  //mostra as avaliações do usuário.
  public function listAvaliations(){
    $user = Auth::user();
    return $user->avaliations()->get();
  }

  //retorna um numero inteiro tirado arredondando a media das avalições.
  public function getGrade(){
    $user = Auth::user();
    $notas = $user->avaliations()->get();
    $sum = 0;
    $arraySize = count($notas);

    if($arraySize > 0){
      foreach($notas as $nota){
        $sum += $nota->grade;
      }

      $average = round(($sum/$arraySize));
      return $average;
    }

    return response()->json('Você não possui avaliações');
  }
}
