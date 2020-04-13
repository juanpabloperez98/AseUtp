<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egresados extends Model
{
    //
    protected $table = 'egresados';

    // Relacion uno a uno
    public function users(){
        return $this->hasOne('App\User');
    }
}
