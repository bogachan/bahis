<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    public function tablo(){



        $excel = User::select('name','username','tel','email')->get();

        $data = json_decode(json_encode($excel), true);

        Excel::create('Uyeler-data', function ($excel) use ($data) {
            $excel->sheet('Sheet 1', function ($sheet) use ($data) {
                $sheet->setOrientation('landscape');
                $sheet->fromArray($data);
            });
        })->export('xlsx');

    }

    public function search()
    {
        return view('search');
    }

    public function autouser(Request $request)
    {
        $data = User::select("username as name")->where("username","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }

    public function autoname(Request $request)
    {
        $data = User::select("name")->where("name","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }

    public function fetch($id)
    {
        $user_kod = User::find($id);
        return Response::json($user_kod);
    }

    public function index()
    {
        if(!empty($_GET['d'])){

            if($_GET['d'] == 'yatirim-yapmis'){
                $users =  User::where('odeme',1)->orderBy("id","desc")->paginate(40);
                return view('admin.user',compact('users'));
            }
            elseif ($_GET['d'] == 'yatirim-yapmamis'){
                $users =  User::where('odeme',0)->orderBy("id","desc")->paginate(40);
                return view('admin.user',compact('users'));
            }
            elseif ($_GET['d'] == 'tarih-yeni'){
                $users =  User::orderBy("created_at","desc")->paginate(40);
                return view('admin.user',compact('users'));
            }
            elseif ($_GET['d'] == 'tarih-eski'){
                $users =  User::orderBy("created_at","asc")->paginate(40);
                return view('admin.user',compact('users'));
            }
            elseif ($_GET['d'] == 'username'){
                $users  =  User::where('username',$_GET['user'])->paginate(40);
                return view('admin.user',compact('users'));
            }
            elseif ($_GET['d'] == 'name'){
                $users  =  User::where('name',$_GET['name'])->paginate(40);
                return view('admin.user',compact('users'));
            }
        }

        else{
            $users =  User::orderBy("id","desc")->paginate(10);
            return view('admin.user',compact('users'));
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
        $user = User::find($id);
        return view('admin.user-show',compact('user'));
    }

    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('admin.useredit',compact('user'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            "name" => "required|max:255",
            "email" => "required|email|unique:users,email,".$id,
            "password" => !empty($request->password) ? "required|min:6" : ""
        ]);



        if(!empty($request->password))
        {
            $input = $request->all();
            $input["password"] = bcrypt($request->password);
            User::find($id)->update($input);
        }
        else
        {
            User::find($id)->update([
                "name" => $request->name,
                "email" => $request->email,
                "kod" => $request->kod,
                "notlar" => $request->notlar
            ]);
        }
        // Rol User Tablosundaki Update İşlemi

        DB::table("role_user")->where("user_id",$id)->delete();

        $roller = [];

        foreach($request->rol as $rol)
        {
            $yeni_rol = ["role_id" => $rol, "user_id" => $id];
            array_push($roller,$yeni_rol);
        }

        DB::table("role_user")->insert($roller);

        Session::flash("durum",1);
        return redirect("/admin/uyeler");

    }

    public function destroy($id)
    {
        //
        User::destroy($id);
        Session::flash('durum',1);
        return redirect("/admin/uyeler");

    }

    public function kod(Request $request, $id)
    {
            User::find($id)->update([
                "kod" => $request->kod,
            ]);
        Session::flash("durum",1);
        return redirect($_SERVER['HTTP_REFERER']);

    }

}
