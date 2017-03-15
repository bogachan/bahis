@extends('layouts.home')

@section('slider')
    <div id="slider">
        <div class="container">
            <div class="lefts">
                <h2>Sadece Kazancınıza Odaklanın</h2>
                <h3 style="margin-bottom: 38px;">Diğer Her Şeyi Biz Halledelim.</h3>
                <p style="height:116px">Bahisyerim.Com ile tüm bahis siteleri bir tık uzağınızda.. Nasıl mı ? Avrupa ve Türkiye de faaliyet gösteren bahis ofisleriyle gerçekleştirdiğimiz anlaşmalar gereği anlaşmalı olduğumuz bahis sitelerinin tüm işlemleri tek bir çatı altında yürütülecektir. Peki yeni nesil bahis anlayışıyla Türkiye de öncü olacak dev projemizin bahis severlere ne gibi katkıları var ?</p>
                <a href="{{ url('/sayfa/hakkimizda"') }} class="slider-button">Avantajları İncele</a>
            </div>
            <div class="rights">
                <img src="{{ url('/assets/img/cr7.png') }}" alt="">
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="companies">

    @foreach(\App\Site::where('durum',1)->get() as $site)
            <div class="col-xs-6 col-sm-3">
                <div class="companie-box">
                    <a href="{!! $site->link !!}" target="_blank">
                        {!! $site->name !!}
                    </a>
                </div>
            </div>
     @endforeach

    </div>
    <div class="today-match">


                    <div class="col-md-8">
                        <div class="left">
                            <h2>GÜNÜN MAÇI ORAN KARŞILAŞTIRMASI</h2>
                            <div class="row">
                                <div class="col-sm-5 pos">
                                    <span class="time">{!! config('settings.enyuksek_saat') !!}</span>
                                    <span class="teams">{!! config('settings.enyuksek_takimlar') !!}</span>
                                    <div>
                                        <span class="date">{!! config('settings.enyuksek_tarih') !!}</span>
                                        <span class="ligs">{!! config('settings.enyuksek_lig') !!}</span>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <ul>
                                        <li>
                                            {!! config('settings.enyuksek_site_bir') !!}
                                            <span>{!! config('settings.enyuksek_oran_bir') !!}</span>
                                        </li>
                                        <li>
                                            {!! config('settings.enyuksek_site_iki') !!}
                                            <span>{!! config('settings.enyuksek_oran_iki') !!}</span>
                                        </li>
                                        <li>
                                            {!! config('settings.enyuksek_site_uc') !!}
                                            <span>{!! config('settings.enyuksek_oran_uc') !!}</span>
                                        </li>
                                        <li>
                                            {!! config('settings.enyuksek_site_dort') !!}
                                            <span>{!! config('settings.enyuksek_oran_dort') !!}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="right">
                            <div class="top">
                                <div class="high">EN YÜKSEK ORAN</div>
                                <div class="high-logo"><img src="{!! config('settings.enyuksek_logo') !!}" alt=""></div>
                            </div>
                            <div class="bottom">
                                <div class="rate">{!! config('settings.enyuksek_oran') !!}</div>
                                <a href="{!! config('settings.enyuksek_link') !!}" target="_blank" class="button-bet">Bahis Yap</a>
                            </div>
                        </div>
                    </div>
                </div>
    <div class="news">


        @foreach(\App\Article::get() as $article)

            <div class="col-xs-6 col-md-3">
                <div class="news-box">
                    <a href="/haber/{!! $article->slug !!}">
                        {!! $article->resim !!}
                         <span>{!! $article->title !!}</span>
                    </a>
                </div>
            </div>
        @endforeach

    </div>
    <div class="more">
                    <div class="col-md-9">
                        <div class="weekly-bets">
                            <h2><i class="">#</i> HAFTANIN POPÜLER BAHİSLERİ</h2>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <td class="w80"></td>
                                        <td style="width: 236px"></td>
                                        <td class="w80">1</td>
                                        <td class="w80">X</td>
                                        <td class="w80">2</td>
                                        <td class="w60"></td>
                                        <td class="w80">O</td>
                                        <td class="w80">U</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {!! DB::table('bots')->where('id', '1')->value('content') !!}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="banner-1">
                            <h3>Bahis <span>Yerim</span></h3>
                            <h4>Bize Katılın</h4>
                            <img src="{{ url('/') }}/assets/img/banner-1-man.png" alt="">
                        </div>
                    </div>
                </div>
@endsection