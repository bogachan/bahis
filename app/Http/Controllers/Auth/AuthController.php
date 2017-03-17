<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:50|unique:users',
            'tel' => 'required',
            'sehir' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }


    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'tel' => $data['tel'],
            'ulke' => $data['ulke'],
            'sehir' => $data['sehir'],
            'password' => bcrypt($data['password']),
        ]);

        DB::table('role_user')->insert(['role_id' => 4,'user_id' => $user->id]);

        DB::table('events')->insert(
            ['type' => 2, 'content' => 'Yeni Üye '.$data['name'] ]
        );

        return $user;
    }

}
