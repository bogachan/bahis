<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! config('settings.site_name') !!}</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('assets/admin/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/skins/skin-blue.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.csrfToken = '<?php echo csrf_token(); ?>';
    </script>

</head>

<body class="hold-transition skin-blue sidebar-mini" data-status="{{Session::get('durum')}}">
<div class="wrapper" >

    <header class="main-header">

        <!-- Logo -->
        <a href="/admin" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>B</b>Y</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Bahis</b>Yerim</span>
        </a>


    <?php
      $mesajOkunmamis = \App\Message::where('read',0)->count();
      $cekimBekleyen  = \App\Win::where('durum',0)->count();
      $odemeBekleyen  = \App\Pay::where('confirmation',0)->count();
    ?>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>

                            <span class="label label-danger" id="mesajKontrol" @if($mesajOkunmamis < 1) style="display: none;" @endif >
                                {!! $mesajOkunmamis !!}
                            </span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="header">Okunmamış <span class="label label-danger" >{!! $mesajOkunmamis !!}</span> Mesaj var!</li>

                            <li class="footer"><a href="/admin/mesajlar">Kontrol Etmek İçin Tıklayın</a></li>
                        </ul>
                    </li>
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning" id="cekimKontrol" @if($cekimBekleyen < 1) style="display: none;" @endif >{!! $cekimBekleyen !!}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Kontrol Edilmemiş <span class="label label-danger">{!! $cekimBekleyen !!}</span> Çekim talebi var!</li>

                            <li class="footer"><a href="/admin/cekim">Kontrol Etmek İçin Tıklayın</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger" id="odemeKontrol" @if($odemeBekleyen < 1) style="display: none;" @endif >
                                {!! $odemeBekleyen !!}
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Kontrol Edilmemiş <span class="label label-danger">{!! $odemeBekleyen !!}</span> Ödeme talebi var!</li>

                            <li class="footer">
                                <a href="/admin/odeme">Kontrol Etmek İçin Tıklayın</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    Master Admin
                                    <small></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                    <a href="{{  url('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Admin</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>



            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">MENÜ</li>

                <li><a href="/" target="_blank"><i class="fa fa-link"></i> <span>Anasayfa</span></a></li>


                <li><a href="/admin/uyeler"><i class="fa fa-user"></i> <span>Üyeler</span></a></li>


                <li class="treeview">
                    <a href="#"><i class="fa fa-dollar"></i> <span>Çekim Talepleri</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/cekim"><i class="fa fa-link"></i> <span>Tüm Çekim Talepleri</span></a></li>
                        <li><a href="/admin/cekim?d=bekleyen"><i class="fa fa-link"></i> <span>Bekleyen Çekim Talepleri</span></a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-eur"></i> <span>Ödeme Talepleri</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/odeme"><i class="fa fa-link"></i> <span>Tüm Ödemeler</span></a></li>
                        <li><a href="/admin/odeme?d=bekleyen"><i class="fa fa-link"></i> <span>Bekleyen Ödemeler</span></a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-train"></i> <span>Transfer Talepleri</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/transfer"><i class="fa fa-link"></i> <span>Tüm Transferler</span></a></li>
                        <li><a href="/admin/transfer?d=bekleyen"><i class="fa fa-link"></i> <span>Bekleyen Transferler</span></a></li>
                    </ul>
                </li>

                <li><a href="/admin/affiliate"><i class="fa fa-paint-brush"></i> <span>Affiliate</span></a></li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-feed"></i> <span>Siteler</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/site"><i class="fa fa-link"></i> <span>Tüm Siteler</span></a></li>
                        <li><a href="/admin/site/create"><i class="fa fa-link"></i> <span>Site Ekle</span></a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-bank"></i> <span>Bankalar</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/banka"><i class="fa fa-link"></i> <span>Tüm Bankalar</span></a></li>
                        <li><a href="/admin/banka/create"><i class="fa fa-link"></i> <span>Banka Ekle</span></a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Mesajlar</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/mesajlar"><i class="fa fa-commenting-o"></i> <span>Tüm Mesajlar</span></a></li>
                        <li><a href="/admin/mesajlar?d=okunmamis"><i class="fa fa-link"></i> <span>Okunmamış Mesajlar</span></a></li>
                        <li><a href="/admin/mesaj-gonder"><i class="fa fa-link"></i> <span>Mesaj Gönder</span></a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-pagelines"></i> <span>Sayfalar</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/sayfa/"><i class="fa fa-link"></i> <span>Tüm Sayfalar</span></a></li>
                        <li><a href="/admin/sayfa/create"><i class="fa fa-link"></i> <span>Sayfa Ekle</span></a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-pencil"></i> <span>Haberler</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/haber/"><i class="fa fa-link"></i> <span>Tüm Haberler</span></a></li>
                        <li><a href="/admin/haber/create"><i class="fa fa-link"></i> <span>Haber Ekle</span></a></li>
                        <li><a href="/admin/kategoriler"><i class="fa fa-link"></i> <span>Kategoriler</span></a></li>
                        <li><a href="/admin/kategoriler/create"><i class="fa fa-link"></i> <span>Kategori Ekle</span></a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-pencil"></i> <span>Sliderlar</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/slider/"><i class="fa fa-link"></i> <span>Tüm Sliderlar</span></a></li>
                        <li><a href="/admin/slider/create"><i class="fa fa-link"></i> <span>Slider Ekle</span></a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-pencil"></i> <span>Duyurular</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/duyuru/"><i class="fa fa-link"></i> <span>Tüm Duyurular</span></a></li>
                        <li><a href="/admin/duyuru/create"><i class="fa fa-link"></i> <span>Duyuru Ekle</span></a></li>
                    </ul>
                </li>

                <li><a href="/admin/ayarlar"><i class="fa fa-paint-brush"></i> <span>Ayarlar</span></a></li>

                <li><a href="/macbot" target="_blank"><i class="fa fa-android"></i> <span>Maç Bot</span></a></li>


            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('heading')
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Money is Money Aq
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2017 <a href="#">BahisYerim</a>.</strong> All rights reserved.
    </footer>

</div>


<script src="{{asset('assets/admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="{{asset('assets/admin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendor/summernote/summernote.js')}}"></script>
<script src="{{asset('assets/admin/dist/js/app.min.js')}}"></script>
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/laravel-delete.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script>

            function kontrolEt(){
                $.get( '/admin/mesajlar/fetch', function( data ) {
                    if(data < 1){
                        $('#mesajKontrol').hide();
                    }else{
                        $('#mesajKontrol').show().html(data)
                    }
                });

                $.get( '/admin/cekim/fetch', function( data ) {
                    if(data < 1){
                        $('#cekimKontrol').hide();
                    }else{
                        $('#cekimKontrol').show().html(data)
                    }
                });

                $.get( '/admin/odeme/fetch', function( data ) {
                    if(data < 1){
                        $('#odemeKontrol').hide();
                    }else{
                        $('#odemeKontrol').show().html(data)
                    }
                });

            }

            setInterval(kontrolEt,5000);

            if( $('#kodPut').val().length === 0 ) {

                var markupStr = '<table class="table table-striped table-responsive"> <thead> <tr> <th>#</th> <th>Tipbet</th> <th>Wingobet</th> <th>Rivalo</th> <th>Tempobet</th> </tr> </thead> <tbody> <tr> <td><b>Kod</b></td> <td>Tipbet Kod</td> <td>Wingobet Kod</td> <td>Rivalo Kod</td> <td>Tempobet Kod</td> </tr> <tr> <td><b>Şifre</b></td> <td>Tipbet Şifre</td> <td>Wingobet Şifre</td> <td>Rivalo Şifre</td> <td>Tempobet Şifre</td> </tr> </tbody> </table>';

                $('#kodPut').summernote('code', markupStr);

            }

            var pathuser = "{{ route('autouser') }}";
            var pathname = "{{ route('autoname') }}";

            $('#autouser').typeahead({
                source:  function (query, process) {
                    return $.get(pathuser, { query: query }, function (data) {
                        return process(data);
                    });
                }
            });


            $('#autoname').typeahead({
                source:  function (query, process) {
                    return $.get(pathname, { query: query }, function (data) {
                        return process(data);
                    });
                }
            });

            $( ".boot" ).click(function() {
                var id = $(this).attr('data-id');
                var url = 'http://www.bahisyerim1.com/admin/uye/kod/'+id;
                var act =  'http://www.bahisyerim1.com/admin/uye/kod/guncelle/'+id;

                $('#kod-form').attr('action', act);
                $.get( url, function( data ) {
                    $('#kodPut').html(data.kod);
                    $('.note-editable').html(data.kod);
                });
            });

</script>

</body>
</html>