@extends('layouts.admin')


@section('heading')
    <h1>
        Mesajlar
    </h1>
@endsection


@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="https://image.flaticon.com/icons/png/128/149/149074.png" alt="User Image">
                            <span class="username"><a href="#">{{ $message->find($message->id)->users->name }}</a>
                                @if($message->topic == 1)
                                    <small class="label bg-yellow pull-right" style="padding-top: 5px;">Ödeme Bildirimi</small>
                                @elseif($message->topic == 2)
                                    <small class="label bg-yellow pull-red" style="padding-top: 5px;">Genel</small>
                                @elseif($message->topic == 3)
                                    <small class="label bg-green pull-right" style="padding-top: 5px;">Reklam</small>
                                @endif
                            </span>
                            <span class="description"> {{$message->created_at->diffForHumans()}} </span>
                        </div>
                    </div>


                    <h4 style="border-bottom: 1px solid #f4f4f4;padding-bottom: 7px;margin-bottom: 5px;padding-left: 12px;font-size: 15px;font-weight: 600;color: #556065;">{{$message->title}}</h4>
                    <div class="box-body box-header with-border">
                         <p>
                        {{$message->content}}
                        </p>

                    </div>

                </div>
                <!-- /.box -->

                <div class="btn-group" style="margin-bottom: 15px;">
                    <a href="/admin/islem/create" class="btn btn-info">İşlem Yap</a>
                    <a href="/admin/mesaj-gonder" class="btn btn-info">Mesaj Gönder</a>
                    <a href="#" class="btn btn-info">Okundu</a>
                </div>
            </div>
        </div>

     </div>


@endsection