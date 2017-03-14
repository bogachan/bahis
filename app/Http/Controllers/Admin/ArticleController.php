<?php

namespace App\Http\Controllers\Admin;


use App\Category;
use App\Article;
use App\Img;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::orderBy("created_at","desc")->paginate(10);
        return view("admin.article-index",compact('articles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::lists("title","id")->all();
        return view("admin.article-create",compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            "title" => "required|max:255",
            "content" => "required",
            "category_id" => "required",
            "name" => "required"
        ]);
        $input = $request->all();
        $input["user_id"] = Auth::user()->id;
        $input["durum"] = 0;
        $makale = Article::create($input);
        if($resim = $request->file("name"))
        {
            $time = time();
            $resim_isim = $time.".".$resim->getClientOriginalExtension();
            Image::make($resim->getRealPath())->fit(276,118)->save(public_path("uploads/".$resim_isim));
            $input = [];
            $input["name"] = $resim_isim;
            $input["imageable_id"] = $makale->id;
            $input["imageable_type"] = "App\Article";
            Img::create($input);
        }

        DB::table('events')->insert(
            ['type' => 3, 'content' => 'Yönetici '.$request->title.' Adlı Makele Ekledi'  ]
        );



        Session::flash("durum",1);
        return redirect("/admin/haber");
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
        $article = Article::find($id);
        $categories = Category::lists("title","id")->all();
        return view("admin.article-edit",compact('article','categories'));
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
            "title" => "required|max:255",
            "content" => "required",
            "category_id" => "required"
        ]);
        $input = $request->all();
        $makale = Article::find($id);
        $makale->update($input);
        if($resim = $request->file("img"))
        {
            $resim_isim = $makale->img->name;
            Image::make($resim->getRealPath())->fit(276,118)->save(public_path("uploads/".$resim_isim));
        }
        Session::flash("durum",1);
        return redirect("/admin/haber");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $makale_resim = Article::find($id)->img->name;
        @unlink(public_path("uploads/".$makale_resim));
        @unlink(public_path("uploads/thumb_".$makale_resim));
        Img::where("imageable_id",$id)->where("imageable_type","App\Article")->delete();
        Article::destroy($id);
        Session::flash("durum",1);
        return redirect("/admin/haber");
    }
    public function durumDegis(Request $request)
    {
        $id = $request->id;
        $durum = ($request->durum == "true") ? 1 : 0;
        Article::find($id)->update(["durum" => $durum]);
    }
}