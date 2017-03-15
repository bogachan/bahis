@extends('layouts.home')

@section('slider')

    <?php $sliders = DB::table('sliders')->get(); ?>

        <div id="slider" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                @foreach($sliders as $key => $slider)
                    <li data-target="#carousel-example-generic" data-slide-to="{!! $slider->id !!}" @if($key = 0) class="active" @endif ></li>
                @endforeach
            </ol>

            <div class="carousel-inner" role="listbox">
                @foreach($sliders as $key => $slider)
                <div class="item @if($key = 0) active  @endif" style="background-image: url(/uploads/slider/{!! $slider->bg !!});">
                    <div class="container">
                        <div class="lefts">
                            <h2>{!! $slider->title !!}</h2>
                            <h3>{!! $slider->sub_title !!}</h3>
                            <p>{!! $slider->content !!}</p>
                            <a href="{!! $slider->link !!}" class="slider-button">Avantajları İncele</a>
                        </div>
                        <div class="rights">
                            <img src="/uploads/slider/{!! $slider->img !!}" alt="">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
                <i class="fa fa-chevron-left glyphicon-chevron-left"></i>
            </a>
            <a class="right carousel-control" href="#slider" role="button" data-slide="next">
                <i class="fa fa-chevron-right glyphicon-chevron-right"></i>
            </a>
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