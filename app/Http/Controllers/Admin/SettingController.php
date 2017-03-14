<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Cache\Factory;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::all();
        return view('admin.setting',compact('settings'));
    }

    public function update(Request $request, Factory $cache)
    {

        $cache->forget('settings');


        Setting::find(1)->update(["value" => $request->site_name]);
        Setting::find(2)->update(["value" => $request->site_title]);
        Setting::find(3)->update(["value" => $request->site_description]);
        Setting::find(4)->update(["value" => $request->site_keywords]);
        Setting::find(5)->update(["value" => $request->site_facebook]);
        Setting::find(6)->update(["value" => $request->site_twitter]);
        Setting::find(7)->update(["value" => $request->site_google]);
        Setting::find(8)->update(["value" => $request->site_hakkimizda]);
        Setting::find(9)->update(["value" => $request->site_neden]);
        Setting::find(10)->update(["value" => $request->site_odeme_yardim]);
        Setting::find(11)->update(["value" => $request->site_cekim_yardim]);
        Setting::find(12)->update(["value" => $request->site_transfer_yardim]);
        Setting::find(13)->update(["value" => $request->enyuksek_site_bir]);
        Setting::find(14)->update(["value" => $request->enyuksek_site_iki]);
        Setting::find(15)->update(["value" => $request->enyuksek_site_uc]);
        Setting::find(16)->update(["value" => $request->enyuksek_site_dort]);
        Setting::find(17)->update(["value" => $request->enyuksek_oran_bir]);
        Setting::find(18)->update(["value" => $request->enyuksek_oran_iki]);
        Setting::find(19)->update(["value" => $request->enyuksek_oran_uc]);
        Setting::find(20)->update(["value" => $request->enyuksek_oran_dort]);
        Setting::find(21)->update(["value" => $request->enyuksek_takimlar]);
        Setting::find(22)->update(["value" => $request->enyuksek_saat]);
        Setting::find(23)->update(["value" => $request->enyuksek_tarih]);
        Setting::find(24)->update(["value" => $request->enyuksek_lig]);
        Setting::find(25)->update(["value" => $request->enyuksek_oran]);
        Setting::find(26)->update(["value" => $request->enyuksek_link]);
        Setting::find(27)->update(["value" => $request->enyuksek_logo]);
        Setting::find(28)->update(["value" => $request->site_iletisim_text]);
        Session::flash('durum',1);

        return back();

    }

}
