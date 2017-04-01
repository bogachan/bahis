<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Kayıt OL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

</head>
<body class="more-sytle">

<?php if(!empty($_GET['referans'])){ setcookie("referans", $_GET['referans'], time()+60*60*24);} ?>


<div class="center-low-join">

    <a class="logo-white" href="{{ url('/') }}"><img src="{{asset('assets/img/logo-white.png')}}" alt=""></a>

    <form class="puts login-form" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}
        <div class="panel-head">
            <h1>ÜYE OL</h1>
            <a class="btn btn-link" href="{{ url('/') }}">Anasayfa</a>

        </div>

        <div class="row">
            <div class="col-md-6">

                <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

                    <input id="name" placeholder="İsim Soyisim"  type="text" name="name" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" placeholder="Email" type="email" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="text" name="username" placeholder="Username">

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif

                </div>

                <div class="{{ $errors->has('tel') ? ' has-error' : '' }}">
                    <input type="text" name="tel" placeholder="Cep Tel">

                    @if ($errors->has('tel'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tel') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">

                <select name="ulke">
                    <option value="Türkiye" selected="selected">Türkiye</option>
                    <option value="ABD Virgin Adaları">ABD Virgin Adaları</option>
                    <option value="Almanya">Almanya</option>
                    <option value="Amerika Birleşik Devletleri">Amerika Birleşik Devletleri</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Antigua ve Barbuda">Antigua ve Barbuda</option>
                    <option value="Arjantin">Arjantin</option>
                    <option value="Arnavutluk">Arnavutluk</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Avustralya">Avustralya</option>
                    <option value="Avusturya">Avusturya</option>
                    <option value="Azerbaycan">Azerbaycan</option>
                    <option value="Bahama">Bahama</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahreyn">Bahreyn</option>
                    <option value="Bangladeş">Bangladeş</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belçika">Belçika</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Beyaz Rusya">Beyaz Rusya</option>
                    <option value="Birleşik Arap Emirlikleri">Birleşik Arap Emirlikleri</option>
                    <option value="Bolivya">Bolivya</option>
                    <option value="Bosna Hersek">Bosna Hersek</option>
                    <option value="Brezilya">Brezilya</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaristan">Bulgaristan</option>
                    <option value="Burma">Burma</option>
                    <option value="Cebelitarık">Cebelitarık</option>
                    <option value="Çek Cumhuriyeti">Çek Cumhuriyeti</option>
                    <option value="Çin">Çin</option>
                    <option value="Danimarka">Danimarka</option>
                    <option value="Dominik Cumhuriyeti">Dominik Cumhuriyeti</option>
                    <option value="Ekvator">Ekvator</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Endonezya">Endonezya</option>
                    <option value="Eritre">Eritre</option>
                    <option value="Ermenistan">Ermenistan</option>
                    <option value="Estonya">Estonya</option>
                    <option value="Fas">Fas</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Filipinler">Filipinler</option>
                    <option value="Finlandiya">Finlandiya</option>
                    <option value="Fransa">Fransa</option>
                    <option value="Fransız Polinezyası">Fransız Polinezyası</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadalup">Guadalup</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Güney Afrika">Güney Afrika</option>
                    <option value="Gürcistan">Gürcistan</option>
                    <option value="Hırvatistan">Hırvatistan</option>
                    <option value="Hindistan">Hindistan</option>
                    <option value="Hollanda">Hollanda</option>
                    <option value="Hollanda Antilleri">Hollanda Antilleri</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="İngiliz Virginia Adaları">İngiliz Virginia Adaları</option>
                    <option value="İngiltere">İngiltere</option>
                    <option value="İrlanda">İrlanda</option>
                    <option value="İspanya">İspanya</option>
                    <option value="İsrail">İsrail</option>
                    <option value="İsveç">İsveç</option>
                    <option value="İsviçre">İsviçre</option>
                    <option value="İtalya">İtalya</option>
                    <option value="İzlanda">İzlanda</option>
                    <option value="Jamaika">Jamaika</option>
                    <option value="Japonya">Japonya</option>
                    <option value="Kamboçya">Kamboçya</option>
                    <option value="Kanada">Kanada</option>
                    <option value="Katar">Katar</option>
                    <option value="Kayman Adaları">Kayman Adaları</option>
                    <option value="Kıbrıs">Kıbrıs</option>
                    <option value="Kolombiya">Kolombiya</option>
                    <option value="Kore">Kore</option>
                    <option value="Kosta Rika">Kosta Rika</option>
                    <option value="Kuveyt">Kuveyt</option>
                    <option value="Küba">Küba</option>
                    <option value="Letonya">Letonya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Litvanya">Litvanya</option>
                    <option value="Lübnan">Lübnan</option>
                    <option value="Lüksemburg">Lüksemburg</option>
                    <option value="Macaristan">Macaristan</option>
                    <option value="Makedonya">Makedonya</option>
                    <option value="Maldivler">Maldivler</option>
                    <option value="Malezya">Malezya</option>
                    <option value="Malta">Malta</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Meksika">Meksika</option>
                    <option value="Mısır">Mısır</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monako">Monako</option>
                    <option value="Mozambik">Mozambik</option>
                    <option value="Nikaragua">Nikaragua</option>
                    <option value="Norveç">Norveç</option>
                    <option value="Özbekistan">Özbekistan</option>
                    <option value="Panama">Panama</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Polonya">Polonya</option>
                    <option value="Portekiz">Portekiz</option>
                    <option value="Porto Riko">Porto Riko</option>
                    <option value="Romanya">Romanya</option>
                    <option value="Rusya">Rusya</option>
                    <option value="Saint Kitts ve Nevis">Saint Kitts ve Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Seyşel">Seyşel</option>
                    <option value="Singapur">Singapur</option>
                    <option value="Slovakya">Slovakya</option>
                    <option value="Slovenya">Slovenya</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Suriye">Suriye</option>
                    <option value="Suudi Arabistan">Suudi Arabistan</option>
                    <option value="Şili">Şili</option>
                    <option value="Tayland">Tayland</option>
                    <option value="Tayvan">Tayvan</option>
                    <option value="Tunus">Tunus</option>
                    <option value="Turks ve Caicos Adaları">Turks ve Caicos Adaları</option>
                    <option value="Ukrayna">Ukrayna</option>
                    <option value="Umman">Umman</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Ürdün">Ürdün</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Yeni Zelanda">Yeni Zelanda</option>
                    <option value="Yunanistan">Yunanistan</option>
                </select>
                <select name="sehir">
                    <option value="1">Adana</option>
                    <option value="2">Adıyaman</option>
                    <option value="3">Afyonkarahisar</option>
                    <option value="4">Ağrı</option>
                    <option value="5">Amasya</option>
                    <option value="6">Ankara</option>
                    <option value="7">Antalya</option>
                    <option value="8">Artvin</option>
                    <option value="9">Aydın</option>
                    <option value="10">Balıkesir</option>
                    <option value="11">Bilecik</option>
                    <option value="12">Bingöl</option>
                    <option value="13">Bitlis</option>
                    <option value="14">Bolu</option>
                    <option value="15">Burdur</option>
                    <option value="16">Bursa</option>
                    <option value="17">Çanakkale</option>
                    <option value="18">Çankırı</option>
                    <option value="19">Çorum</option>
                    <option value="20">Denizli</option>
                    <option value="21">Diyarbakır</option>
                    <option value="22">Edirne</option>
                    <option value="23">Elazığ</option>
                    <option value="24">Erzincan</option>
                    <option value="25">Erzurum</option>
                    <option value="26">Eskişehir</option>
                    <option value="27">Gaziantep</option>
                    <option value="28">Giresun</option>
                    <option value="29">Gümüşhane</option>
                    <option value="30">Hakkâri</option>
                    <option value="31">Hatay</option>
                    <option value="32">Isparta</option>
                    <option value="33">Mersin</option>
                    <option value="34">İstanbul</option>
                    <option value="35">İzmir</option>
                    <option value="36">Kars</option>
                    <option value="37">Kastamonu</option>
                    <option value="38">Kayseri</option>
                    <option value="39">Kırklareli</option>
                    <option value="40">Kırşehir</option>
                    <option value="41">Kocaeli</option>
                    <option value="42">Konya</option>
                    <option value="43">Kütahya</option>
                    <option value="44">Malatya</option>
                    <option value="45">Manisa</option>
                    <option value="46">Kahramanmaraş</option>
                    <option value="47">Mardin</option>
                    <option value="48">Muğla</option>
                    <option value="49">Muş</option>
                    <option value="50">Nevşehir</option>
                    <option value="51">Niğde</option>
                    <option value="52">Ordu</option>
                    <option value="53">Rize</option>
                    <option value="54">Sakarya</option>
                    <option value="55">Samsun</option>
                    <option value="56">Siirt</option>
                    <option value="57">Sinop</option>
                    <option value="58">Sivas</option>
                    <option value="59">Tekirdağ</option>
                    <option value="60">Tokat</option>
                    <option value="61">Trabzon</option>
                    <option value="62">Tunceli</option>
                    <option value="63">Şanlıurfa</option>
                    <option value="64">Uşak</option>
                    <option value="65">Van</option>
                    <option value="66">Yozgat</option>
                    <option value="67">Zonguldak</option>
                    <option value="68">Aksaray</option>
                    <option value="69">Bayburt</option>
                    <option value="70">Karaman</option>
                    <option value="71">Kırıkkale</option>
                    <option value="72">Batman</option>
                    <option value="73">Şırnak</option>
                    <option value="74">Bartın</option>
                    <option value="75">Ardahan</option>
                    <option value="76">Iğdır</option>
                    <option value="77">Yalova</option>
                    <option value="78">Karabük</option>
                    <option value="79">Kilis</option>
                    <option value="80">Osmaniye</option>
                    <option value="81">Düzce</option>
                </select>

                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" placeholder="Şifre " class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                    <input id="password-confirm" placeholder="Şifre Onay"  type="password" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>


            </div>

            <div class="col-md-12">

                <div class="{{ $errors->has('ref') ? ' has-error' : '' }}">
                    <input type="text" name="ref" placeholder="Referans Kodu">

                    @if ($errors->has('tel'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tel') }}</strong>
                        </span>
                    @endif
                </div>


                <div>
                    <span class="okey"><a href="">Hizmet şartlarını</a> okudum ve kabul ediyorum.</span>
                    <button type="submit" class="form-button fr" style="margin-top: 2px ">Kayıt Ol</button>
                </div>
            </div>
        </div>

    </form>
</div>


<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
