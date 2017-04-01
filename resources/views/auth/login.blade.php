<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Giriş Yap</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

</head>
<body class="more-sytle">

<div class="center-low">

    <a class="logo-white" href="{{ url('/') }}"><img src="{{ url('assets') }}/img/logo-white.png" alt=""></a>

    <form role="form" method="POST" action="{{ url('/login') }}" class="puts login-form">
        {{ csrf_field() }}
        <div class="panel-head">
            <h1>GİRİŞ YAP</h1>
            <a class="btn btn-link" href="{{ url('/password/reset') }}">Şifremi unuttum</a>
        </div>

            <input id="email" type="email" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <input id="password" type="password" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        <button type="submit" class="form-button fr" style="margin-top: 2px ">Giriş Yap<i class="fa fa-chevron-right"></i><</button>
    </form>
</div>



<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>