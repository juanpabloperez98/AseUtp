<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelationUser extends Model
{
    //
    protected $table = 'relation_users';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function egresado(){
        return $this->belongsTo('App\Egresados','egresado_id');
    }


}
