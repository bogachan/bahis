<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    public $timestamps = false;

    protected $fillable = ["name","content","link"];

}
