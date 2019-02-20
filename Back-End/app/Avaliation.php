<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliation extends Model
{

    //Função para criar avaliação: usuario para usuario.
  public function newAvaliation($request, $date){
    $this->comment = $request->comment;
    $this->grade = $request->grade;
    $this->grade = $date;
    $this->id_user_measurer = $request->id_user_measurer;
    $this->id_user_measured = $request->id_user_measured;

    $this->save();
  }

  //Atualiza a avaliação.
  public function changeAvaliation($request){
    if($request->comment)
      $this->comment = $request->comment;
    if($request->grade)
      $this->grade = $request->grade;

    $this->save();
  }

  public function user(){
    return $this->belongsTo('App\User');
  }
}
