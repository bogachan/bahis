@extends('layouts.admin')


@section('heading')
    <h1>Promosyonlar</h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Promosyon Düzenle</h3>
        </div>

        <div class="box-body">

            {!! Form::model($promo, ['route' => ['admin.promo.update', $slider->id],"method" => "put","files" => true]) !!}
            {!! Form::bsText("title","Title") !!}
            {!! Form::bsText("sub_title","Sub Title") !!}
            {!! Form::bsText("link","Link") !!}
            {!! Form::bsText("link_text","Link Yazı") !!}
            {!! Form::bsFile("img","Resim") !!}
            <textarea name="content" class="summernote" id="" cols="30" rows="10">{!! $slider->content !!}</textarea>
            {!! Form::bsSubmit("KAYDET") !!}
            {!! Form::close() !!}
        </div>


    </div>
@endsection