@extends('layouts.admin')


@section('heading')
<h1>Duyurular</h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tüm Duyurular</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover">
            <thead>
            <tr>
                <th>İd</th>
                <th>İsim</th>
                <th>İçerik</th>
                <th>İşlem Yap</th>
            </tr>
        </thead>
        <tbody>
        @foreach($modals as $modal)
            <tr>
                <td>{!! $modal->id !!}</td>
                <td>{!! $modal->name !!}</td>
                <td>{!! $modal->content !!}</td>

                <td>
                    <a href="/admin/duyuru/{{$modal->id}}" class="btn bg-olive margin" data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                    <a href="/admin/duyuru/{{$modal->id}}" class="btn bg-orange margin" data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Emin misin ?"><i class="fa fa-remove"></i></a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>
@endsection