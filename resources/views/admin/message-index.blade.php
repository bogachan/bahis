@extends('layouts.admin')


@section('heading')
    <h1>
        Mesajlar
    </h1>
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Gelen Mesajlar</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Konu</th>
                    <th>Kullanıcı</th>
                    <th>Başlık</th>
                    <th>Mesaj</th>
                    <th>Zaman</th>
                    <th>Oku</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>

                        <td style="text-align:center">
                            @if($message->topic == 1)
                                <small class="label bg-yellow">Ödeme Bildirimi</small>
                            @elseif($message->topic == 2)
                                <small class="label bg-red">Genel</small>
                            @elseif($message->topic == 3)
                                <small class="label bg-green">Reklam</small>
                            @elseif($message->topic == 4)
                                <small class="label bg-green">Gönderilen</small>
                            @endif
                        </td>

                        <td>@if($message->user_id == 0) Ziyaretçi @else {!! $message->user_id !!}  @endif </td>

                        <td>{{$message->title}}</td>
                        <td>{{str_limit($message->content, $limit = 60, $end = '...') }}</td>
                        <td>{{$message->created_at}}</td>

                        <td>
                            <a href="/admin/mesaj/{{$message->id}}" class="btn btn-primary eylem" data-toggle="tooltip" title="Oku"><i class="fa fa-link"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="text-center">
        {{$messages->links()}}
    </div>
@endsection