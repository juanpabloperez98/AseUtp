<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    //
    protected $table = 'solicitudes';


    public function user(){
        return $this->belongsToMany('App\User');
    }
}
