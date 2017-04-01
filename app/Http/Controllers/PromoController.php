<?php

namespace App\Http\Controllers;

use App\Promo;
use Illuminate\Http\Request;

use App\Http\Requests;

class PromoController extends Controller
{
    public function index(){
        $promos = Promo::get();
        return view('promo',compact('promos'));
    }
}
