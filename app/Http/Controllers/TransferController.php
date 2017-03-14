<?php

namespace App\Http\Controllers;

use App\Pay;
use App\Transfer;
use App\Win;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TransferController extends Controller
{
    public function index(){
        $user  = Auth::user();
        return view('transfer/transfer',compact('user'));
    }

    public function create(Request $request){
        $input = $request->all();
        $this->validate($request,[
            "amount" => "required",
            "to_user" => "required",
        ]);
        Transfer::create($input);
        Session::flash("durum",1);
        return redirect('/transfer');
    }

    public function islemler(){
        $user     = Auth::user();
        $arkadaslar = Transfer::where('user_id',$user->id)->where('type',1)->get();
        $siteler = Transfer::where('user_id',$user->id)->where('type',2)->get();
        $cekimler = Win::where('user_id',$user->id)->get();
        $odemeler = Pay::where('user_id',$user->id)->get();
        return view('transfer/islemler',compact('arkadaslar','siteler','cekimler','odemeler'));
    }
}


