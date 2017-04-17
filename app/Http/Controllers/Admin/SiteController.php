<?php

namespace App\Http\Controllers\Admin;

use App\Site;
use Illuminate\Http\Request;
use App\Img;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::orderBy("id","desc")->paginate();
        return view('admin.site-index',compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.site-create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $time = time();
        $input = $request->all();
        $logo = $request->file("logo");
        $img = $request->file("img");



        if($logo = $request->file("logo"))
        {
            $input['logo'] = "".$time."-".$logo->getClientOriginalName();
            Image::make($logo->getRealPath())->save(public_path("uploads/".$input['logo']));
        }

        if($img = $request->file("img"))
        {
            $input['img'] = $time."-".$img->getClientOriginalName();
            Image::make($img->getRealPath())->save(public_path("uploads/".$input['img']));
        }

        Site::create($input);
        Session::flash('durum',1);
        return redirect('/admin/site');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $site = Site::find($id);
        return view('admin.site-show',compact('site'));
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
        $input = $request->all();

        $site = Site::find($id);

        $time = time();


        if($resim = $request->file("logo"))
        {
            $logo = $request->file("logo");
            $input['logo'] = "".$time."-".$logo->getClientOriginalName();
            Image::make($resim->getRealPath())->save(public_path("uploads/".$input['logo']));
        }

        if($resim2 = $request->file("img"))
        {
            $img = $request->file("img");
            $input['img'] = $time."-".$img->getClientOriginalName();
            Image::make($resim2->getRealPath())->save(public_path("uploads/".$input['img']));

        }

        $site->update($input);

        Session::flash('durum',1);
        return redirect('/admin/site');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Site::destroy($id);
        Session::flash("durum",1);
        return redirect("/admin/site");
    }
}
