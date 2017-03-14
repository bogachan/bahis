<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'user_id', 'type', 'amount',
    ];

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }


}
