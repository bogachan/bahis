@extends('layouts.admin')


@section('heading')
    <h1>
        Mesajlar
    </h1>
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Mesaj Gönder</h3>
        </div>
        <div class="box-body">
            {!! Form::open(["url" => "/admin/mesajlar/store" ,"method" => "post"]) !!}
            {!! Form::bsSelect("to_user_id","Kullanıcı",null,$users,"Kullanıcı Seçin") !!}
            {!! Form::bsText("title","Konu") !!}
            {!! Form::bsTextArea("content","Mesajınız") !!}
            <input type="hidden" name="from_user_id" value="1">
            <input type="hidden" name="user_id" value="1">
            <input type="hidden" name="name" value="Yönetim">
            <input type="hidden" name="topic" value="4">

            {!! Form::bsSubmit("KAYDET") !!}
            {!! Form::close() !!}
        </div>

    </div>

@endsection