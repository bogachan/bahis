@extends('layouts.admin')


@section('heading')
    <h1>Promosyonlar</h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tüm Promosyonlar</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <a href="/admin/promosyon/create" class="btn bg-orange margin">Yeni Promosyon Ekle</a>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>İd</th>
                    <th>Title</th>
                    <th>İşlem Yap</th>
                </tr>
                </thead>
                <tbody>
                @foreach($promos as $promo)
                    <tr>
                        <td>{!! $promo->id !!}</td>
                        <td>{!! $promo->title !!}</td>

                        <td>
                            <a href="/admin/slider/{{$promo->id}}" class="btn bg-olive margin" data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                            <a href="/admin/slider/{{$promo->id}}" class="btn bg-orange margin" data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Emin misin ?"><i class="fa fa-remove"></i></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection