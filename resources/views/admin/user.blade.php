@extends('layouts.admin')
@section('heading')
    <h1>
        Kullanıcı İşlemleri
    </h1>
@endsection
@section('content')

    <div class="box box-info" style="overflow:visible">
        <div class="box-header">
            <h3 class="box-title">Filtrele</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-3">
                    <h5>Username ile ara</h5>
                    <form action="/admin/uyeler" method="get" autocomplete="off">
                        <input id="autouser" type="text" autocomplete="off" name="user" class="typeahead form-control" placeholder="Username..." style="float:left;width: 80%; margin-right: 2%;">
                        <input type="hidden" name="d" value="username">
                        <button type="submit" class="btn bg-orange" style="float:left;border-radius:0;width:18%;">Ara</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <h5>Ad Soyad ile ara</h5>
                    <form action="/admin/uyeler" method="get" autocomplete="off">
                        <input id="autoname" type="text" autocomplete="off" name="name" class="typeahead form-control" placeholder="Ad Soyad.." style="float:left;width: 80%; margin-right: 2%;">
                        <input type="hidden" name="d" value="name">
                        <button type="submit" class="btn bg-orange" style="float:left;border-radius:0;width:18%;">Ara</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="butonlar" style="float: left">
                        <h5>Tarihe göre</h5>
                        <a href="/admin/uyeler?d=tarih-yeni" class="btn bg-olive margin" style="margin-top: 0" data-toggle="tooltip" title="" data-original-title="Tarahihe Göre Yeni"><i class="fa fa-arrow-up"></i></a>
                        <a href="/admin/uyeler?d=tarih-eski" class="btn bg-olive margin" style="margin-top: 0" data-toggle="tooltip" title="" data-original-title="Tarahihe Göre Eski"><i class="fa fa-arrow-down"></i></a>

                    </div>
                    <div class="butonlar" style="float: left">
                        <h5>Yatırım</h5>
                        <a href="/admin/uyeler?d=yatirim-yapmis" class="btn bg-olive margin" style="margin-top: 0" data-toggle="tooltip" title="" data-original-title="Yatırım Yapmış">Yapmış</a>
                        <a href="/admin/uyeler?d=yatirim-yapmamis" class="btn bg-olive margin" style="margin-top: 0" data-toggle="tooltip" title="" data-original-title="Yatırım Yapmamış">Yapmamış</a>
                    </div>
                    <div class="butonlar" style="float: left">

                    <h5>Tablo Olarak İndir</h5>
                    <a href="/admin/uye/tablo" class="btn bg-olive margin" style="margin-top: 0" data-toggle="tooltip" title="" data-original-title="İndir"><i class="fa fa-cloud-download"></i></a>
                    </div>


                </div>

            </div>

        </div>

    </div>



    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Üyeler</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Tipi</th>
                            <th>İd</th>
                            <th>Ad Soyad / Username </th>
                            <th>E-Mail</th>
                            <th>Üyelik Tarihi</th>
                            <th>Düzenle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    @foreach($user->roles as $role)
                                        <span class="badge bg-yellow">
                                            {{$role->name}}
                                        </span>
                                    @endforeach
                                </td>
                                <td>{{$user->id}}</td>
                                <td><a href="/admin/uyeler/{{$user->id}}">{{$user->name}} / {!! $user->username !!}</a></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
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

    <div class="text-center">
        {{$users->links()}}
    </div>




    @foreach($users as $user)

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
