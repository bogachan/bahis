<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Pay;
use App\Win;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WinController extends Controller
{
    public function index(){

        $banks = Bank::where('confirmation',1)->get();
        $user  = Auth::user();
        return view('odeme/cekim-talep',compact('banks','user'));

    }

    public function create(Request $request){
        $input = $request->all();


        $this->validate($request,[
            "hesap_isim" => "required",
            "miktar" => "required",
            "site" => "required",
            "banka" => "required",
            "hesap_no" => "required",
            "sube" => "required",
            "iban" => "required",

        ]);

        Win::create($input);

        Session::flash("durum",1);
        return redirect('/cekim');
    }
}
