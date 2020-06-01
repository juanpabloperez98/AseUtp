<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudesFriends extends Model
{
    //

    protected $table = 'requests_friends';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function egresados(){
        return $this->belongsTo('App\Egresados','egresado_id');
    }
}
