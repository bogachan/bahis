@extends('layouts.app')

@section('content')

        <h1>İLETİŞİM</h1>
        <div class="txt lines">
            <p>{!! config('settings.site_iletisim_text') !!}</p>
        </div>
        <div class="puts row">
            {!! Form::open(['url' => '/iletisim/gonder','method' => 'post']) !!}
            <div class="col-md-6">
                    <input type="text" name="name" placeholder="Ad &amp; Soyad">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif

                    <input type="text" name="mail" placeholder="E-mail">
                    @if ($errors->has('mail'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mail') }}</strong>
                    </span>
                    @endif
                    <select name="topic" id="">
                        <option value="0" selected>Genel</option>
                        <option value="1">Reklam</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('/assets/img/contact.png')}}" alt="" style="margin: auto; display:table;">
                </div>
                <div class="col-md-12">
                    <textarea name="content" id="" placeholder="Mesajınız…"></textarea>
                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                    </span>
                    @endif
                    <button type="submit" class="form-button fr" style="margin-top: 20px;">Gönder<i class="fa fa-chevron-right"></i></button>

                </div>
            {!! Form::close() !!}
        </div>

@endsection
