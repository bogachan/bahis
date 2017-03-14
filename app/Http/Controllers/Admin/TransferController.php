<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Transfer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TransferController extends Controller
{
    //


    public function index()
    {

        if(empty($_GET['d'])){
            $transfers =  Transfer::orderBy("id","desc")->paginate(15);
            $banks = Bank::all();
            return view('admin.transfer-index',compact('transfers','banks'));

        }

        else{
            $transfers =  Transfer::orderBy("id","desc")->where('durum',0)->paginate(15);
            $banks = Bank::all();
            return view('admin.transfer-index',compact('transfers','banks'));
        }
    }

    public function islem($id){

        if(empty($_GET['d'])){
            Transfer::where('id',$id)->update(['durum' => 2]);
            Session::flash('durum',1);
            return redirect('/admin/transfer');
        }
        else{
            Transfer::where('id',$id)->update(['durum' =>  1]);
            Session::flash('durum',1);
            return redirect('/admin/transfer');
        }
    }

    public function duzenle($id){
        $transfer =   Transfer::find($id);


      return view('admin/transfer-edit',compact('transfer'));
    }

    public function update(Request $request)
    {

        $input = $request->all();
        $transfer = Transfer::find($input['id']);
        $transfer->update($input);


        Session::flash("durum",1);
        return redirect("/admin/transfer");
    }


}
