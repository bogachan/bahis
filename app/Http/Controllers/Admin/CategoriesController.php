<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Img;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate(5);
        return view('admin.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-create');
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
            "title" => "required|max:255",
            "name" => "required"
        ]);

        $kategori = Category::create($request->all());

        if($resim = $request->file("name"))
        {
            $time = time();
            $resim_isim = $time.".".$resim->getClientOriginalExtension();
            $thumb = "thumb_".$time.".".$resim->getClientOriginalExtension();
            Image::make($resim->getRealPath())->save(public_path("uploads/".$resim_isim));
            Image::make($resim->getRealPath())->fit(276,118)->save(public_path("uploads/".$thumb));
            $input = [];
            $input["name"] = $resim_isim;
            $input["imageable_id"] = $kategori->id;
            $input["imageable_type"] = "App\Category";
            Img::create($input);
        }
        Session::flash("durum",1);
        return redirect("/admin/kategoriler");
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
        //
        $category = Category::find($id);
        return view('admin.category-edit',compact('category'));
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
        //
        $this->validate($request,[
            "title" => "required|max:255"
        ]);
        $kategori = Category::find($id);
        $kategori->update($request->all());
        if($resim = $request->file("name"))
        {
            $resim_isim = $kategori->img->name;
            $thumb = "thumb_".$kategori->img->name;
            Image::make($resim->getRealPath())->fit(1900,872)->fill(array(0,0,0,0.5))->save(public_path("uploads/".$resim_isim));
            Image::make($resim->getRealPath())->fit(600,400)->save(public_path("uploads/".$thumb));
        }
        Session::flash("durum",1);
        return redirect("/admin/kategoriler");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $kategori_resim = Category::find($id)->img->name;
        @unlink(public_path("uploads/".$kategori_resim));
        @unlink(public_path("uploads/thumb_".$kategori_resim));
        Img::where("imageable_id",$id)->where("imageable_type","App\Category")->delete();
        Category::destroy($id);
        Session::flash("durum",1);
        return redirect('/admin/kategoriler');

    }
}
