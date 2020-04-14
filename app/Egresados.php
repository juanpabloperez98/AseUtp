<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egresados extends Model
{
    //
    protected $table = 'egresados';

    // Relacion uno a uno
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
