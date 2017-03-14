@extends('layouts.admin')


@section('heading')


    <h1>
        Haber Düzenle
    </h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Haberler</h3>
        </div>
        <div class="box-body">

                {!! Form::model($article,["route" => ["admin.haber.update",$article->id], "method" => "put", "files" => true]) !!}

                {!! Form::bsText("title","Başlık") !!}
                {!! Form::bsSelect("category_id","Kategori",null,$categories,"Lütfen bir kategori seçiniz") !!}
                {!! Form::bsFile("name","Resim") !!}
                {!! Form::bsTextArea("content","İçerik",null,["class" => "summernote"]) !!}


                {!! Form::bsSubmit("KAYDET") !!}
                {!! Form::close() !!}

            </div>
        </div>
@stop