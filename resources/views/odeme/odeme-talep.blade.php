@extends('layouts.app')
@section('sub_header')
    <h1>Para Yatır</h1>
    <ol class="breadcrumb">
        <li><a href="/">Anasayfa</a></li>
        <li class="active">Para Yatır</li>
    </ol>
@endsection
@section('content')
    <?php $sites =  \App\Site::all(); ?>

    <h1>Para Yatırma</h1>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="transfer odemeSecin">
        <ul role="tablist">
            <li role="presentation" class="active">
                <a href="#havale" class="brl" aria-controls="havale" role="tab" data-toggle="tab" aria-expanded="false">
                    <i class="icon-havale"></i>  Havale İle Öde</a>
            </li>
            <li role="presentation" >
                <a href="#cepbank" class="brr" aria-controls="cepbank" role="tab" data-toggle="tab" aria-expanded="true">
                    <i class="icon-tel"></i> Cepbank İle Öde</a>
            </li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="havale">

                <div class="alert alert-info" style=" float: left; width: 100%; margin-top: -33px;">
                    Ödeme Yapacağınız Bankayı Seçiniz. Ödeme Konusunda Yardıma İhtiyacınız varsa
                    <a  class="war-link" data-toggle="modal" data-target="#odemeYardimModal">tıklayın</a>
                </div>
                <div class="alert alert-info" style="float: left;width: 100%;margin-top: -14px;">

                    {!! config('settings.site_odeme_yardim_2') !!}

                </div>
                <div class="companies row" style="float:none;width:auto;margin-bottom: 13px;">
                    @foreach($banks as $bank)
                        <div class="col-xs-12 col-sm-6">
                            <div class="banks-box">
                                <h4><a data-role="button" data-val="{!! $bank->id !!}" class="select-change" id="btnWellington">{!! $bank->name !!}</a> </h4>
                            </div>
                        </div>
                    @endforeach
                </div>

                <h4 class="head-sub" style="margin-bottom: 17px;">Ödeme Bildirimi Yapın</h4>


                {!! Form::open(['url' => '/odeme/create','method' => 'post','class' => 'puts']) !!}


                <div class="row">
                    <div class="col-md-6">

                        <div class="">
                            <select id="Bank"  name="type" >
                                <option value="0">Ödeme Yapılan Banka</option>
                                @foreach($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="">
                            <input id="amount" placeholder="Ödeme Miktarı" type="text" name="amount">
                        </div>

                        <input type="text" name="name" placeholder="Ödeme Yapan Ad Soyad">

                        <div class="row">
                            <div class="col-md-6">
                                <select id="tpye" name="site_id">
                                    <option value="1">Site Seçiniz...</option>
                                    @foreach($sites as $site)
                                        <option value="{!! $site->id !!}">{!! $site->name !!}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <select name="bonus" id="">
                                    <option value="istemiyor">Bonus?</option>
                                    <option value="istemiyor">İstemiyorum</option>
                                    <option value="istiyor">İstiyorum</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="user_id" value="{!! $user->id !!} ">
                        <input type="hidden" name="odeme_tur" value="banka">
                            <button type="submit" class="form-button fr" >Gönder <i class="fa fa-chevron-right"></i></button>
                    </div>
                    <div class="col-md-6">
                        <div id="BankVal">
                            @foreach($banks as $bank)
                                <div id="BankContent-{!! $bank->id !!}" style="display: none">
                                    <h3>Seçilen Banka - {!! $bank->name !!}</h3>
                                    {!! $bank->content !!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
            <div role="tabpanel" class="tab-pane" id="cepbank">


                <div class="alert alert-info" style="float: left; width: 100%; margin-top: -33px;">
                    Ödeme Yapacağınız Bankayı Seçiniz. Ödeme Konusunda Yardıma İhtiyacınız varsa
                    <a class="war-link" data-toggle="modal" data-target="#odemeYardimModal">tıklayın</a>
                </div>

                <div class="alert alert-info" style="float: left;width: 100%;margin-top: -14px;">

                    {!! config('settings.site_odeme_yardim_2') !!}

                </div>

                <h4 class="head-sub" style="margin-bottom: 17px;">Ödeme Bildirimi Yapın</h4>

                {!! Form::open(['url' => '/odeme/create','method' => 'post','class' => 'puts']) !!}

                <div class="row">
                    <div class="col-md-12">

                        <div class="row mobil-fix">
                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="Ödeme Yapan Ad Soyad">
                            </div>
                            <div class="col-md-6">
                                <input id="amount" placeholder="Ödeme Miktarı" type="text" name="amount">
                            </div>
                            <div class="col-md-6">
                                <input id="gonderen-tc" placeholder="Gönderen Tc" type="text" name="gonderen_tc">
                            </div>
                            <div class="col-md-6">
                                <input id="gonderen-tc" placeholder="Alıcı No" type="text" name="alici_no">
                            </div>
                            <div class="col-md-6">
                                <input id="gonderen-tc" placeholder="Alıcı Tc" type="text" name="alici_tc">
                            </div>
                            <div class="col-md-6">
                                <input id="gonderen-tc" placeholder="Gönderen No" type="text" name="gonderen_no">
                            </div>
                            <div class="col-md-6">
                                <input id="gonderen-tc" placeholder="Banka İsmi" type="text" name="cepbank_banka">
                            </div>

                            <div class="col-md-6">
                                <select id="tpye" name="site_id">
                                    <option value="00">Site Seçiniz...</option>
                                    @foreach($sites as $site)
                                        <option value="{!! $site->id !!}">{!! $site->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="bonus" id="">
                                    <option value="istemiyor">Bonus İstiyormusunuz</option>
                                    <option value="istemiyor">İstemiyorum</option>
                                    <option value="istiyor">İstiyorum</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input id="gonderen-tc" placeholder="Referans Şifresi (Varsa)" type="text" name="referans_sifre">

                            </div>
                            <div class="col-md-12">
                                <textarea name="not" placeholder="Extra iletmek istediğiniz not..."></textarea>
                            </div>
                        </div>
                            <input type="hidden" name="user_id" value="{!! $user->id !!} ">
                            <input type="hidden" name="odeme_tur" value="cep">
                        <button type="submit" class="form-button fr" style=" margin-top: 20px; margin-right: 29px; ">Gönder <i class="fa fa-chevron-right"></i></button>


                {!! Form::close() !!}
            </div>
        </div>


                </div>
        </div>

    </div>

@endsection


@section('script')
    <script>
        $('.select-change').click(function(){

            $('#Bank').val($(this).data('val')).trigger('change');

            var selectBank = $(this).data('val');

            $('#BankVal > div').hide();
            $('html, body').animate({
                scrollTop: $(".head-sub").offset().top
            }, 1000);

            $('#BankContent-' + selectBank).show();

        })
    </script>

    <!-- Modal -->
    <div class="modal fade" id="odemeYardimModal" tabindex="-1" role="dialog" aria-labelledby="odemeYardimModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="odemeYardimModal">Ödeme Yardım</h4>
                </div>
                <div class="modal-body">
                    {!! config('settings.site_odeme_yardim') !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-primary fr" data-dismiss="modal" style="margin-top: 2px;height: 48px;line-height: 48px;">Anlaşıldı</button>
                </div>
            </div>
        </div>
    </div>


@endsection