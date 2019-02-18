<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avaliation;
use App\User;
use Auth;
use DB;
use App\Http\Resources\AvaliationResource;
use App\Http\Requests\AvaliationRequest;

class AvaliationController extends Controller
{
  public function index(){
      return AvaliationResource::collection(Avaliation::all());
  }

  public function store(AvaliationRequest $request){
      $avaliation = new Avaliation;
      $avaliation->newAvaliation($request);
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

  public function createAvaliation(AvaliationRequest $request){
    $user = Auth::user();
    $avaliation = new Avaliation;
    $avaliation->comment = $request->comment;
    $avaliation->grade = $request->grade;
    $avaliation->id_user_measurer = $user->id;
    $avaliation->id_user_measured = $request->id_user_measured;

    $avaliation->save();
    return new AvaliationResource($avaliation);
  }

  public function listAvaliations(){
    $user = Auth::user();
    return $user->avaliations()->get();
  }
}
