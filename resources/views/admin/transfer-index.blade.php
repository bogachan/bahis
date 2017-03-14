@extends('layouts.admin')


@section('heading')
    <h1>
        Transfer Talebleri
    </h1>
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Son Transferler</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>İşlem İd</th>
                    <th>Tür</th>
                    <th>Kulllanıcı</th>
                    <th>Transfer Kullanıcı</th>
                    <th>Site</th>
                    <th>Transfer Site</th>
                    <th>Tutar</th>
                    <th>Durum</th>
                    <th>zaman</th>
                    <th>İşlem</th>

                </tr>
                </thead>
                <tbody>
                @foreach($transfers as $transfer)
                    <tr>
                        <td>{{$transfer->id}}</td>
                        <td>@if($transfer->type == 1) <small class="label bg-green">Arkadaş</small> @else <small class="label bg-yellow">Site</small> @endif</td>
                        <td>{{$transfer->user_name}}</td>
                        <td>{{$transfer->to_user}}</td>
                        <td>{{ \App\Site::where('id',$transfer->site_id)->value('name')  }}</td>
                        <td>{{\App\Site::where('id',$transfer->to_site_id)->value('name')  }}</td>
                        <td>{{$transfer->amount}} TL</td>
                        <td>@if($transfer->durum == 0) <small class="label bg-green">Kontrol Edilmedi</small>  @elseif($transfer->durum == 1) <small class="label bg-aqua">Onaylandı</small> @else <small class="label bg-red">İptal Edildi</small>  @endif</td>

                        <td>{{$transfer->created_at->diffForHumans()}}</td>

                        <td>
                            <a href="/admin/transfer/islem/{{$transfer->id}}?d=onayla" class="btn bg-olive margin" data-toggle="tooltip" title="Onay"><i class="fa fa-check"></i></a>
                            <a href="/admin/transfer/islem/{{$transfer->id}}" class="btn bg-orange margin" data-toggle="tooltip" title="İptal"><i class="fa fa-close"></i></a>
                            <a href="/admin/transfer/duzenle/{{$transfer->id}}" class="btn bg-blue margin" data-toggle="tooltip" title="Düzenle"><i class="fa fa-cog"></i></a>
                            <a class="btn bg-blue margin" data-toggle="modal" data-target=".bs-example-modal-lg-{{ $transfer->user_id }}">Kod</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="text-center">
        {{$transfers->links()}}
    </div>



    @foreach(\App\User::all() as $user)

        <div class="modal fade bs-example-modal-lg-{!! $user->id !!}" tabindex="-1" role="dialog" aria-labelledby="{!! $user->id !!}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Üye Kodları</h4>
                    </div>
                    <div class="modal-body">

                        {!! Form::model($user, ['route' => ['admin.uyeler.update', $user->id],"method" => "put"]) !!}
                        <div style="display: none;">
                            {!! Form::bsCheckbox("rol","Roller", [
                                  ["value" => 1, "text" => "Admin", "is_checked" => $user->yetkisi_var_mi("admin")],
                                  ["value" => 2, "text" => "Yazar", "is_checked" => $user->yetkisi_var_mi("editor")],
                                  ["value" => 3, "text" => "affiliate", "is_checked" => $user->yetkisi_var_mi("affiliate")],
                                  ["value" => 4, "text" => "Standart", "is_checked" => $user->yetkisi_var_mi("user")],
                              ]) !!}
                            {!! Form::bsText("name","İsim") !!}
                            {!! Form::bsText("email","E-mail") !!}
                            {!! Form::bsPassword("password","Şifre") !!}
                            {!! Form::bsTextArea("notlar","Notlar (Üye Görmez)",null,["class" => "summernote"]) !!}
                        </div>
                        {!! Form::bsTextArea("kod","Kodlar",null,["class" => "summernote",'id' => 'kodPut']) !!}
                        {!! Form::bsSubmit("KAYDET") !!}
                        {!! Form::close() !!}

                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

    @endforeach


@endsection