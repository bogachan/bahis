@extends('layouts.admin')


@section('heading')
    <h1>Promosyonlar</h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Promosyon Ekle</h3>
        </div>

        <div class="box-body">

            {!! Form::open(["url" => "/admin/promosyon" ,"method" => "post","files" => true]) !!}

            {!! Form::bsText("title","Title") !!}
            {!! Form::bsText("sub_title","Sub Title") !!}
            {!! Form::bsText("link","Link") !!}
            {!! Form::bsText("link_text","Link Yazı") !!}
            {!! Form::bsFile("img","Resim") !!}
            {!! Form::bsTextArea("content","Slider Text",null,["class" => "summernote"]) !!}
            {!! Form::bsSubmit("KAYDET") !!}
            {!! Form::close() !!}
        </div>


    </div>
@endsection