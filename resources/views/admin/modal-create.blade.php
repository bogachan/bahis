@extends('layouts.admin')


@section('heading')
    <h1>Duyuru Ekle</h1>
@endsection

@section('content')

<div class="box">
    <div class="box-body">

        {!! Form::open(["url" => "/admin/duyuru" ,"method" => "post"]) !!}

        {!! Form::bsText("name","İsim") !!}
        {!! Form::bsTextArea("content","Duyuru İçerik",null,["class" => "summernote"]) !!}

        {!! Form::bsSubmit("KAYDET") !!}
        {!! Form::close() !!}
    </div>

</div>
@endsection