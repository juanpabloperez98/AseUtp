<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Root extends Model
{
    //
    protected $table = 'root';


    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
