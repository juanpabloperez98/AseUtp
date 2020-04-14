<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //

    protected $table = 'administradores';


    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
