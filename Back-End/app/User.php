<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];


    public function insertUser($request){
        $this->name = $request->name;
        $this->username = $request->username;
        $this->password = $request->password;
        $this->email = $request->email;
        $this->repository = $request->repository;
        $this->birthday = $request->birthday;
        $this->phone_number = $request->phone_number;
        $this->description = $request->description;

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

    public function updateUser($request){

        if($request->name) $this->name = $request->name;
        if($request->username)$this->username = $request->username;
        if($request->password)$this->password = $request->password;
        if($request->email) $this->email = $request->email;
        if($request->repository) $this->repository = $request->repository;
        if($request->birthday) $this->birthday = $request->birthday;
        if($request->phone_number) $this->phone_number = $request->phone_number;
        if($request->description) $this->description = $request->description;
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



    public function projects(){
        return $this->hasMany('App\Project');
    }


    public function avaliations(){
      return $this->hasMany('App\Avaliation', 'id_user_measured');
    }

    public function works(){
      return $this->belongsToMany('App\Work');
    }
}
