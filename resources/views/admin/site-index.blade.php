@extends('layouts.admin')


@section('heading')
    <h1>Siteler</h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title with-border">Tüm Siteler</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>İd</th>
                    <th>Site Adı</th>
                    <th>Link</th>
                    <th>Açıklama</th>
                    <th>Durum</th>
                    <th>İşlem Yap</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sites as $site)
                    <tr>
                        <td>{!! $site->id !!}</td>
                        <td>{!! $site->name !!}</td>
                        <td>{!! $site->link !!}</td>
                        <td>{!! $site->content !!}</td>
                        <td>@if($site->durum == 1) <small class="label bg-green">Aktif</small> @else <small class="label bg-red">Pasif</small> @endif</td>

                        <td>
                            <a href="/admin/site/{{$site->id}}" class="btn bg-olive margin" data-toggle="tooltip" title="Düzenle"><i class="fa fa-cog"></i></a>
                            <a href="/admin/site/{{$site->id}}" class="btn bg-orange margin" data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Emin misin ?"><i class="fa fa-remove"></i></a>
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection