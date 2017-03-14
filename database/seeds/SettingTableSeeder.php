<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create(['name' => 'name','value' => 'Bahis Sepeti']);
        Setting::create(['name' => 'title','value' => 'Bahis Sepeti Title']);
        Setting::create(['name' => 'description','value' => 'Bahis sepeti seo description']);
        Setting::create(['name' => 'keywords','value' => 'Bahis sepeti seo keywords']);
        Setting::create(['name' => 'facebook','value' => '#page-link']);
        Setting::create(['name' => 'twitter','value' => '#page-link']);
        Setting::create(['name' => 'google','value' => '#page-link']);
    }
}
