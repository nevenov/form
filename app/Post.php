<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public $directory = '/images/';

    //
    protected $fillable = ['title', 'content', 'path'];



    // Adding a query scope functionality to the Post model
    // 'scopeLatest' will be the scope that will be added as a static method
    // like this $posts = Post::latest();
    public static function scopeLatest($query){

        return $query->orderBy('id', 'desc')->get();

    }


    public function getPathAttribute($value){

        return $this->directory . $value;

    }

}
