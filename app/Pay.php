<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{

    protected $guarded = ['id'];

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }

}
