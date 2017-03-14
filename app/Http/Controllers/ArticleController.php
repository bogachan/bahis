<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller
{

    public function show($slug){

        $haber =  Article::where('slug',$slug)->first();

        return view('page/haber',compact('haber'));

    }

}
