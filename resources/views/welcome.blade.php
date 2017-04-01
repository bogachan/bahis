@extends('layouts.home')

@section('slider')

    <?php $sliders = DB::table('sliders')->get(); ?>

        <div id="slider" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                @foreach($sliders as $key => $slider)
                    <li data-target="#carousel-example-generic" data-slide-to="{!! $slider->id !!}" @if($key == 0) class="active" @endif ></li>
                @endforeach
            </ol>

            <div class="carousel-inner" role="listbox">
                @foreach($sliders as $key => $slider)
                <div class="item @if($key == 0) active  @endif" style="background-image:url(/uploads/slider/{!! $slider->bg !!});background-size:cover;">
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

    <div class="col-md-12">
        <div class="today-match">
            <div class="left">
                <h2>GÜNÜN MAÇI ORAN KARŞILAŞTIRMASI <span class="teams"><i class="icon-gunun-maci"></i> {!! config('settings.enyuksek_takimlar') !!}</span></h2>

                <div class="d">
                    <ul>
                        <li>
                            <h4>{!! config('settings.enyuksek_site_bir') !!}</h4>
                            <i>
                                <span>{!! config('settings.enyuksek_oran_bir') !!}</span>
                                <span>{!! config('settings.enyuksek_oran_bir_sifir') !!}</span>
                                <span>{!! config('settings.enyuksek_oran_bir_iki') !!}</span>
                            </i>
                        </li>
                        <li>
                            <h4>{!! config('settings.enyuksek_site_iki') !!}</h4>
                            <i>
                                <span>{!! config('settings.enyuksek_oran_iki') !!}</span>
                                <span>{!! config('settings.enyuksek_oran_iki_sifir') !!}</span>
                                <span>{!! config('settings.enyuksek_oran_iki_iki') !!}</span>
                            </i>
                        </li>
                        <li>
                            <h4>{!! config('settings.enyuksek_site_uc') !!}</h4>
                            <i>
                                <span>{!! config('settings.enyuksek_oran_uc') !!}</span>
                                <span>{!! config('settings.enyuksek_oran_uc_sifir') !!}</span>
                                <span>{!! config('settings.enyuksek_oran_uc_iki') !!}</span>
                            </i>
                        </li>
                        <li>
                            <h4>{!! config('settings.enyuksek_site_dort') !!}</h4>
                            <i>
                                <span>{!! config('settings.enyuksek_oran_dort') !!}</span>
                                <span>{!! config('settings.enyuksek_oran_dort_sifir') !!}</span>
                                <span>{!! config('settings.enyuksek_oran_dort_iki') !!}</span>
                            </i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <div class="top">
                    <div class="high">EN YÜKSEK ORAN VEREN <span>PARTNERİMİZ</span></div>
                </div>
                <div class="bottom">
                    <div class="high-logo"><img src="{!! config('settings.enyuksek_logo') !!}" alt=""></div>

                    <div class="duble" style="border: 1px solid #222;margin-top: 25px;">
                        <a href="{!! config('settings.enyuksek_link') !!}" target="_blank" class="button-bet"><i>{!! config('settings.enyuksek_oran') !!}</i> Bahis Yap</a>
                    </div>
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
    <div class="col-md-9" style="overflow: hidden;">
                        <div class="weekly-bets">
                            <h2>HAFTANIN POPÜLER BAHİSLERİ</h2>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <td class="w80">Maç</td>
                                        <td style="width: 236px">Saat</td>
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
            <div class="last-win">
                <h3><i class="icon-son-odeme"></i> SON <span>ÖDEMELER</span></h3>
                <div class="padding">
                    <div class="win-box">
                        <div class="left">
                            <span>B******* E****</span>
                            26.03.2017 16:35
                        </div>
                        <div class="right">
                            <span>350 TL</span>
                        </div>
                    </div>
                    <div class="win-box">
                        <div class="left">
                            <span>B**** K***</span>
                            26.03.2017 16:35
                        </div>
                        <div class="right">
                            <span>900 TL</span>
                        </div>
                    </div>
                    <div class="win-box">
                        <div class="left">
                            <span>H****** A*****</span>
                            26.03.2017 16:35
                        </div>
                        <div class="right">
                            <span>2200 TL</span>
                        </div>
                    </div>
                    <div class="win-box">
                        <div class="left">
                            <span>M**** B***** K****</span>
                            26.03.2017 16:35
                        </div>
                        <div class="right">
                            <span>550 TL</span>
                        </div>
                    </div>
                    <div class="win-box">
                        <div class="left">
                            <span>S**** Y*******</span>
                            26.03.2017 16:35
                        </div>
                        <div class="right">
                            <span>150 TL</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection