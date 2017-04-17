@extends('layouts.admin')
@section('heading')
    <h1>
        Üye - {!! $user->id !!}
    </h1>
@endsection
@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Kullanıcı Blgileri</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">

        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Tipi</th>
                <th>Id / Üye Adı / Username</th>
                <th>E-Mail</th>
                <th>Tel</th>
                <th>Üyelik Tarihi</th>
                <th>Düzenle</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-yellow">
                                {{$role->name}}
                            </span>
                        @endforeach
                    </td>
                    <td>{{$user->id}} / {{$user->name}} / {{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->tel}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="/admin/uyeler/{{$user->id}}/edit"   data-toggle="tooltip" title="Düzenle" class="btn bg-olive margin"><i class="fa fa-gear"></i></a>
                        <a href="/admin/uyeler/{{$user->id}}"  data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Kullanıcı Tamamen Silinecek Eminmisin?" class="btn bg-orange margin">Sil</a>
                        <a class="btn bg-blue margin" data-toggle="modal" data-target=".bs-example-modal-lg-{!! $user->id !!}">Kod</a>
                        <a  class="btn bg-red margin" data-toggle="modal" data-target=".bs-example-modal-lg-{!! $user->id !!}-not">Not</a>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>

    <div class="box box-info collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Ödeme Geçmişi</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>İşlem İd</th>
                    <th>Kullanıcı</th>
                    <th>Banka</th>
                    <th>Ödeme Yapan</th>
                    <th>Miktar</th>
                    <th>Zaman</th>
                    <th>Durum</th>
                    <th>Düzenle</th>
                </tr>
                </thead>
                <tbody>

                @foreach(\App\Pay::where('user_id',$user->id)->orderBy('id', 'desc')->get()  as $pay)
                    <tr>
                        <td>{{$pay->id}}</td>
                        <td>{{ $pay->find($pay->id)->users->name }}</td>
                        <td style="text-align:center">
                            {{ DB::table('banks')->where('id', $pay->type)->value('name') }}
                        </td>
                        <td>{{$pay->name}}</td>
                        <td>{{$pay->amount}} TL</td>
                        <td>{{$pay->created_at->diffForHumans()}}</td>
                        <td>@if($pay->confirmation == 0) Kontrol Edilmedi @elseif($pay->confirmation == 1) Onaylandı @else İptal Edildi @endif</td>

                        <td>
                            <a href="/admin/odeme/islem/{{$pay->id}}?d=onayla" class="btn bg-olive margin" data-toggle="tooltip" title="Onay"><i class="fa fa-check"></i></a>
                            <a href="/admin/odeme/islem/{{$pay->id}}?d=iptal" class="btn bg-orange margin" data-toggle="tooltip" title="İptal"><i class="fa fa-close"></i></a>
                            <a href="/admin/odeme/duzenle/{{$pay->id}}" class="btn bg-blue margin" data-toggle="tooltip" title="Düzenle"><i class="fa fa-cog"></i></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="box box-info collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Çekim Geçmişi</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>İşlem İd</th>
                    <th>Miktar</th>
                    <th>Durum</th>
                    <th>Zaman</th>
                    <th>Düzenle</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Win::where('user_id',$user->id)->orderBy('id', 'desc')->get()  as $win)
                    <tr>
                        <td>{{$win->id}}</td>
                        <td>{{$win->miktar}}</td>
                        <td style="text-align:center">
                            @if($win->durum == 0)
                                <small class="label bg-red">Kontrol Edilmedi</small>
                            @elseif($win->durum == 1)
                                <small class="label bg-yellow">Onaylandı</small>
                            @elseif($win->durum == 2)
                                <small class="label bg-green">İptal</small>
                            @endif
                        </td>
                        <td>{{$win->created_at->diffForHumans()}}</td>

                        <td>
                            <a href="/admin/cekim/islem/{{$win->id}}?d=onayla" class="btn bg-olive margin" data-toggle="tooltip" title="Onay"><i class="fa fa-check"></i></a>
                            <a href="/admin/cekim/islem/{{$win->id}}" class="btn bg-orange margin" data-toggle="tooltip" title="İptal"><i class="fa fa-close"></i></a>
                            <a href="/admin/cekim/duzenle/{{$win->id}}" class="btn bg-blue margin" data-toggle="tooltip" title="Düzenle"><i class="fa fa-cog"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="box box-info collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Transfer Geçmişi</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">

                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>İşlem İd</th>
                        <th>İşlem</th>
                        <th>Miktar</th>
                        <th>Durum</th>
                        <th>Zaman</th>
                        <th>Düzenle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Transfer::where('user_id',$user->id)->orderBy('id', 'desc')->get()  as $transfer)
                        <tr>
                            <td>{{$transfer->id}}</td>
                            <td style="text-align:center">
                                @if($transfer->type == 1)
                                    <small class="label bg-yellow">Arkadaş</small>
                                @elseif($transfer->type == 2)
                                    <small class="label bg-red">Site</small>
                                @endif
                            </td>

                            <td style="text-align:center">
                                @if($transfer->durum == 0)
                                    <small class="label bg-red">Kontrol Edilmedi</small>
                                @elseif($transfer->durum == 1)
                                    <small class="label bg-yellow">Onaylandı</small>
                                @elseif($transfer->durum == 2)
                                    <small class="label bg-green">İptal</small>
                                @endif
                            </td>
                            <td>{{$transfer->amount}} TL</td>
                            <td>{{$transfer->created_at->diffForHumans()}}</td>

                            <td>
                                <a href="/admin/transfer/islem/{{$transfer->id}}?d=onayla" class="btn bg-olive margin" data-toggle="tooltip" title="Onay"><i class="fa fa-check"></i></a>
                                <a href="/admin/transfer/islem/{{$transfer->id}}" class="btn bg-orange margin" data-toggle="tooltip" title="İptal"><i class="fa fa-close"></i></a>
                                <a href="/admin/transfer/duzenle/{{$transfer->id}}" class="btn bg-blue margin" data-toggle="tooltip" title="Düzenle"><i class="fa fa-cog"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
    </div>

    <div class="box box-info collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Affiliate</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">

            <?php
            $afi = DB::table('afis')->where('afi_id',$user->afi_kod)->get();
            $afis = array();
            foreach ($afi as $e){
                array_push($afis, DB::table('users')->where('id',$e->user_id)->first());
            }
            ?>
            @foreach($afis as $user)
                <table class="table">
                    <thead>

                    <tr>
                        <th style="width:32%">
                            {!! $user->username !!}
                        </th>
                        <th style="width:32%">Tutar</th>
                        <th>Tarih</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Pay::where('user_id',$user->id)->get()  as $key => $pay)
                        <tr>
                            <td>Yatırım</td>
                            <td>{{$pay->amount}} TL</td>
                            <td>{{$pay->created_at}}</td>
                        </tr>
                    @endforeach
                    @foreach(\App\Win::where('user_id',$user->id)->get() as $key =>  $pay)
                            <tr>
                                <td>Çekim</td>
                                <td>{{$pay->miktar}} TL</td>
                                <td>{{$pay->created_at}}</td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            @endforeach

        </div>
    </div>





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
                            <h4 class="modal-title">Üye Notu</h4>
                        </div>
                        <div class="modal-body">
                            {!!  $foo = (count($user->notlar) < 1) ? "Not Eklenmemiş" : $user->notlar !!}
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

@endsection
