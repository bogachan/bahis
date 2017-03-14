@extends('layouts.app')

@section('content')

    <h1>Transfer İŞLEMLERİNİZ</h1>

    <div class="transfer">


        <ul role="tablist">
            <li role="presentation" class="active">
                <a href="#odeme" aria-controls="arkadas" role="tab" data-toggle="tab">
                    Ödeme Talepleri <i class="fa fa-credit-card"></i></a>

            </li>
            <li role="presentation">
                <a href="#cekim" aria-controls="site" role="tab" data-toggle="tab">
                    <i class="fa fa-money"></i> Çekim Talepleri</a>
            </li>
            <li role="presentation">
                <a href="#arkadas" aria-controls="arkadas" role="tab" data-toggle="tab">
                    Arkadaş Transferleri <i class="fa fa-user-plus"></i></a>

            </li>
            <li role="presentation">
                <a href="#site" aria-controls="site" role="tab" data-toggle="tab">
                    <i class="fa fa-retweet"></i> Siteler Arası Transferler</a>
            </li>

        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="site">

                <h3 class="head-sub">Site Transferleri</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>İd</th>
                        <th>Nereden</th>
                        <th>Nereye</th>
                        <th>Miktar</th>
                        <th>Durum</th>
                        <th>Zaman</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($siteler as $site)
                        <tr>
                            <td>{!! $site->id !!}</td>
                            <td>{!! $site->site_id !!}</td>
                            <td>{!! $site->to_site_id !!}</td>
                            <td>{!! $site->amount !!}</td>
                            <td>@if($site->durum == 0) <span style="color:#e44040">Bekliyor</span> @elseif($site->durum == 1) <span style="color:#4a39bd">Onaylandı</span> @else <span style="color:#569828">İptal</span>  @endif</td>
                            <td>{!! $site->created_at !!}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
            <div role="tabpanel" class="tab-pane" id="arkadas">
                <h3 class="head-sub">Arkadaş Transferleri</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>İd</th>
                        <th>Kime</th>
                        <th>Miktar</th>
                        <th>Durum</th>
                        <th>Zaman</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($arkadaslar as $arkadas)
                        <tr>
                            <td>{!! $arkadas->id !!}</td>
                            <td>{!! $arkadas->to_user !!}</td>
                            <td>{!! $arkadas->amount !!}</td>
                            <td>@if($arkadas->durum == 0) <span style="color:#e44040">Bekliyor</span> @elseif($arkadas->durum == 1) <span style="color:#4a39bd">Onaylandı</span> @else <span style="color:#569828">İptal</span>  @endif</td>
                            <td>{!! $arkadas->created_at !!}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>


            </div>
            <div role="tabpanel" class="tab-pane active" id="odeme">
                <h3 class="head-sub">Ödeme Talepleri</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>İd</th>
                        <th>Tutar</th>
                        <th>Banka</th>
                        <th>Durum</th>
                        <th>Zaman</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($odemeler as $odeme)
                        <tr>
                            <td>{!! $odeme->id !!}</td>
                            <td>{!! $odeme->amount !!}</td>
                            <td>{!! $odeme->type !!}</td>
                            <td>@if($odeme->confirmation == 0) <span style="color:#e44040">Bekliyor</span> @elseif($odeme->confirmation == 1) <span style="color:#4a39bd">Onaylandı</span> @else <span style="color:#569828">İptal</span>  @endif</td>
                            <td>{!! $odeme->created_at !!}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>


            </div>
            <div role="tabpanel" class="tab-pane" id="cekim">
                <h3 class="head-sub">Çekim Talepleri</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>İd</th>
                        <th>Banka</th>
                        <th>Hesap Sahibi</th>
                        <th>Tutar</th>
                        <th>Durum</th>
                        <th>Zaman</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($cekimler as $cekim)
                        <tr>
                            <td>{!! $cekim->id !!}</td>
                            <td>{!! $cekim->banka !!}</td>
                            <td>{!! $cekim->hesap_isim !!}</td>
                            <td>{!! $cekim->miktar !!} TL</td>
                            <td>@if($cekim->durum == 0) <span style="color:#e44040">Bekliyor</span> @elseif($cekim->durum == 1) <span style="color:#4a39bd">Onaylandı</span> @else <span style="color:#569828">İptal</span>  @endif</td>
                            <td>{!! $cekim->created_at !!}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>


            </div>
        </div>

    </div>

@endsection
