@extends('layouts.admin')
@section('heading')
    <h1>
        Kategori İşlemleri
    </h1>
@endsection
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Kategori Ekle</h3>
        </div>
        <div class="box-body">

            {!! Form::open(["url" => "/admin/kategoriler" ,"method" => "post", "files" => true]) !!}

            {!! Form::bsText("title","Başlık") !!}
            {!! Form::bsFile("name","Resim") !!}

            {!! Form::bsSubmit("KAYDET") !!}
            {!! Form::close() !!}

        </div>

    </div>

@endsection
