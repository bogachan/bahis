<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'user_id', 'to_user_id', 'from_user_id','content', 'title','read','topic', 'name','mail','messege_id'
    ];



     public function users(){
    return $this->belongsTo('App\User','user_id','id');
    }

}
