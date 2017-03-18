<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $guarded = ['id'];

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
