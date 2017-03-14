@extends('layouts.admin')


@section('heading')
    <h1>
        Bekleyen Çekim Talebleri
    </h1>
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Çekimler</h3>
        </div>
        <div class="box-body table-responsive no-padding">

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>İşlem İd</th>
                    <th>Kullanıcı</th>
                    <th>Banka</th>
                    <th>Miktar</th>
                    <th>Zaman</th>
                    <th>Durum</th>
                    <th>İşlem Yap</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pays as $pay)
                    <tr>
                        <td>{{$pay->id}}</td>
                        <td>{{ $pay->find($pay->id)->users->name }}</td>
                        <td style="text-align:center">
                            {{ DB::table('banks')->where('id', $pay->banka)->value('name') }}
                        </td>
                        <td>{{$pay->miktar}}</td>
                        <td>{{$pay->created_at->diffForHumans()}}</td>
                        <td>@if($pay->durum == 0) Kontrol Edilmedi @elseif($pay->durum == 1) Onaylandı @else İptal Edildi @endif</td>

                        <td>
                            <a href="/admin/cekim/islem/{{$pay->id}}" class="btn btn-primary eylem" data-toggle="tooltip" title="İşlem Yap"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="text-center">
        {{$pays->links()}}
    </div>
@endsection