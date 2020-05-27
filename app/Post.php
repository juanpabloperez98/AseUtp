<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'user_id','category_id','name','slug','excerpt','body','status','file'
    ];

    // Uno A Uno
    public function user(){
        return $this->belongsTo('App\User');

    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    // Many To Many
    public function tags(){
        return $this->belongsToMany('App\Tags');
    }
}
