@extends('layouts.admin')


@section('heading')
    <h1>
        Ödeme Düzenle
    </h1>
@endsection


@section('content')
    <div class="box">

        <div class="col-sm-12">
            <div class="box-header">
                <h3 class="box-title">{!! $pay->id !!} Nolu Ödeme İşlemini Düzenle</h3>
            </div>
        </div>


        @if($pay->odeme_tur == 'cep')
            {!! Form::open(['url' => '/admin/odeme/update','method' => 'put']) !!}
            <div class="box-body">
                <input type="hidden" name="id" value="{{$pay->id}}">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kullanıcı Adı</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ DB::table('users')->where('id', $pay->user_id)->value('username') }}" disabled>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tarih</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$pay->created_at->diffForHumans()}}" disabled>
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ödeme Yapılan Banka</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="cepban_banka" value="{{$pay->cepban_banka}}">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Site</label>
                        <select name="site_id" class="form-control">
                            @foreach(DB::table('sites')->get() as $site)
                                <option value="{{ $site->id }}" @if($site->id == $pay->site_id) selected @endif> {{ $site->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ödeme Yapan İsim Soyisim</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$pay->name}}" >
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tutar</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="amount" value="{{$pay->amount}}" >
                    </div>
                </div>

                <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gönderen Tc</label>
                            <input id="gonderen-tc" placeholder="Gönderen Tc" type="text" name="gonderen_tc"  value="{{$pay->gonderen_tc}}">
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alıcı No</label>
                        <input id="gonderen-tc" placeholder="Alıcı No" type="text" name="alici_no"  value="{{$pay->alici_no}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alıcı Tc</label>
                        <input id="gonderen-tc" placeholder="Alıcı Tc" type="text" name="alici_tc"  value="{{$pay->alici_tc}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gönderen No</label>
                        <input id="gonderen-tc" placeholder="Gönderen No" type="text" name="gonderen_no"  value="{{$pay->gonderen_no}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bonus</label>
                        <input id="gonderen-tc" type="text" name="bonus"  value="{{$pay->bonus}}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Referans Şifre</label>
                        <input id="gonderen-tc" type="text" name="referans_sifre"  value="{{$pay->referans_sifre}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Durum</label>
                        <select name="confirmation" class="form-control">
                            <option value="0" @if($pay->confirmation == 0) selected  @endif>
                                Kontrol Edilmedi
                            </option>
                            <option value="1" @if($pay->confirmation == 1) selected  @endif>
                                Onaylandı
                            </option>
                            <option value="2" @if($pay->confirmation == 2) selected  @endif>
                                İptal Edildi
                            </option>

                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn bg-yellow pull-right">Kaydet</button>
                </div>
            </div>
            {!! Form::close() !!}
        @else
            {!! Form::open(['url' => '/admin/odeme/update','method' => 'put']) !!}
            <div class="box-body">
                <input type="hidden" name="id" value="{{$pay->id}}">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kullanıcı Adı</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ DB::table('users')->where('id', $pay->user_id)->value('username') }}" disabled>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tarih</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$pay->created_at->diffForHumans()}}" disabled>
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ödeme Yapılan Banka</label>
                        <select name="type" class="form-control">
                            @foreach(DB::table('banks')->get() as $bank)
                                <option value="{{ $bank->id }}" @if($pay->type == $bank->id) selected @endif> {{ $bank->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Site</label>
                        <select name="site_id" class="form-control">
                            @foreach(DB::table('sites')->get() as $site)
                                <option value="{{ $site->id }}" @if($site->id == $pay->site_id) selected @endif> {{ $site->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ödeme Yapan İsim Soyisim</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$pay->name}}" >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tutar</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="amount" value="{{$pay->amount}}" >
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Durum</label>
                        <select name="confirmation" class="form-control">
                            <option value="0" @if($pay->confirmation == 0) selected  @endif>
                                Kontrol Edilmedi
                            </option>
                            <option value="1" @if($pay->confirmation == 1) selected  @endif>
                                Onaylandı
                            </option>
                            <option value="2" @if($pay->confirmation == 2) selected  @endif>
                                İptal Edildi
                            </option>

                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn bg-yellow pull-right">Kaydet</button>
                </div>
            </div>
            {!! Form::close() !!}

        @endif

    </div>
@endsection