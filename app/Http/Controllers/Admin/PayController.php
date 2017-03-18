<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Pay;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class PayController extends Controller
{

    public function fetch()
    {
        $p_check = Pay::where('confirmation',0)->count();
        // Return as json
        return Response::json($p_check);
    }

    public function index()
    {

        if(empty($_GET['d'])){
            $pays =  Pay::where('odeme_tur','banka')->orderBy("id","desc")->paginate(10);
            $ceps =  Pay::where('odeme_tur','cep')->orderBy("id","desc")->paginate(10);
            return view('admin.pay-index',compact('pays','ceps'));
        }

        else{
            $pays =  Pay::where('confirmation',0)->where('odeme_tur','banka')->orderBy("id","desc")->paginate(10);
            $ceps =  Pay::where('confirmation',0)->where('odeme_tur','cep')->orderBy("id","desc")->paginate(10);
            return view('admin.pay-index',compact('pays','ceps'));
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

    public function islem(Request $request, $id)
    {
        if($_GET['d'] == 'iptal'){
            Pay::where('id', $id)->update(['confirmation' => 2]);
        }elseif ($_GET['d'] == 'onayla'){
            Pay::where('id', $id)->update(['confirmation' => 1]);
            User::where('id', $_GET['u'])->update(['odeme' => 1]);
        }else{
            return redirect('/admin/odeme');
        }
        Session::flash("durum",1);
        return redirect('/admin/odeme');

    }

    public function duzenle($id){
        $pay =   Pay::find($id);
        return view('admin/pay-edit',compact('pay'));
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $pay = Pay::find($input['id']);
        $pay->update($input);

        Session::flash("durum",1);
        return redirect("/admin/odeme");
    }

    public function destroy($id)
    {
    }
}
