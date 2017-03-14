<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Img;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = Page::orderBy("created_at","desc")->paginate(10);
        return view("admin.page-index",compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.page-create");
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
            "title" => "required|max:350",
            "content" => "required",
        ]);
        $input = $request->all();
        $input["durum"] = 0;
        $page = Page::create($input);


        DB::table('events')->insert(
            ['type' => 3, 'content' => 'Yönetici '.$request->title.' Adlı Sayfa Ekledi'  ]
        );


        Session::flash("durum",1);
        return redirect("/admin/sayfa");
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
        $page = Page::find($id);
        return view("admin.page-update",compact('page'));
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
            "title" => "required|max:350",
            "content" => "required",
        ]);
        $input = $request->all();
        $page = Page::find($id);
        $page->update($input);

        Session::flash("durum",1);
        return redirect("/admin/sayfa");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Page::destroy($id);
        Session::flash("durum",1);
        return redirect("/admin/sayfa");
    }
    public function durumDegis(Request $request)
    {
        $id = $request->id;
        $durum = ($request->durum == "true") ? 1 : 0;
        Page::find($id)->update(["durum" => $durum]);
    }
}
