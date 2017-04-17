<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lastpay extends Model
{
    protected $fillable = ['name','amount','created_at'];
}
