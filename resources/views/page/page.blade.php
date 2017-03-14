@extends('layouts.app')

@section('content')



    <h1>{!! $page->title !!}</h1>


      <div class="txt">
          {!! $page->content !!}
      </div>


@endsection
