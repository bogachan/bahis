<?php

namespace App\Http\Controllers\Admin;

use App\Payment;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments = Payment::paginate(10);


        return view('admin.payment-index',compact('payments','xxx'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::lists("name","id")->all();

        return view('admin.payment-create',compact('payments','users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "type" => "required",
            "user_id" => "required",
            "amount" => "required",
        ]);

        $input = $request->all();
        Payment::create($input);

        if($request->type == 1){
            $olay = 'Yatırdı';
        }elseif($request->type == 2){
            $olay = 'Çekti';
        }

        elseif ($request->type == 3){
            $olay = 'Kazandı';
        }else{
            $olay = 'Kaybetti';
        }

        $kim = User::find($request->user_id)->name;


        DB::table('events')->insert(
            ['type' => 1, 'content' => $kim.' Adlı kullanıcı '.$request->amount.' TL '.$olay ]
        );


        Session::flash("durum",1);
        return redirect("/admin/islem");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $payment = Payment::find($id);
        $users = User::lists("name","id")->all();
        return view("admin.payment-edit",compact('payment','users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "type" => "required",
            "user_id" => "required",
            "amount" => "required",
        ]);

        $input = $request->all();
        $payment = Payment::find($id);
        $payment->update($input);


        Session::flash("durum",1);
        return redirect("/admin/islem");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payment::destroy($id);
        Session::flash("durum",1);
        return redirect("/admin/islem");
    }
}
