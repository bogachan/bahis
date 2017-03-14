<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable = ["title","sub_title","content","link"];


    public function img()
    {
        return $this->morphOne("App\Img","imageable");
    }

    public function getResimAttribute()
    {
        $resim = asset("uploads/".$this->img()->first()->name);
        return '<img src="'.$resim.'"/>';
    }



}
