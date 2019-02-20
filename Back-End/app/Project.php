<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    //Função para o usuario criar um projeto.
    public function newProject($request){
      $this->name = $request->name;
      $this->description = $request->description;
      $this->user_id = $request->user_id;

        //atribui a foto ao projeto, se o request da foto for feito.

      if($request->picture){
        $this->picture = $request->picture;
        $file = $request->file('picture');
        $filename = 'pic.'.$file->getClientOriginalExtension();

        if (!Storage::exists('localPhotos/')){
            Storage::makeDirectory('localPhotos/',0775,true);
        }

        $path = $file->storeAs('localPhotos', $filename);
        $this->picture = $path;
      }
      $this->save();
    }


    // Altera|Atualiza os dados do projeto.
    public function changeProject($request){
        if($request->name)
            $this->name = $request->name;
        if($request->description)
            $this->description = $request->description;
        if($request->user_id)
            $this->user_id = $request->user_id;

        if($request->picture){
            $this->picture = $request->picture;
            $file = $request->file('picture');
            $filename = 'pic.'.$file->getClientOriginalExtension();

            if (!Storage::exists('localPhotos/')){
                Storage::makeDirectory('localPhotos/',0775,true);
            }

            $path = $file->storeAs('localPhotos', $filename);
            $this->picture = $path;
        }

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
