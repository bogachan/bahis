@extends('layouts.app')


@section('content')

    <h1>Ortaklık</h1>

    <div class="boxo row">
        <div class="col-md-3">
            <div class="ox">Ortaklık Linkiniz  <span><a target="_blank" href="{!! url('/?referans=').$user->afi_kod !!}">Tıklayın</a></span></div>
        </div>
        <div class="col-md-3">
            <div class="ox">Ortaklık Kodunuz  <span>{!! $user->afi_kod !!}</span></div>
        </div>
        <div class="col-md-3">
            <div class="ox">Ortaklık Yüzdeniz <span>{!! $user->afi_oran !!}</span></div>
        </div>
        <div class="col-md-3">
            <div class="ox">Toplam Üyeniz <span>{!! count($users) !!}</span></div>
        </div>
    </div>

    <h3 class="head-sub">Alt Üyeleriniz</h3>
    @foreach($users as $user)
    <table class="table">
        <thead>

        <tr>
            <th style="width:32%">
                {!! $user->username !!}
            </th>
            <th style="width:32%">Tutar</th>
            <th>Tarih</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\Pay::where('user_id',$user->id)->get() as $pay)
            <tr>
                <td>Yatırım</td>
                <td>{{$pay->amount}} TL</td>
                <td>{{$pay->created_at}}</td>
            </tr>
        @endforeach

        @foreach(\App\Win::where('user_id',$user->id)->get() as $pay)
            <tr>
                <td>Çekim</td>
                <td>{{$pay->miktar}} TL</td>
                <td>{{$pay->created_at}}</td>

            </tr>
        @endforeach


        </tbody>
    </table>
    @endforeach
@endsection






