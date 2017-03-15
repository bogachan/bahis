@extends('layouts.app')


@section('content')

    <h1>Kodlarınız</h1>


    @if(empty(Auth::user()->getKod()))

        <div class="alert alert-info" style=" float: left; width: 100%;">
            Kodlarınızı Görmek İçin Para Yatırmanız Gerekmektedir. Ödeme Yapmak İçin  <a class="war-link" href="/odeme">Tıklayın</a>

        </div>
    @else
        {!! Auth::user()->getKod() !!}
    @endif


@endsection