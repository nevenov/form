<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts(){

        return $this->hasMany('App\Post');

    }


    // Accessor function
    public function getNameAttribute($value){

        return strtoupper($value);

    }


    // Mutator function
    public function setNameAttribute($value){

        $this->attributes['name'] = ucwords($value);

    }


}
