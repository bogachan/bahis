@extends('layouts.app')

@section('content')

    @foreach($promos as $promo)
        <div class="prom-box">
            <div>
                <h3>{!! $promo->title !!}</h3>
                <h4>{!! $promo->sub_title !!}</h4>
                 <button data-toggle="modal" data-target="#promoModal-{!! $promo->id !!}">DETAYLI BİLGİ</button>
            </div>
            <img src="/uploads/{!! $promo->img !!}"  alt="">
        </div>

        <div class="promo-modal modal fade" id="promoModal-{!! $promo->id !!}" tabindex="-1" role="dialog" aria-labelledby="promoModal-{!! $promo->id !!}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close button-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <img src="/uploads/{!! $promo->img !!}"  alt="" class="modal-img">
                     </div>
                    <div class="modal-body">
                        <h4>{!! $promo->title !!}</h4>
                        <h5>{!! $promo->sub_title !!}</h5>
                        <p>{!! $promo->content !!}</p>

                    </div>
                    <div class="modal-footer">
                        <div class="duble" style="border: 1px solid #ffc722;float: right;">
                            <a href="{!! $promo->link !!}" class="button-main">{!! $promo->link_text !!} <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @endforeach

@endsection





