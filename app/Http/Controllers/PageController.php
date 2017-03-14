<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

class Pagecontroller extends Controller
{
    //

    public function show($slug){

      $page =  Page::where('slug',$slug)->first();

      return view('page/page',compact('page'));

    }

}
