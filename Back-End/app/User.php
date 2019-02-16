<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
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
        $this->projects_done = $request->projects_done;
        $this->birthday = $request->birth;
        $this->language = $request->language;
        $this->country = $request->country;
        $this->phone_number = $request->phone_number;
        $this->description = $request->description;
        $this->picture = $request->picture;

        $this->save();
    }

    public function updateUser($request){

        if($request->name) $this->name = $request->name;
        if($request->username)$this->username = $request->username;
        if($request->password)$this->password = $request->password;
        if($request->email) $this->email = $request->email;
        if($request->repository) $this->repository = $request->repository;
        if($request->projects_done) $this->projects_done = $request->projects_done;
        if($request->birthday) $this->birthday = $request->birthday;
        if($request->language) $this->language = $request->language;
        if($request->country) $this->country = $request->country;
        if($request->phone_number) $this->phone_number = $request->phone_number;
        if($request->description) $this->description = $request->description;
        if($request->picture) $this->picture = $request->picture;

        $this->save();
    }

}
