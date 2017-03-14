<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use App\Payment;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index(){

        return view('admin.index',compact('users','messages','payments'));
    }
}
