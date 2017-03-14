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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
<body data-status="{{Session::get('durum')}}">


<div id="header">
    <div class="container">
        <div class="logo">
            <a href="{{ url('/') }}"><img style="position:relative;top:-7px" src="{{ url('/') }}/assets/img/logo.png" alt=""></a>
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
                            <li><a href="{{ url('/admin/odeme') }}"><i class="fa fa-mail-forward"></i> Ödeme Talepleri</a></li>
                            <li><a href="{{ url('/admin/cekim') }}"><i class="fa fa-mail-reply"></i> Çekim Talepleri</a></li>
                            <li class="divider"></li>
                        @endif
                        @if(Auth::user()->yetkisi_var_mi("affiliate"))
                            <li><a href="{{ url('/affiliate') }}"><i class="fa fa-btn fa-wrench"></i> Affiliate</a></li>
                            <li class="divider"></li>
                        @endif
                        <li><a href="/odeme"><i class="fa fa-btn fa-forward"></i> Ödeme Yapın</a></li>
                        <li><a href="/cekim"><i class="fa fa-btn fa-reply"></i> Çekim Yapın</a></li>
                        <li><a href="/transfer"><i class="fa fa-btn fa-plane"></i> Transfer Yapın</a></li>
                        <li><a href="/transfer/islemler"><i class="fa fa-btn fa-briefcase"></i> Tüm Talepleriniz</a></li>
                        <li><a href="/kodlar/"><i class="fa fa-btn fa-align-left"></i> Kodlarınız</a></li>
                        <li><a href="/logout"><i class="fa fa-btn fa-power-off"></i> Çıkış Yap</a></li>
                    @endif
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ url('/') }}">Anasayfa</a></li>
                    <li><a href="{{ url('/sayfa/hakkimizda') }}">Hakkımızda</a></li>
                    <li><a href="{{ url('/sayfa/sik-sorulan-sorular') }}">Sık Sorulan Sorular</a></li>
                    <li><a href="{{ url('/sayfa/kurallar') }}">Kurallar</a></li>
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


            <ul class="login-menu">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a class="line" href="{{ url('/register') }}">KAYIT OL</a></li>
                    <li><a class="line" href="{{ url('/login') }}">GİRİŞ YAP</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->yetkisi_var_mi("admin"))
                                <li><a href="{{ url('/admin/') }}"><i class="fa fa-modx"></i> Admin Panele Git</a></li>
                                <li><a href="{{ url('/admin/ayarlar/') }}"><i class="fa fa-wrench"></i> Site Ayarları</a></li>
                                <li><a href="{{ url('/admin/odeme') }}"><i class="fa fa-mail-forward"></i> Ödeme Talepleri</a></li>
                                <li><a href="{{ url('/admin/cekim') }}"><i class="fa fa-mail-reply"></i> Çekim Talepleri</a></li>
                                <li class="divider"></li>
                            @endif
                            @if(Auth::user()->yetkisi_var_mi("affiliate"))
                                <li><a href="{{ url('/affiliate') }}"><i class="fa fa-btn fa-wrench"></i> Affiliate</a></li>
                                <li class="divider"></li>
                            @endif
                            <li><a href="/odeme"><i class="fa fa-btn fa-forward"></i> Ödeme Yapın</a></li>
                            <li><a href="/cekim"><i class="fa fa-btn fa-reply"></i> Çekim Yapın</a></li>
                            <li><a href="/transfer"><i class="fa fa-btn fa-plane"></i> Transfer Yapın</a></li>
                            <li><a href="/transfer/islemler"><i class="fa fa-btn fa-briefcase"></i> Tüm Talepleriniz</a></li>
                            <li><a href="/kodlar/"><i class="fa fa-btn fa-align-left"></i> Kodlarınız</a></li>
                            <li><a href="/logout"><i class="fa fa-btn fa-power-off"></i> Çıkış Yap</a></li>
                        </ul>
                    </li>
                @endif
            </ul>



        </div>
    </div>
</div>

@yield('slider')

<div id="content">
    <div class="container">
        <div class="row">
            @yield('content')
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
                        <li><a href="#">Hakkımızda </a> </li>
                        <li><a href="#">Blog </a> </li>
                        <li><a href="#">İşler </a> </li>
                        <li><a href="#">Basın </a> </li>
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

</body>
</html>
