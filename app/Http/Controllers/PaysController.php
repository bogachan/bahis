<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Pay;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaysController extends Controller
{
    public function index(){

        $banks = Bank::where('confirmation',1)->get();
        $user  = Auth::user();
        return view('odeme/odeme-talep',compact('banks','user'));

    }

    public function create(Request $request){
        $input = $request->all();


        $this->validate($request,[
            "name" => "required",
            "amount" => "required",
        ]);

        Pay::create($input);

        Session::flash("durum",1);
        return redirect('odeme');
    }
}
