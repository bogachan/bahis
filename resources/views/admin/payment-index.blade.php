@extends('layouts.admin')


@section('heading')
    <h1>
        İşlemler
    </h1>
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Son İşlemler</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>İşlem İd</th>
                    <th>Kullanıcı</th>
                    <th>İşlem</th>
                    <th>Miktar</th>
                    <th>Zaman</th>
                    <th>Düzenle</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{$payment->id}}</td>
                        <td>{{ $payment->find($payment->id)->users->name }}</td>
                        <td style="text-align:center">
                            @if($payment->type == 1)
                                <small class="label bg-yellow">Yatırdı</small>
                            @elseif($payment->type == 2)
                                <small class="label bg-red">Çekti</small>
                            @elseif($payment->type == 3)
                                <small class="label bg-green">Kazandı</small>
                            @elseif($payment->type == 4)
                                <small class="label bg-blue">Kaybetti</small>
                            @endif
                        </td>
                        <td>{{$payment->amount}}</td>
                        <td>{{$payment->created_at->diffForHumans()}}</td>

                        <td>
                            <a href="/admin/islem/{{$payment->id}}/edit" class="btn btn-primary eylem" data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                            <a href="/admin/islem/{{$payment->id}}" class="btn btn-danger eylem" data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Emin misin ?"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="text-center">
        {{$payments->links()}}
    </div>
@endsection