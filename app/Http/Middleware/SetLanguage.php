<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $languages = array_keys(config('app.languages'));

        if (request('lang')) {
            $language = request('lang');
            setcookie("language", request('lang'), time() + (86400 * 30 * 7), "/");
        } elseif (isset($_COOKIE['language'])) {
            $language = $_COOKIE['language'];
        } elseif (config('app.locale')) {
            $language = config('app.locale');
        }
        if (isset($language) && in_array($language, $languages)) {
            app()->setLocale($language);
        }
        $cuurent_lang = Language::where('code', App::currentLocale())->first();
        view()->share('active_lang', Str::ucfirst($cuurent_lang->name));
        return $next($request);
    }
}
