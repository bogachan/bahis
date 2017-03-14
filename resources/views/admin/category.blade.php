@extends('layouts.admin')
@section('heading')


    <h1>
        Kategori İşlemleri İşlemleri
    </h1>
@endsection
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Kategoriler</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <a href="/admin/kategoriler/create" class="btn bg-orange margin">Kategori Ekle</a>

            <table class="table table-hover">
                <tbody>
                <tr>
                    <td>Resim</td>
                    <td>Başlık</td>
                    <td>Slug</td>
                    <td>Düzenle</td>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>{!! $category->kucuk_resim !!}</td>
                        <td>{{ $category->title}}</td>
                        <td>{{ $category->slug}}</td>
                        <td>
                            <a href="/admin/kategoriler/{{$category->id}}/edit"  class="btn bg-maroon margin"><i class="fa fa-gear"></i></a>
                            <a href="/admin/kategoriler/{{$category->id}}" data-method="delete" data-confirm="Kullanıcı Tamamen Silinecek Eminmisin?" class="btn bg-purple margin">Sil</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <div class="text-center">
        {{$categories->links()}}
    </div>

@endsection
