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
                                <td><a href="/admin/uyeler/{{$user->id}}">{{$user->name}}</a> / {!! $user->username !!}</td>
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




@endsection
