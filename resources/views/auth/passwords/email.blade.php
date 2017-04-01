@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <h1>Şifre Sıfırla</h1>
    <div class="row">
        <div class="col-md-6">
            @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
            @endif
                <form class="puts" role="form" method="POST" action="{{ url('/password/email') }}">
                    {{ csrf_field() }}
                    <label for="email">E-Mail Adresiniz</label>

                    <input id="email" type="email" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <button type="submit" class="form-button fr" style="margin-top: 2px ">Sıfırla <i class="fa fa-chevron-right"></i><</button>

                </form>
        </div>
    </div>
@endsection
