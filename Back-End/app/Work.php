<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    //Relaciona projetos aos usuários.

    //cria uma nova vaga(relação usuario/projeto).
  public function newWork($request){
    $this->duty = $request->duty;
    $this->user_id = $request->user_id;
    $this->project_id = $request->project_id;

    $this->save();
  }

    //altera dados da vaga.
  public function changeWork($request){
    if($request->duty)
      $this->duty = $request->duty;
    if($request->user_id)
      $this->user_id = $request->user_id;
    if($request->project_id)
      $this->project_id = $request->project_id;

    $this->save();
  }
}
