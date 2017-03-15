<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use App\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['admin_mi','auth']],function (){

    Route::group(['namespace' => 'Admin'], function() {
        Route::get('/admin','AdminController@index');

        Route::get('/admin/ayarlar','SettingController@index');
        Route::put('/admin/ayarlar/guncelle','SettingController@update');

        Route::resource('/admin/uyeler','UserController');
        Route::resource('/admin/kategoriler','CategoriesController');
        Route::resource("/admin/haber","ArticleController");
        Route::post("/admin/haber/durum-degis","ArticleController@durumDegis");

        Route::resource('/admin/banka','BankController');
        Route::resource('/admin/duyuru','ModalController');

        Route::resource('/admin/site','SiteController');

        Route::resource('/admin/slider','SliderController');

        Route::resource("/admin/sayfa","PageController");
        Route::resource('/admin/islem','PaymentController');

        Route::get('/admin/cekim','WinController@index');
        Route::get('/admin/cekim/fetch','WinController@fetch');
        Route::get('/admin/cekim/islem/{id}','WinController@islem');
        Route::get('/admin/cekim/duzenle/{id}', 'WinController@duzenle');
        Route::put('/admin/cekim/update', 'WinController@update');

        Route::get('/admin/odeme','PayController@index');
        Route::get('/admin/odeme/islem/{id}','PayController@islem');
        Route::get('/admin/odeme/fetch','PayController@fetch');
        Route::get('/admin/odeme/duzenle/{id}', 'PayController@duzenle');
        Route::put('/admin/odeme/update', 'PayController@update');

        Route::get('/admin/mesajlar','MessageController@index');
        Route::get('/admin/mesaj/{id}','MessageController@show');
        Route::get('/admin/mesajlar/fetch','MessageController@fetch');
        Route::get('/admin/mesaj-gonder','MessageController@create');
        Route::post('/admin/mesajlar/store','MessageController@store');

        Route::get('/admin/transfer','TransferController@index');
        Route::get('/admin/transfer/islem/{id}', 'TransferController@islem');
        Route::get('/admin/transfer/duzenle/{id}', 'TransferController@duzenle');
        Route::put('/admin/transfer/update', 'TransferController@update');
     });

});

Route::group(['middleware' => ['auth']],function (){

    Route::get('/odeme', 'PaysController@index');
    Route::post('/odeme/create', 'PaysController@create');
    Route::get('/cekim', 'WinController@index');
    Route::post('/cekim/create', 'WinController@create');
    Route::get('/transfer', 'TransferController@index');
    Route::post('/transfer/create', 'TransferController@create');
    Route::get('/transfer/islemler', 'TransferController@islemler');
    Route::get('/kodlar/', function (){ return view('kullanici/kodlar'); });

});



Route::get('/home', 'HomeController@index');
Route::get('/iletisim',function (){ return view('iletisim'); });

Route::post('/iletisim/gonder', 'MessageController@gonder');

Route::get('/sayfa/{slug}', 'PageController@show');
Route::get('/haber/{slug}', 'ArticleController@show');


