@extends('layouts.admin')


@section('heading')
    <h1>Son Ödemeler</h1>

    <a class="btn bg-olive margin" href="/admin/son-odemeler/create">Ödeme Ekle</a>

@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tüm Son Ödemeler</h3>
        </div>
        <div class="box-body table-responsive no-padding">


            <table class="table table-hover">
                <thead>
                <tr>
                    <th>İd</th>
                    <th>İsim</th>
                    <th>Tutar</th>
                    <th>Tarih</th>
                    <th>Düzenle</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lastpays as $lastpay)
                    <tr>
                        <td>{!! $lastpay->id !!}</td>
                        <td>{!! $lastpay->name !!}</td>
                        <td>{!! $lastpay->amount !!}</td>
                        <td>{!! $lastpay->created_at !!}</td>
                        <td>
                            <a href="/admin/son-odemeler/{{$lastpay->id}}" class="btn bg-olive margin" data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                            <a href="/admin/son-odemeler/{{$lastpay->id}}" class="btn bg-orange margin" data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Emin misin ?"><i class="fa fa-remove"></i></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection