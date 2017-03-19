<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\User;
use App\Win;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class WinController extends Controller
{

    public function fetch()
    {
        $check = Win::where('durum',0)->count();
        return Response::json($check);
    }

    public function index()
    {

        if(!empty($_GET['d'])){

            if($_GET['d'] == 'bekleyen'){
                $pays =  Win::where('durum',0)->orderBy("id","desc")->paginate(40);
                return view('admin.win-index',compact('pays'));
            }elseif ($_GET['d'] == 'tutar-yuksek'){
                $pays =  Win::orderBy("miktar","desc")->paginate(40);
                return view('admin.win-index',compact('pays'));
            }
            elseif ($_GET['d'] == 'tutar-dusuk'){
                $pays =  Win::orderBy("miktar","asc")->paginate(40);
                return view('admin.win-index',compact('pays'));
            }
            elseif ($_GET['d'] == 'tarih-yeni'){
                $pays =  Win::orderBy("created_at","desc")->paginate(40);
                return view('admin.win-index',compact('pays'));
            }
            elseif ($_GET['d'] == 'tarih-eski'){
                $pays =  Win::orderBy("created_at","asc")->paginate(40);
                return view('admin.win-index',compact('pays'));
            }
            elseif ($_GET['d'] == 'username'){
                $user  =  User::where('username',$_GET['user'])->first();
                $pays  =  Win::where('user_id',$user->id)->paginate(40);
                return view('admin.win-index',compact('pays'));
            }
            elseif ($_GET['d'] == 'name'){

                $user  =  User::where('name',$_GET['name'])->first();
                $pays  =  Win::where('user_id',$user->id)->paginate(40);
                return view('admin.win-index',compact('pays'));
            }
        }

        else{
            $pays =  Win::orderBy("id","desc")->paginate(10);
            return view('admin.win-index',compact('pays'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function islem(Request $request, $id)
    {

        if($_GET['d'] == 'iptal'){
            Win::where('id', $id)->update(['durum' => 2]);
        }elseif ($_GET['d'] == 'onayla'){
            Win::where('id', $id)->update(['durum' => 1]);
        }else{
            return redirect('/admin/cekim');
        }

        Session::flash("durum",1);
        return redirect('/admin/cekim');


    }

    public function duzenle($id){
        $win =   Win::find($id);
        return view('admin/win-edit',compact('win'));
    }

    public function update(Request $request)
    {

        $input = $request->all();
        $win = Win::find($input['id']);
        $win->update($input);

        Session::flash("durum",1);
        return redirect("/admin/cekim");
    }
}
