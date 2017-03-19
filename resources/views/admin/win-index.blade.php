@extends('layouts.admin')


@section('heading')
    <h1>
        Çekim Talebleri
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
                    <form action="/admin/cekim" method="get" autocomplete="off">
                        <input id="autouser" type="text" autocomplete="off" name="user" class="typeahead form-control" placeholder="Username..." style="float:left;width: 80%; margin-right: 2%;">
                        <input type="hidden" name="d" value="username">
                        <button type="submit" class="btn bg-orange" style="float:left;border-radius:0;width:18%;">Ara</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <h5>Ad Soyad ile ara</h5>
                    <form action="/admin/cekim" method="get" autocomplete="off">
                        <input id="autoname" type="text" autocomplete="off" name="name" class="typeahead form-control" placeholder="Ad Soyad.." style="float:left;width: 80%; margin-right: 2%;">
                        <input type="hidden" name="d" value="name">
                        <button type="submit" class="btn bg-orange" style="float:left;border-radius:0;width:18%;">Ara</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="butonlar" style="float: left">
                        <h5>Tarihe göre</h5>
                        <a href="/admin/cekim?d=tarih-yeni" class="btn bg-olive margin" style="margin-top: 0" data-toggle="tooltip" title="" data-original-title="Tarahihe Göre Yeni"><i class="fa fa-arrow-up"></i></a>
                        <a href="/admin/cekim?d=tarih-eski" class="btn bg-olive margin" style="margin-top: 0" data-toggle="tooltip" title="" data-original-title="Tarahihe Göre Eski"><i class="fa fa-arrow-down"></i></a>

                    </div>
                    <div class="butonlar" style="float: left">
                        <h5>Tutara göre</h5>
                        <a href="/admin/cekim?d=tutar-yuksek" class="btn bg-olive margin" style="margin-top: 0" data-toggle="tooltip" title="" data-original-title="Tutara Göre Yüksek"><i class="fa fa-arrow-up"></i></a>
                        <a href="/admin/cekim?d=tutar-dusuk" class="btn bg-olive margin" style="margin-top: 0" data-toggle="tooltip" title="" data-original-title="Tutara Göre Düşük"><i class="fa fa-arrow-down"></i></a>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Son Çekimler</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>İşlem İd</th>
                    <th>Ad / Username</th>
                    <th>Miktar</th>
                    <th>Banka</th>
                    <th>Hesap Sahibi</th>
                    <th>İban</th>
                    <th>Hesap No</th>
                    <th>Şube No</th>
                    <th>Not</th>
                    <th>Zaman</th>
                    <th>Durum</th>
                    <th>İşlem Yap</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pays as $pay)
                    <tr>
                        <td>{{$pay->id}}</td>
                        <td>{{ $pay->find($pay->id)->users->name }} / {{ $pay->find($pay->id)->users->username }}</td>
                        <td>{{$pay->miktar}}</td>
                        <td style="text-align:center">
                            {{ DB::table('banks')->where('id', $pay->banka)->value('name') }}
                        </td>
                        <td>{{$pay->hesap_isim}}</td>
                        <td>{{$pay->iban}}</td>
                        <td>{{$pay->hesap_no}}</td>
                        <td>{{$pay->sube}}</td>
                        <td>{{$pay->not}}</td>
                        <td>{{$pay->created_at->diffForHumans()}}</td>
                        <td>@if($pay->durum == 0) <small class="label bg-green">Kontrol Edilmedi</small>  @elseif($pay->durum == 1) <small class="label bg-aqua">Onaylandı</small> @else <small class="label bg-red">İptal Edildi</small>  @endif</td>

                        <td>
                            <a href="/admin/cekim/islem/{{$pay->id}}?d=onayla" class="btn bg-olive margin" data-toggle="tooltip" title="Onay"><i class="fa fa-check"></i></a>
                            <a href="/admin/cekim/islem/{{$pay->id}}?d=iptal" class="btn bg-orange margin" data-toggle="tooltip" title="İptal"><i class="fa fa-close"></i></a>
                            <a href="/admin/cekim/duzenle/{{$pay->id}}" class="btn bg-blue margin" data-toggle="tooltip" title="Düzenle"><i class="fa fa-cog"></i></a>
                            <a class="boot btn bg-blue margin" data-toggle="modal" data-target=".bs-example-modal-lg" data-id="{{ $pay->find($pay->id)->users->id }}">Kod</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="text-center">
        {{$pays->links()}}
    </div>




    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="bs-example-modal-lg">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Üye Kodları</h4>
                </div>
                <div class="modal-body">

                    {!! Form::open(['url' => '/admin/uye/kod/guncelle/','method' => 'put','id'=>'kod-form']) !!}

                    <div class="form-group ">
                        <label for="kod" class="control-label">Kodlar</label>
                        <textarea class="summernote" id="kodPut" name="kod"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-btn fa-save"></i> KAYDET
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


@endsection