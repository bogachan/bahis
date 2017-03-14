@extends('layouts.admin')


@section('heading')
    <h1>
        Sayfa Ekle
    </h1>
@endsection


@section('content')

    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Ekle</h3>
        </div>


        <div class="box-body">
            {!! Form::open(["url" => "/admin/sayfa" ,"method" => "post", "files" => true]) !!}
            {!! Form::bsText("title","Başlık") !!}
            {!! Form::bsFile("file","Resim") !!}
            {!! Form::bsTextArea("content","İçerik",null,["class" => "summernote"]) !!}
            {!! Form::bsSubmit("KAYDET") !!}
            {!! Form::close() !!}

        </div>
    </div>

@endsection