<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setLocale(LC_TIME,'tr_TR');
        Carbon::setLocale('tr');
        $this->app['form']->component('bsText', 'admin.form.text', ['name', 'label_name','value' => null, 'attributes' => []]);
        $this->app['form']->component('bsSubmit', 'admin.form.submit', ['name', 'value' => 'wewe','url' => URL::previous()]);
        $this->app["form"]->component('bsCheckbox', 'admin.form.checkbox', ['name', 'label_name', 'elemanlar' => [] ]);
        $this->app["form"]->component('bsFile', 'admin.form.file', ['name', 'label_name']);
        $this->app["form"]->component('bsSelect', 'admin.form.select', ['name', 'label_name','value','liste' => [],"placeholder"]);
        $this->app["form"]->component('bsTextArea', 'admin.form.textarea', ['name','label_name', 'value' => null, 'attributes' => []]);
        $this->app["form"]->component('bsPassword', 'admin.form.password', ['name','label_name', 'attributes' => []]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
