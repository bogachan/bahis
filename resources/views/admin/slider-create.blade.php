@extends('layouts.admin')


@section('heading')
    <h1>Slider Ekle</h1>
@endsection

@section('content')

<div class="box">
    <div class="box-body">

        {!! Form::open(["url" => "/admin/slider" ,"method" => "post","files" => true]) !!}

        {!! Form::bsText("title","Title") !!}
        {!! Form::bsText("sub_title","Sub Title") !!}
        {!! Form::bsText("link","Link") !!}
        {!! Form::bsFile("bg","Background") !!}
        {!! Form::bsFile("img","Sol Resim") !!}
        {!! Form::bsTextArea("content","Slider Text",null,["class" => "summernote"]) !!}

        {!! Form::bsSubmit("KAYDET") !!}
        {!! Form::close() !!}
    </div>

</div>
@endsection