<?php

namespace App\Http\Controllers\Admin;

use App\Lastpay;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class lastPayController extends Controller

{




    public function index()
    {
        $lastpays = Lastpay::orderBy("id","desc")->paginate();
        return view('admin.lastpay-index',compact('lastpays'));
    }

    public function create()
    {
        return view('admin.lastpay-create');

    }

    public function store(Request $request)
    {
        $input = $request->all();
        Lastpay::create($input);
        Session::flash('durum',1);
        return redirect('/admin/son-odemeler');
    }

    public function show($id)
    {
        $lastpay = Lastpay::find($id);
        return view('admin.lastpay-show',compact('lastpay'));
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();
        $lastpay = Lastpay::find($id);
        $lastpay->update($input);

        Session::flash('durum',1);
        return redirect('/admin/son-odemeler');

    }

    public function destroy($id)
    {
        Lastpay::destroy($id);
        Session::flash("durum",1);
        return redirect("/admin/son-odemeler");
    }
}
