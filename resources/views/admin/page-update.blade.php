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

            {!! Form::model($page,["route" => ["admin.sayfa.update",$page->id], "method" => "put", "files" => true]) !!}

            {!! Form::bsText("title","Başlık") !!}
            {!! Form::bsTextArea("content","İçerik",null,["class" => "summernote"]) !!}


            {!! Form::bsSubmit("KAYDET") !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop