@extends('layouts.admin')


@section('heading')
<h1>Sliderlar</h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tüm Sliderlar</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover">
            <thead>
            <tr>
                <th>İd</th>
                <th>Title</th>
                <th>İşlem Yap</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sliders as $slider)
            <tr>
                <td>{!! $slider->id !!}</td>
                <td>{!! $slider->title !!}</td>

                <td>
                    <a href="/admin/slider/{{$slider->id}}" class="btn bg-olive margin" data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                    <a href="/admin/slider/{{$slider->id}}" class="btn bg-orange margin" data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Emin misin ?"><i class="fa fa-remove"></i></a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>
@endsection