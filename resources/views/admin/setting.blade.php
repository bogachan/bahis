@extends('layouts.admin')

@section('heading')
    <h1>
        Site Ayarları
        <small>Güncelle</small>
    </h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-body">
            <div class="row">
                {!! Form::open(['url' => '/admin/ayarlar/guncelle','method' => 'put']) !!}

                <div class="col-md-12">
                    <h3 style="color: #3c7698; border-bottom: 1px solid #eee; margin-bottom: 20px; padding-bottom: 15px; margin-top: 5px; font-size: 18px; font-weight: 600; ">Genel Ayarlar</h3>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Site Adı</label>
                        <input type="text" name="site_name" class="form-control" value="{!! config('settings.site_name') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="site_title" class="form-control" value="{!! config('settings.site_title') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="site_description" class="form-control" value="{!! config('settings.site_description') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Keywords</label>
                        <input type="text" name="site_keywords" class="form-control" value="{!! config('settings.site_keywords') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Facebook Sayfa Url</label>
                        <input type="text" name="site_facebook" class="form-control" value="{!! config('settings.site_facebook') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Twitter Sayfa Url</label>
                        <input type="text" name="site_twitter" class="form-control" value="{!! config('settings.site_twitter') !!}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">G-Plus Sayfa Url</label>
                        <input type="text" name="site_google" class="form-control" value="{!! config('settings.site_google') !!}">
                    </div>
                </div>

                 <div class="col-md-12">
                     <h3 style="color: #3c7698; border-bottom: 1px solid #eee; margin-bottom: 20px; padding-bottom: 15px; margin-top: 5px; font-size: 18px; font-weight: 600; ">Site Alanları</h3>
             </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Hakkımızda Kutusu</label>
                        <textarea name="site_hakkimizda" class="summernote" >{!! config('settings.site_hakkimizda') !!}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Neden Biz Kutusu</label>
                        <textarea name="site_neden" class="summernote" >{!! config('settings.site_neden') !!}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Ödeme Yap Yardım Alanı</label>
                        <textarea name="site_odeme_yardim" class="summernote" >{!! config('settings.site_odeme_yardim') !!}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Ödeme Yap Yardım Alanı 2</label>
                        <textarea name="site_odeme_yardim_2" class="summernote" >{!! config('settings.site_odeme_yardim_2') !!}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Çekim Yap Yardım Alanı</label>
                        <textarea name="site_cekim_yardim" class="summernote" >{!! config('settings.site_cekim_yardim') !!}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Transfer Yardım Alanı</label>
                        <textarea style="max-height:130px;" name="site_transfer_yardim" class="summernote" >{!! config('settings.site_transfer_yardim') !!}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">İletişim Text Alanı</label>
                        <textarea style="max-height:130px;" name="site_iletisim_text" class="summernote" >{!! config('settings.site_iletisim_text') !!}</textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <h3 style="color: #3c7698; border-bottom: 1px solid #eee; margin-bottom: 20px; padding-bottom: 15px; margin-top: 5px; font-size: 18px; font-weight: 600; ">Günün Maçı</h3>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site Bir Ad</label>
                        <input type="text" name="enyuksek_site_bir" class="form-control" value="{!! config('settings.enyuksek_site_bir') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site İki Ad</label>
                        <input type="text" name="enyuksek_site_iki" class="form-control" value="{!! config('settings.enyuksek_site_iki') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site Üç Ad</label>
                        <input type="text" name="enyuksek_site_uc" class="form-control" value="{!! config('settings.enyuksek_site_uc') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site Dört Ad</label>
                        <input type="text" name="enyuksek_site_dort" class="form-control" value="{!! config('settings.enyuksek_site_dort') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site Bir Oran 1</label>
                        <input type="text" name="enyuksek_oran_bir" class="form-control" value="{!! config('settings.enyuksek_oran_bir') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site Bir Oran 0</label>
                        <input type="text" name="enyuksek_oran_bir_sifir" class="form-control" value="{!! config('settings.enyuksek_oran_bir_sifir') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site Bir Oran 2</label>
                        <input type="text" name="enyuksek_oran_bir_iki" class="form-control" value="{!! config('settings.enyuksek_oran_bir_iki') !!}">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site İki Oran 1</label>
                        <input type="text" name="enyuksek_oran_iki" class="form-control" value="{!! config('settings.enyuksek_oran_iki') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site İki Oran 0</label>
                        <input type="text" name="enyuksek_oran_iki_sifir" class="form-control" value="{!! config('settings.enyuksek_oran_iki_sifir') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site İki Oran 2</label>
                        <input type="text" name="enyuksek_oran_iki_iki" class="form-control" value="{!! config('settings.enyuksek_oran_iki_iki') !!}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site Üç Oran 1</label>
                        <input type="text" name="enyuksek_oran_uc" class="form-control" value="{!! config('settings.enyuksek_oran_uc') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site Üç Oran 0</label>
                        <input type="text" name="enyuksek_oran_uc_sifir" class="form-control" value="{!! config('settings.enyuksek_oran_uc_sifir') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site Üç Oran 2</label>
                        <input type="text" name="enyuksek_oran_uc_iki" class="form-control" value="{!! config('settings.enyuksek_oran_uc_iki') !!}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site Dört Oran 1</label>
                        <input type="text" name="enyuksek_oran_dort" class="form-control" value="{!! config('settings.enyuksek_oran_dort') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site Dört Oran 0</label>
                        <input type="text" name="enyuksek_oran_dort_sifir" class="form-control" value="{!! config('settings.enyuksek_oran_dort_sifir') !!}">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Site Dört Oran 2</label>
                        <input type="text" name="enyuksek_oran_dort_iki" class="form-control" value="{!! config('settings.enyuksek_oran_dort_iki') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Takımlar</label>
                        <input type="text" name="enyuksek_takimlar" class="form-control" value="{!! config('settings.enyuksek_takimlar') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Maç Saati</label>
                        <input type="text" name="enyuksek_saat" class="form-control" value="{!! config('settings.enyuksek_saat') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Maç Tarih</label>
                        <input type="text" name="enyuksek_tarih" class="form-control" value="{!! config('settings.enyuksek_tarih') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Lig - Ülke</label>
                        <input type="text" name="enyuksek_lig" class="form-control" value="{!! config('settings.enyuksek_lig') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">En Yüksek Oran</label>
                        <input type="text" name="enyuksek_oran" class="form-control" value="{!! config('settings.enyuksek_oran') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">En Yüksek Oran Site Link</label>
                        <input type="text" name="enyuksek_link" class="form-control" value="{!! config('settings.enyuksek_link') !!}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">En Yüksek Oran Site Logo</label>
                        <input type="text" name="enyuksek_logo" class="form-control" value="{!! config('settings.enyuksek_logo') !!}">
                    </div>
                </div>

                <div class="col-md-12">
                    {!! Form::bsSubmit('gonder','Gönder') !!}
                </div>


                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection