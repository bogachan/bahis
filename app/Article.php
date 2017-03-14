<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Sluggable;
    //
    protected $fillable = ["title","slug","content","user_id","category_id","durum"];
    protected $appends = ["kucuk_resim",'resim'];


    public function user()
    {
        return $this->belongsTo("App\User");
    }


    public function category()
    {
        return $this->belongsTo("App\Category");
    }


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function img()
    {
        return $this->morphOne("App\Img","imageable");
    }

    public function getKucukResimAttribute()
    {
        $resim = asset("uploads/".$this->img()->first()->name);
        return '<img src="'.$resim.'" class="img-thumbnail" width="100" />';
    }

    public function getResimAttribute()
    {
        $resim = asset("uploads/".$this->img()->first()->name);
        return '<img src="'.$resim.'"/>';
    }

}