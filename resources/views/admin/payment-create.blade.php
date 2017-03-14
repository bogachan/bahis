@extends('layouts.admin')


@section('heading')
    <h1>
        İşlemler
    </h1>
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">İşlem Ekle</h3>
        </div>
        <div class="box-body">
            {!! Form::open(["url" => "/admin/islem" ,"method" => "post"]) !!}
            {!! Form::label('type', 'İşlem Türü', ['class' => 'control-label']) !!}
            {!! Form::select('type', ['1' => 'Yatırdı', '2' => 'Çekti','3' => 'Kazandı', '4' => 'Kaybetti'], null, ['placeholder' => 'İşlem Türü Seçin']) !!}
            {!! Form::bsSelect("user_id","User",null,$users,"Kullanıcı Seçin") !!}
            {!! Form::bsText("amount","Miktar") !!}
            {!! Form::bsSubmit("KAYDET") !!}
            {!! Form::close() !!}
        </div>

    </div>

@endsection