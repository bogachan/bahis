<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function gonder(Request $request){

        $this->validate($request,[
            "mail" => "required",
            "content" => "required",
            "name" => "required",
        ]);

        $input = $request->all();

        Message::create($input);

        Session::flash("durum",1);
        return redirect("/iletisim");

    }
}
