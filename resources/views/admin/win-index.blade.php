@extends('layouts.admin')


@section('heading')
    <h1>
        Çekim Talebleri
    </h1>
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Son Çekimler</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>İşlem İd</th>
                    <th>Kullanıcı</th>
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
                        <td>{{ $pay->find($pay->id)->users->name }}</td>
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