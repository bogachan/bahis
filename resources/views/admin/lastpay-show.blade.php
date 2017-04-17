@extends('layouts.admin')


@section('heading')
    <h1>Son Ödemeler</h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Düzenle</h3>
        </div>


        <div class="box-body">

            {!! Form::model($lastpay, ['route' => ['admin.son-odemeler.update', $lastpay->id],"method" => "put"]) !!}
            {!! Form::bsText("name","İsim") !!}
            {!! Form::bsText("amount","Tutar") !!}
            {!! Form::bsSubmit("KAYDET") !!}
            {!! Form::close() !!}
        </div>


    </div>
@endsection