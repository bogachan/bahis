@extends('layouts.admin')


@section('heading')
    <h1>Banka Ekle</h1>
@endsection

@section('content')

<div class="box">
    <div class="box-body">

        {!! Form::open(["url" => "/admin/banka" ,"method" => "post"]) !!}

        <label for="exampleInputEmail1">Durum</label>

        <select name="confirmation" id="" class="form-control">
            <option value="1" selected>Aktif</option>
            <option value="0">Pasif</option>
        </select>

        {!! Form::bsText("name","İsim") !!}
        {!! Form::bsTextArea("content","Hesap Bilgileri",null,["class" => "summernote"]) !!}

        {!! Form::bsSubmit("KAYDET") !!}
        {!! Form::close() !!}
    </div>

</div>
@endsection