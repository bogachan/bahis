@extends('layouts.admin')


@section('heading')
<h1>Bankalar</h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tüm Bankalar</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover">
            <thead>
            <tr>
                <th>İd</th>
                <th>Banka Adı</th>
                <th>Banka Bilgileri</th>
                <th>Durum</th>
                <th>İşlem Yap</th>
            </tr>
        </thead>
        <tbody>
        @foreach($banks as $bank)
            <tr>
                <td>{!! $bank->id !!}</td>
                <td>{!! $bank->name !!}</td>
                <td>{!! $bank->content !!}</td>
                <td>@if($bank->confirmation == 1) <small class="label bg-green">Aktif</small> @else <small class="label bg-red">Pasif</small> @endif</td>

                <td>
                    <a href="/admin/banka/{{$bank->id}}" class="btn bg-olive margin" data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                    <a href="/admin/banka/{{$bank->id}}" class="btn bg-orange margin" data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Emin misin ?"><i class="fa fa-remove"></i></a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>
@endsection