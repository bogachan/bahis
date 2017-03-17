@extends('layouts.app')


@section('content')

    <h1>Mesajlar</h1>

    <?php DB::table('messages')->where('to_user_id',Auth::user()->id)->where('read',1)->update(['read' => 2]); ?>

    @foreach($messages as $message)
    <div class="message-box">
        <h3>{!! $message->title !!} <small>{!! $message->created_at->diffForHumans() !!}</small></h3>
        <p>{!! $message->content !!}</p>
    </div>

    @endforeach


@endsection