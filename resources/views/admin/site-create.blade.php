@extends('layouts.admin')


@section('heading')
    <h1>Banka Ekle</h1>
@endsection

@section('content')
    <div class="box">

        <div class="box-body">

            {!! Form::open(["url" => "/admin/site/" ,"method" => "post"]) !!}

            <select name="durum" id="">
                <option value="1" selected>Aktif</option>
                <option value="0">Pasif</option>
            </select>

        {!! Form::bsText("name","İsim") !!}
            {!! Form::bsText("link","Site Link") !!}
        {!! Form::bsTextArea("content","Site İçerik",null,["class" => "summernote"]) !!}

        {!! Form::bsSubmit("KAYDET") !!}
        {!! Form::close() !!}
        </div>
    </div>
@endsection