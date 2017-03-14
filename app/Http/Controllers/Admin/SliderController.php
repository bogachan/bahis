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
        $input = $request->all();
        $slider = Slider::create($input);
        if($resim = $request->file("bg"))
        {
            $time = time();
            $resim_isim = $time.".".$resim->getClientOriginalExtension();
            Image::make($resim->getRealPath())->save(public_path("uploads/slider/".'bg-'.$resim_isim));
            $input = [];
            $input["name"] = 'bg-'.$resim_isim;
            $input["imageable_id"] = $slider->id;
            $input["imageable_type"] = "App\Slider";
            Img::create($input);
        }

        if($resim2 = $request->file("img"))
        {
            $time = time();
            $resim_isim = $time.".".$resim2->getClientOriginalExtension();
            Image::make($resim->getRealPath())->save(public_path("uploads/slider/".$resim_isim));
            $input = [];
            $input["name"] = $resim_isim;
            $input["imageable_id"] = $slider->id;
            $input["imageable_type"] = "App\Slider";
            Img::create($input);
        }



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
