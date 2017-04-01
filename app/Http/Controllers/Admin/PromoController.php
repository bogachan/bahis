<?php

namespace App\Http\Controllers\Admin;

use App\Promo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class PromoController extends Controller
{

    public function index()
    {

        $promos = Promo::orderBy("id","desc")->paginate();
        return view('admin.promo-index',compact('promos'));
    }

    public function create()
    {
        return view('admin.promo-create');

    }

    public function store(Request $request)
    {
        $time = time();
        $input = $request->all();
        $bg = $request->file("img");

        if($resim = $request->file("img"))
        {
            $input['img'] = "promo-".$time."-".$bg->getClientOriginalName();
            Image::make($resim->getRealPath())->save(public_path("uploads/".$input['img']));
        }

        Promo::create($input);

        Session::flash('durum',1);
        return redirect('/admin/promosyon');
    }

    public function show($id)
    {
        $promo = Promo::find($id);
        return view('admin.promo-show',compact('promo'));
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();
        $promo = Promo::find($id);
        $bg = $request->file("img");
        $time = time();


        if($resim = $request->file("bg"))
        {
            $input['img'] = "promo-".$time."-".$bg->getClientOriginalName();
            Image::make($resim->getRealPath())->save(public_path("uploads/".$input['img']));
        }

        $promo->update($input);


        Session::flash('durum',1);
        return redirect('/admin/promosyon');

    }

    public function destroy($id)
    {
        Slider::destroy($id);
        Session::flash("durum",1);
        return redirect("/admin/slider");
    }
}
