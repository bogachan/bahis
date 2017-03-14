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
                <h3 class="box-title">{!! $win->id !!} Nolu Ödeme İşlemini Düzenle</h3>
            </div>
        </div>

         {!! Form::open(['url' => '/admin/cekim/update','method' => 'put']) !!}

        <div class="box-body">
            <input type="hidden" name="id" value="{{$win->id}}">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kullanıcı Adı</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $win->username }}" disabled>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tarih</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$win->created_at->diffForHumans()}}" disabled>
                </div>
            </div>


            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ödeme Talep Edilen Banka</label>
                    <select name="banka" class="form-control">
                        @foreach(DB::table('banks')->get() as $bank)
                            <option value="{{ $bank->id }}" @if($win->banka == $bank->id) selected @endif> {{ $bank->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tutar</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="miktar" value="{{$win->miktar}}" >
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ödeme Yapan İsim Soyisim</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="hesap_isim" value="{{$win->hesap_isim}}" >
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">İban</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="iban" value="{{$win->iban}}" >
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Hesap No</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="hesap_no" value="{{$win->hesap_no}}" >
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Şube No</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="sube" value="{{$win->sube}}" >
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Site</label>
                    <select name="site" class="form-control">
                        @foreach(DB::table('sites')->get() as $site)
                            <option value="{{ $site->id }}" @if($win->site == $site->id) selected @endif> {{ $site->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select name="durum" class="form-control">
                        <option value="0" @if($win->durum == 0) selected  @endif>
                            Kontrol Edilmedi
                        </option>
                        <option value="1" @if($win->durum == 1) selected  @endif>
                            Onaylandı
                        </option>
                        <option value="2" @if($win->durum == 2) selected  @endif>
                            İptal Edildi
                        </option>

                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Not</label>
                    <textarea name="not" class="form-control">{{$win->not}}</textarea>
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn bg-yellow pull-right">Kaydet</button>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
@endsection