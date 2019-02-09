<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function newPicture($request){
      $this->subtitle = $request->subtitle;
      $this->file = $request->file;
      $this->project_id = $request->project_id;

      $this->save();
    }

    public function changePicture($request){
      if($request->subtitle)
        $this->subtitle = $request->subtitle;
      if($request->file)
        $this->file = $request->file;
      if($request->project_id)
        $this->project_id = $request->project_id;

      $this->save();
    }
}
