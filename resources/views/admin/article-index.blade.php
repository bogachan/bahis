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
                        <th>Kategori</th>
                        <th>Yazar</th>
                        <th>Yayınlanma Tarihi</th>
                        <th>Eylem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>
                                <input type="checkbox" class="durum" data-id="{{$article->id}}" data-url="/makale/durum-degis" {{$article->durum ? "checked" : null}} >
                            </td>

                            <td>{!! $article->resim!!}</td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->slug}}</td>
                            <td>{{$article->category->title}}</td>
                            <td>{{$article->user->name}}</td>
                            <td>{{$article->created_at->diffForHumans()}}</td>

                            <td>
                                <a href="/admin/haber/{{$article->id}}/edit" class="btn btn-primary eylem" data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                                <a href="/admin/haber/{{$article->id}}" class="btn btn-danger eylem" data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Emin misin ?"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

        </div>

    </div>

    <div class="text-center">
        {{$articles->links()}}
    </div>
@endsection