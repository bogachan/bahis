<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    use Sluggable;

    protected $table = "categories";
    protected $fillable = ["title","slug"];
    protected $appends = ["kucuk_resim"];
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
        $resim = asset("uploads/thumb_".$this->img()->first()->name);
        return '<img src="'.$resim.'" class="img-thumbnail" width="100" />';
    }
}