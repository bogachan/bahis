<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{

    public function fetch()
    {

        $m_check = Message::where('read',0)->count();

        return Response::json($m_check);
    }


    public function index(){

        if(empty($_GET['d'])){
            $messages = Message::orderBy("id","desc")->paginate(10);
            return view('admin.message-index',compact('messages'));
        }

        else{
            $messages =  Message::where('read',0)->paginate(15);
            return view('admin.message-index',compact('messages'));
        }

    }

    public function show($id)
    {
        $message = Message::find($id);
        Message::where('id',$id)->update(['read'=>1]);
        return view('admin.message-content',compact('message'));

    }

    public function create()
    {
        $users = User::lists("name","id")->all();
        return view('admin.message-create',compact('users'));

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "user_id" => "required",
            "content" => "required",
        ]);

        $input = $request->all();
        Message::create($input);
        Session::flash("durum",1);
        return redirect("/admin/mesajlar");

    }

}
