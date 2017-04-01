<?php

namespace App\Http\Controllers;

use App\Afi;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AfiController extends Controller
{
    public function index(){
        $user = User::where('afi_kod',Auth::user()->afi_kod)->first();
        $afi = DB::table('afis')->where('afi_id',$user->afi_kod)->get();
        $users = array();
        foreach ($afi as $e){
            array_push($users, DB::table('users')->where('id',$e->user_id)->first());
        }
        return view('/kullanici/affiliate',compact('users','user'));
    }
}
