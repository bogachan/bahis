<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ["title","sub_title","content","link",'link_text','img'];

}
