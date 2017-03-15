<?php

namespace App\Http\Controllers\Admin;

use App\Modal;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ModalController extends Controller
{
    public function index()
    {
        $modals = Modal::paginate(10);
        return view('admin.modal-index',compact('modals'));
    }

    public function create()
    {
        return view('admin.modal-create');
    }

    public function store(Request $request)
    {

        $input = $request->all();

        Modal::create($input);
        Session::flash('durum',1);
        return redirect('/admin/duyuru');

    }

    public function show($id)
    {
        $modal = Modal::find($id);
        return view('admin.modal-show',compact('modal'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $modal = Modal::find($id);
        $modal->update($input);


        Session::flash('durum',1);
        return redirect('/admin/duyuru');

    }

    public function destroy($id)
    {
        Modal::destroy($id);
        Session::flash("durum",1);
        return redirect("/admin/duyuru");
    }
}
