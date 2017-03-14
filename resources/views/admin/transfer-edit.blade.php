@extends('layouts.admin')


@section('heading')
    <h1>
        Transferleri Düzenle
    </h1>
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{!! $transfer->id !!} : İşlemi Düzenle</h3>
        </div>


         {!! Form::open(['url' => '/admin/transfer/update','method' => 'put']) !!}

        <div class="box-body">
            <input type="hidden" name="id" value="{{$transfer->id}}">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kullanıcı</label>
                    <input type="text" class="form-control"  name="user_name" id="exampleInputEmail1" value="{{$transfer->user_name}}" disabled>
                </div>
            </div>
            @if($transfer->type == 1)
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Transfer Edilecek Kullanıcı</label>
                        <input type="text" name="to_user" class="form-control" id="exampleInputEmail1" value="{{$transfer->to_user}}" >
                    </div>
                </div>
            @else
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hangi Siteden</label>

                        <select name="site_id" class="form-control">
                        @foreach(\App\Site::get() as $site)
                                <option value="{!! $site->id !!}" @if($site->id == $transfer->site_id) selected @endif>
                                    {!! $site->name !!}
                                </option>
                        @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Transfer Edilecek Site</label>

                        <select name="to_site_id" class="form-control">
                            @foreach(\App\Site::get() as $site)
                                <option value="{!! $site->id !!}" @if($site->id == $transfer->to_site_id) selected @endif>
                                    {!! $site->name !!}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>
            @endif
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tutar</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="to_site_id" value="{{$transfer->amount}}" >
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tarih</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$transfer->created_at->diffForHumans()}}" disabled>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select name="durum" class="form-control">
                        <option value="0" @if($transfer->durum == 0) selected  @endif>
                            Kontrol Edilmedi
                        </option>
                        <option value="1" @if($transfer->durum == 1) selected  @endif>
                            Onaylando
                        </option>
                        <option value="2" @if($transfer->durum == 2) selected  @endif>
                            İptal Edildi
                        </option>

                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-default btn-flat pull-right">Kaydet</button>
            </div>
        </div>

        {!! Form::close() !!}

    </div>
@endsection