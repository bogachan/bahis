@extends('layouts.admin')


@section('heading')
    <h1>
        Tüm Haberler
    </h1>
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Haberler</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Durum</th>
                    <th>Resim</th>
                    <th>Başlık</th>
                    <th>Slug</th>
                    <th>Yayınlanma Tarihi</th>
                    <th>Eylem</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>
                            <input type="checkbox" class="durum" data-id="{{$page->id}}" data-url="/makale/durum-degis" {{$page->durum ? "checked" : null}} >
                        </td>

                        <td>{!! $page->kucuk_resim !!}</td>
                        <td>{{$page->title}}</td>
                        <td>{{$page->slug}}</td>
                        <td>{{$page->created_at->diffForHumans()}}</td>

                        <td>
                            <a href="/admin/sayfa/{{$page->id}}/edit" class="btn btn-primary eylem" data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                            <a href="/admin/sayfa/{{$page->id}}" class="btn btn-danger eylem" data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Emin misin ?"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="text-center">
        {{$pages->links()}}
    </div>
@endsection