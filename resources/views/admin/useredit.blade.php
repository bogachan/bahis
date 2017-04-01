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
                ["value" => 2, "text" => "affiliate", "is_checked" => $user->yetkisi_var_mi("affiliate")],
                ["value" => 3, "text" => "Yazar", "is_checked" => $user->yetkisi_var_mi("editor")],
                ["value" => 4, "text" => "Standart", "is_checked" => $user->yetkisi_var_mi("user")],
            ]) !!}
            {!! Form::bsText("name","İsim") !!}
            {!! Form::bsText("username","Username") !!}
            {!! Form::bsText("email","E-mail") !!}

            @foreach($user->roles as $role)
            @if($role->id == 2)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="afi_kod" class="control-label">Afi Linki</label>
                                <input type="text" class="form-control" name="afi_kod" value="{!! url('/?referans=').$user->afi_kod!!}" disabled>
                            </div>
                        </div>

                        <div class="col-md-6">
                            {!! Form::bsText("afi_oran","Afi Oran") !!}
                        </div>
                    </div>
            @endif
            @endforeach


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
