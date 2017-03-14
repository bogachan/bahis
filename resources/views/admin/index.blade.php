@extends('layouts.admin')


@section('heading')
    <h1>Yönetim</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Bu gün Toplam Üye</span>
                    <span class="info-box-number">{!! \App\User::where('created_at', '>', \Carbon\Carbon::now()->subDay())->count() !!}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Bu Gün Toplam Çekilen</span>
                    <span class="info-box-number">{!! \App\Win::where('created_at', '>=', \Carbon\Carbon::now()->subDay())->where('durum',1)->sum('miktar') !!} TL</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Bu Gün Toplam Yatan</span>
                    <span class="info-box-number">{!! \App\Pay::where('created_at', '>=', \Carbon\Carbon::now()->subDay())->where('confirmation',1)->sum('amount') !!} TL</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-diamond"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Yatırım Yapmış Üye</span>
                    <span class="info-box-number">{!! \App\User::where('odeme',1)->count() !!}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">

            <div class="small-box bg-yellow">
                <div class="inner">
                    <h4>Bekleyen Çekimler</h4>
                    <h3>{!! \App\Win::where('durum',0)->count() !!}</h3>
                    <p>Bekleyen Çekim Tutar: {!! \App\Win::where('durum',0)->sum('miktar') !!} TL</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="/admin/cekim?d=bekleyen" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>

        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">

            <div class="small-box bg-green">
                <div class="inner">
                    <h4>Bekleyen Yatırımlar</h4>
                    <h3>{!! \App\Pay::where('confirmation',0)->count() !!}</h3>
                    <p>Bekleyen Yatırım Tutar: {!! \App\Pay::where('confirmation',0)->sum('amount') !!} TL</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="/admin/odeme?d=bekleyen" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>

        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">

            <div class="small-box bg-red">
                <div class="inner">
                    <h4>Bekleyen Site Transferleri</h4>
                    <h3>{!! \App\Transfer::where('type',2)->where('durum',0)->count() !!} </h3>

                    <p>Toplam Site Transfer : {!! \App\Transfer::where('type',2)->count() !!}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="/admin/transfer?d=bekleyen" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>

        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">

            <div class="small-box bg-aqua">
                <div class="inner">
                    <h4>Bekleyen Arkadaş Transfer </h4>
                    <h3>{!! \App\Transfer::where('type',1)->where('durum',0)->count() !!} </h3>
                    <p>Toplam Arkadaş Transfer : {!! \App\Transfer::where('type',1)->count() !!}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/transfer?d=bekleyen" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>


        </div>
    </div>
@endsection