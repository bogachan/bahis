@extends('layouts.admin')


@section('heading')
    <h1>Duyuru</h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Düzenle</h3>
        </div>


        <div class="box-body">

        {!! Form::model($modal, ['route' => ['admin.duyuru.update', $modal->id],"method" => "put","files" => true]) !!}


        {!! Form::bsText("name","İsim") !!}
       {!! Form::bsTextArea("content","Duyuru İçerik",null,["class" => "summernote"]) !!}



        {!! Form::bsSubmit("KAYDET") !!}
        {!! Form::close() !!}
        </div>


    </div>
@endsection