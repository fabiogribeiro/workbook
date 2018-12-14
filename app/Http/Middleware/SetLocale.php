<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    /**
     * Check whether a client has a language preference defined
     * and return it.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
    */
    private function getPreference($request)
    {
        if ($request->user())
            return $request->user()->lang;

        elseif ($request->session()->has('lang'))
            return $request->session()->get('lang');

        return null;
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
        $pref = $this->getPreference($request);

        if ($pref) {
            app()->setLocale($pref);
        }
        else {
            // Get HTTP_ACCEPT_LANGUAGE and guess it as a preference
            // that can later be changed

            $lang = $this->getAcceptLanguage($request);

            if ($request->user()) {
                $request->user()->lang = $lang;
                $request->user()->save();
            }
            else {
                $request->session()->put('lang', $lang);
            }

            app()->setLocale($lang);
        }

        return $next($request);
    }
}
