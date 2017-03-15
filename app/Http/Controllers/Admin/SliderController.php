<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use App\Img;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy("id","desc")->paginate();
        return view('admin.slider-index',compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider-create');

    }

    public function store(Request $request)
    {
        $time = time();
        $input = $request->all();
        $bg = $request->file("bg");
        $img = $request->file("img");



        if($resim = $request->file("bg"))
        {
            Image::make($resim->getRealPath())->save(public_path("uploads/slider/".$input['bg']));
            $input['bg'] = "bg-".$time."-".$bg->getClientOriginalName();
        }

        if($resim2 = $request->file("img"))
        {

            Image::make($resim2->getRealPath())->save(public_path("uploads/slider/".$input['img']));
            $input['img'] = $time."-".$img->getClientOriginalName();

        }


        Slider::create($input);

        Session::flash('durum',1);
        return redirect('/admin/slider');
    }

    public function show($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider-show',compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $slider = Slider::find($id);

        $slider->update($input);

        Session::flash('durum',1);
        return redirect('/admin/slider');
    }

    public function destroy($id)
    {
        Slider::destroy($id);
        Session::flash("durum",1);
        return redirect("/admin/slider");
    }
}
