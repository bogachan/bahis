@extends('layouts.app')

@section('content')
    <?php
    $sites =  \App\Site::all();
    $banks =  \App\Bank::all();
    ?>

    {!! Form::open(['url' => '/cekim/create','method' => 'post','class' => 'puts']) !!}

    <h1>Para Çekme</h1>

    <div class="row">
        <div class="col-md-6">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="text" name="name" placeholder="Name" value="{!! $user->name !!}" disabled style="background: #f9f9f9; border: 2px solid #d8d8d8; cursor: no-drop;">
            <input type="text" name="hesap_isim" placeholder="İban Hesabı Sahibi Ad Soyad">

                <div class="">
                    <select name="banka" id="" style=" border-right: 0 !important; border-top-right-radius: 0; border-bottom-right-radius: 0; ">
                        @foreach($banks as $bank)
                            <option value="{!! $bank->id !!}">{!! $bank->name !!}</option>
                        @endforeach
                    </select>
                </div>

                <input type="text" name="iban" placeholder="İban No">

            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="hesap_no" placeholder="Hesap No">
                </div>
                <div class="col-sm-6">
                    <input type="text" name="sube" placeholder="Şube Kodu">
                </div>
            </div>


                <div class="">
                    <select id="tpye" name="site">
                        @foreach($sites as $site)
                            <option value="{!! $site->id !!}">{!! $site->name !!}</option>
                        @endforeach
                    </select>
                </div>

                <input id="miktar" placeholder="Talep Edilen Miktar" type="text" name="miktar">

                <textarea name="not" id="" cols="4" rows="4" placeholder="Para çekme işlemi ile alakalı notunuz varmı?"></textarea>


                <input type="hidden" name="user_id" value="{!! $user->id !!}">

            <button type="submit" class="button-primary fr" style="margin-top: 2px;height: 48px;line-height: 48px;">Gönder</button>

        </div>
        <div class="col-sm-6">
            <div class="txt">
                {!! config('settings.site_cekim_yardim') !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}





@endsection
