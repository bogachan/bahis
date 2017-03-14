@extends('layouts.admin')


@section('heading')
    <h1>
        Haber Ekle
    </h1>
@endsection


@section('content')

    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Haberler Ekle</h3>
        </div>


        <div class="box-body">

                {!! Form::open(["url" => "/admin/haber" ,"method" => "post", "files" => true]) !!}

                {!! Form::bsText("title","Başlık") !!}
                {!! Form::bsSelect("category_id","Kategori",null,$categories,"Lütfen bir kategori seçiniz") !!}
                {!! Form::bsFile("name","Resim") !!}
                {!! Form::bsTextArea("content","İçerik",null,["class" => "summernote"]) !!}
                {!! Form::bsSubmit("KAYDET") !!}
                {!! Form::close() !!}

            </div>
        </div>

@endsection