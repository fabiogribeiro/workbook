<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class SetLocale
{
    /**
     * Set $lang as the new user preference
     *
     * @param string $lang
     * @return void
     */
    public static function recordPreference($lang)
    {
        if (Auth::check()) {
            Auth::user()->lang = $lang;
            Auth::user()->save();
        }
        else {
            session(['lang' => $lang]);
        }
    }

    /**
     * Check whether a client has a language preference defined
     * and return it.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
    */
    private function getPreference()
    {
        if (Auth::check())
            return Auth::user()->lang;

        return session('lang');
    }

    /**
     * Get first locale of HTTP_ACCEPT_LANGUAGE
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    private function getAcceptLanguage($request)
    {
        return substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = $this->getPreference();

        if (!$lang) {
            // Get HTTP_ACCEPT_LANGUAGE and guess it as the preference
            $lang = $this->getAcceptLanguage($request);

            $this->recordPreference($lang);
        }

        app()->setLocale($lang);

        return $next($request);
    }
}
