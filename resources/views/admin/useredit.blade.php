@extends('layouts.admin')
@section('heading')
    <h1>
        Kullanıcı İşlemleri
    </h1>
@endsection
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Üyeler</h3>
        </div>
        <div class="box-body">
            {!! Form::model($user, ['route' => ['admin.uyeler.update', $user->id],"method" => "put"]) !!}
            {!! Form::bsCheckbox("rol","Roller", [
                ["value" => 1, "text" => "Admin", "is_checked" => $user->yetkisi_var_mi("admin")],
                ["value" => 2, "text" => "Yazar", "is_checked" => $user->yetkisi_var_mi("editor")],
                ["value" => 3, "text" => "affiliate", "is_checked" => $user->yetkisi_var_mi("affiliate")],
                ["value" => 4, "text" => "Standart", "is_checked" => $user->yetkisi_var_mi("user")],
            ]) !!}
            {!! Form::bsText("name","İsim") !!}
            {!! Form::bsText("username","Username") !!}
            {!! Form::bsText("email","E-mail") !!}
            {!! Form::bsPassword("password","Şifre") !!}

           <div class="row">
               <div class="col-md-6">
                   {!! Form::bsTextArea("kod","Kodlar",null,["class" => "summernote",'id' => 'kodPut']) !!}
               </div>
               <div class="col-md-6">
                   {!! Form::bsTextArea("notlar","Notlar (Üye Görmez)",null,["class" => "summernote"]) !!}
               </div>
           </div>
            {!! Form::bsSubmit("KAYDET") !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
