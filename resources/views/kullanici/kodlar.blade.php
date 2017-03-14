@extends('layouts.app')


@section('content')

    <h1>Kodlarınız</h1>

    {!! Auth::user()->getKod() !!}

@endsection