@extends('layouts.app')

@section('content')



    <h1>{!! $haber->title !!}</h1>


      <div class="txt">
          {!! $haber->content !!}
      </div>


@endsection
