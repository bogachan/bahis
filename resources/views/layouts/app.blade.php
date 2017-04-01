<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{!! config('settings.site_title') !!}</title>
    <meta name="description" content="{!! config('settings.site_description') !!}">
    <meta name="keywords" content="{!! config('settings.site_keywords') !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/main.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/toastr.min.css') !!}">

    <!--Start of Zopim Live Chat Script-->
    <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
            d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
            $.src="//v2.zopim.com/?4eGCv4lpPY2H6niXwbgqaw14RlJZrP71";z.t=+new Date;$.
                type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>
    <!--End of Zopim Live Chat Script-->

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-88392997-1', 'auto');
        ga('send', 'pageview');

    </script>

</head>
<body data-status="{{Session::get('durum')}} @if ($errors->has('password') or $errors->has('email')) 3 @endif">

<?php if(!empty($_GET['referans'])){ setcookie("referans", $_GET['referans'], time()+60*60*24);} ?>

<div id="header" class="not-home">
    <div class="top">
        <div class="container">

            @if (Auth::guest())
                <ul class="guest">
                    <li><a href="/login">Giriş Yap</a></li>
                    <li><a href="/register">Kayıt OL</a></li>
                </ul>
            @else
                <ul class="login-menu">
                    @if(count(DB::table('messages')->where('to_user_id',Auth::user()->id)->where('read',1)->get()) > 0)
                        <a href="/mesajlar" class="have-message">Mesajınız Var</a>
                    @endif

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->yetkisi_var_mi("admin"))
                                <li><a href="{{ url('/admin/') }}"><i class="fa fa-modx"></i> Admin Panele Git</a></li>
                                <li><a href="{{ url('/admin/ayarlar/') }}"><i class="fa fa-wrench"></i> Site Ayarları</a></li>
                                <li><a href="{{ url('/admin/odeme') }}"><i class="fa fa-mail-forward"></i> Para Yatırma Talepleri</a></li>
                                <li><a href="{{ url('/admin/cekim') }}"><i class="fa fa-mail-reply"></i> Para Çekme Talepleri</a></li>
                                <li class="divider"></li>
                            @endif
                            @if(Auth::user()->yetkisi_var_mi("affiliate"))
                                <li><a href="{{ url('/affiliate') }}"><i class="fa fa-btn fa-wrench"></i> Affiliate</a></li>
                                <li class="divider"></li>
                            @endif
                            <li><a href="/odeme"><i class="fa fa-btn fa-forward"></i> Para Yatırma</a></li>
                            <li><a href="/cekim"><i class="fa fa-btn fa-reply"></i> Para Çekme</a></li>
                            <li><a href="/transfer"><i class="fa fa-btn fa-plane"></i> Para Transferi</a></li>
                            <li><a href="/transfer/islemler"><i class="fa fa-btn fa-briefcase"></i> Tüm Talepleriniz</a></li>
                            <li><a href="/kodlar/"><i class="fa fa-btn fa-align-left"></i> Kodlarınız</a></li>
                            <li><a href="/mesajlar"><i class="fa fa-envelope-o"></i> Mesajlar</a></li>
                            <li><a href="/logout"><i class="fa fa-btn fa-power-off"></i> Çıkış Yap</a></li>
                        </ul>
                    </li>
                </ul>
            @endif
        </div>
    </div>
    <div class="bottom">
        <div class="logo-bg"></div>
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ url('/') }}/assets/img/logo-2.png" alt=""></a>
            </div>
            <div class="menu">

                <div class="dropdown mobile">
                    <button class="dropdown-toggle" type="button" id="mobil-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="mobil-menu">
                        @if (Auth::guest())
                            <li><a class="line" href="{{ url('/register') }}">KAYIT OL</a></li>
                            <li><a class="line" href="{{ url('/login') }}">GİRİŞ YAP</a></li>
                        @else
                            @if(Auth::user()->yetkisi_var_mi("admin"))
                                <li><a href="{{ url('/admin/') }}"><i class="fa fa-modx"></i> Admin Panele Git</a></li>
                                <li><a href="{{ url('/admin/ayarlar/') }}"><i class="fa fa-wrench"></i> Site Ayarları</a></li>
                                <li><a href="{{ url('/admin/odeme') }}"><i class="fa fa-mail-forward"></i> Para Yatırma Talepleri</a></li>
                                <li><a href="{{ url('/admin/cekim') }}"><i class="fa fa-mail-reply"></i> Para Çekme Talepleri</a></li>
                                <li class="divider"></li>
                            @endif
                            @if(Auth::user()->yetkisi_var_mi("affiliate"))
                                <li><a href="{{ url('/affiliate') }}"><i class="fa fa-btn fa-wrench"></i> Affiliate</a></li>
                                <li class="divider"></li>
                            @endif
                            <li><a href="/odeme"><i class="fa fa-btn fa-forward"></i> Para Yatırma</a></li>
                            <li><a href="/cekim"><i class="fa fa-btn fa-reply"></i> Para Çekme</a></li>
                            <li><a href="/transfer"><i class="fa fa-btn fa-plane"></i> Para Transferi</a></li>
                            <li><a href="/transfer/islemler"><i class="fa fa-btn fa-briefcase"></i> Tüm Talepleriniz</a></li>
                            <li><a href="/kodlar/"><i class="fa fa-btn fa-align-left"></i> Kodlarınız</a></li>
                            <li><a href="/mesajlar"><i class="fa fa-envelope-o"></i> Mesajlar</a></li>
                            <li><a href="/logout"><i class="fa fa-btn fa-power-off"></i> Çıkış Yap</a></li>
                        @endif
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/') }}">Anasayfa</a></li>
                        <li><a href="{{ url('/sayfa/hakkimizda') }}">Hakkımızda</a></li>
                        <li><a href="{{ url('/sayfa/sik-sorulan-sorular') }}">Sık Sorulan Sorular</a></li>
                        <li><a href="{{ url('/promosyonlar/') }}">Promosyonlar</a></li>
                        <li><a href="{{ url('/iletisim/') }}">İletişim</a></li>
                    </ul>
                </div>

                <ul class="top-menu">
                    <li><a href="{{ url('/') }}">Anasayfa</a></li>
                    <li><a href="{{ url('/') }}/sayfa/hakkimizda">Hakkımızda</a></li>
                    <li><a href="{{ url('/') }}/sayfa/sik-sorulan-sorular">Sık Sorulan Sorular</a></li>
                    <li><a href="{{ url('/') }}/sayfa/kurallar">Kurallar</a></li>
                    <li><a href="{{ url('/') }}/iletisim/">İletişim</a></li>
                </ul>

            </div>
        </div>
    </div>
</div>
<div class="sub-header">
<div class="container">
    @yield('sub_header')
</div>
</div>

<div id="content">
    <div class="container">

        <div class="left-menu">
            <a class="open-button" href="#"><i class="fa fa-bars"></i> Menü</a>
            <div class="open-up">


                @if (Auth::guest())

                @else
                    <h4>İŞLEMLER</h4>
                    <ul  class="menu-list">
                        <li><a href="/odeme">Para Yatırma</a></li>
                        <li><a href="/cekim">Para Çekme</a></li>
                        <li><a href="/transfer">Para Transferi</a></li>
                        <li><a href="/transfer/islemler">Tüm Talepleriniz</a></li>
                        <li><a href="/kodlar/">Kodlarınız</a></li>
                        <li><a href="/mesajlar">Mesajlar</a></li>
                    </ul>
                @endif


                <h4>Sayfalar</h4>
                <ul class="menu-list">
                    <li><a href="/sayfa/sik-sorulan-sorular">Sık Sorulan Sorular</a></li>
                    <li><a href="/sayfa/kurallar">Kurallar</a></li>
                    <li><a href="/sayfa/hakkimizda">Hakkımızda</a></li>
                    <li><a href="/iletisim">İletişim</a></li>
                </ul>

                <h4>BİZİ TAKİP EDİN</h4>
                <ul class="social">
                    <li><a href="{!! config('settings.site_facebook') !!}"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{!! config('settings.site_twitter') !!}"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{!! config('settings.site_google') !!}"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="content-page">

            @yield('content')

        </div>

    </div>
</div>


<div id="statics">
    <div class="head-static">
        SAYILARLA <span>BAHİSYERİM</span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="join">
                    <span>BİZİMLE KAZANMAK İSTER MİSİN?</span>
                    <div class="duble" style="border: 1px solid #ffc722;float: right;">
                        <a href="/register" class="button-main">HEMEN KAYIT OL <i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <i class="icon-bahis"></i>
                <div class="info bahis">
                    6.216
                    <span>KAZANILAN BAHİS</span>
                </div>
            </div>
            <div class="col-md-3">
                <i class="icon-uye"></i>
                <div class="info">
                    4.599
                    <span>KAYITLI ÜYE</span>
                </div>
            </div>
            <div class="col-md-3">
                <i class="icon-kupon"></i>
                <div class="info">
                    28.302
                    <span>YAPILAN KUPON</span>
                </div>
            </div>
            <div class="col-md-3">
                <i class="icon-partner"></i>
                <div class="info">
                    4
                    <span>PARTNER</span>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="footer">
    <div class="top">
        <div class="container">
            <div class="banks">
                <img src="{{ url('/') }}/assets/img/banks.png" alt="">
            </div>
            <div class="footer-logo">
                <a href="{{ url('/') }}">Bahis <span>Yerim</span></a>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <H4>ÜRÜNLER</h4>
                    <ul>
                        <li><a href="#">Ödemeler </a> </li>
                        <li><a href="#">Abonelikler </a> </li>
                        <li><a href="#">Bağlantı Kurun </a> </li>
                        <li><a href="#">Geçiş </a> </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>GELİŞTİRİCİLER</h4>
                    <ul>
                        <li><a href="#">Dokümantasyon </a> </li>
                        <li><a href="#">API referansı </a> </li>
                        <li><a href="#">API durumu </a> </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>ŞİRKETİMİZ</h4>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Hakkımızda</a> </li>
                        <li><a href="#">İşler</a></li>
                        <li><a href="#">Basın</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>KAYNAKLAR</h4>
                    <ul>
                        <li><a href="#">Destek </a> </li>
                        <li><a href="#">İletişim </a> </li>
                        <li><a href="#">Gizlilik ve şartlar </a> </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <span class="copyright">©2017 - Bahisyerim.com Tüm hakları saklıdır..</span>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js"></script>

@yield('script')




@foreach(DB::table('modals')->get() as $modal)

    <script type="text/javascript">
        $(document).ready(function() {
            if ($.cookie('pop-{!! $modal->id !!}') == null) {
                $('#Duyuru-{!! $modal->id !!}').modal('show');
                $.cookie('pop-{!! $modal->id !!}', '7');
            }
        });
    </script>


    <div class="modal fade" id="Duyuru-{!! $modal->id !!}" tabindex="-1" role="dialog" aria-labelledby="Duyuru-{!! $modal->id !!}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Duyuru-{!! $modal->id !!}dc">{!! $modal->name !!}</h4>
                </div>
                <div class="modal-body">
                    {!! $modal->content !!}
                </div>
                <div class="modal-footer remove-top">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>

@endforeach



</body>
</html>
