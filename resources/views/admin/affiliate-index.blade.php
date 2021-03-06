@extends('layouts.admin')
@section('heading')
    <h1>
        Affilate İşlemleri
    </h1>
@endsection
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Affilate Üyeler</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Ad Soyad / Username </th>
                    <th>E-Mail</th>
                    <th>Afi Kodu</th>
                    <th>Afi Oran</th>
                    <th>Düzenle</th>
                </tr>
                </thead>
                <tbody>
                @foreach($affis as $user)
                    <tr>
                        <td><a href="/admin/uyeler/{{$user->id}}">{{$user->name}} / {!! $user->username !!}</a></td>
                        <td>{{$user->email}}</td>
                        <td> <a href="{!! url('/?referans=').$user->afi_kod !!}">{{$user->afi_kod}}</a></td>
                        <td>{{$user->afi_oran}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="/admin/uyeler/{{$user->id}}/edit"   data-toggle="tooltip" title="Düzenle" class="btn bg-olive margin"><i class="fa fa-gear"></i></a>
                            <a href="/admin/uyeler/{{$user->id}}"  data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Kullanıcı Tamamen Silinecek Eminmisin?" class="btn bg-orange margin">Sil</a>
                            <a class="btn bg-blue margin" data-toggle="modal" data-target=".bs-example-modal-lg-{!! $user->id !!}">Kod</a>
                            <a  class="btn bg-red margin" data-toggle="modal" data-target=".bs-example-modal-lg-{!! $user->id !!}-not">Not</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>




    @foreach($affis as $user)

        <div class="modal fade bs-example-modal-lg-{!! $user->id !!}" tabindex="-1" role="dialog" aria-labelledby="{!! $user->id !!}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Üye Kodları</h4>
                    </div>
                    <div class="modal-body">
                        {!!  $foo = (count($user->kod) < 1) ? "Kod Tanımlanmamış" : $user->kod !!}
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade bs-example-modal-lg-{!! $user->id !!}-not" tabindex="-1" role="dialog" aria-labelledby="{!! $user->id !!}-not">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Üye Kodları</h4>
                    </div>
                    <div class="modal-body">
                        {!!  $foo = (count($user->notlar) < 1) ? "Not Eklenmemiş" : $user->notlar !!}
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="ad" style="display: none">
        <textarea class="summernote" id="kodPut" name="kod"></textarea>
    </div>

@endsection
