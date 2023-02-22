<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $active_langs = $this->get_active_langs();
        view()->share('active_langs', $active_langs['langs']);
        config(['app.languages' => $active_langs['configLanguages']]);
    }
    public function get_active_langs()
    {
        $langs = Language::get();
        $configLanguages = [];
        foreach ($langs as $lang) {
            $configLanguages = array_merge($configLanguages, [
                $lang->code => $lang->name,
            ]);
        }
        return [
            "configLanguages" => $configLanguages,
            "langs" => $langs->map(function ($lang) {
                return [
                    "code" => $lang->code,
                    "name" => $lang->name,
                    "name_ar" => $lang->name_ar,
                    "url" => $lang->url,
                    "src" => $lang->src
                ];
            })->toArray()
        ];
    }
}
