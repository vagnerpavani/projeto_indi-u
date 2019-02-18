<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function newProject($request){
      $this->name = $request->name;
      $this->description = $request->description;
      $this->user_id = $request->user_id;

      $this->save();
    }

    public function changeProject($request){
      if($request->name)
        $this->name = $request->name;
      if($request->description)
        $this->description = $request->description;
      if($request->user_id)
        $this->user_id = $request->user_id;

      $this->save();
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function workers(){
      return $this->belongsToMany('App\User');
    }

    public function works(){
      return $this->hasMany('App\Work');
    }
}
