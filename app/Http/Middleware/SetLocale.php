<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    const SESSION_KEY = "locale";
    const LOCALES = ["en", "ja"];

    public function handle(Request $request, Closure $next): mixed
    {
        if (!session()->has(self::SESSION_KEY)) {
            session()->put(
                self::SESSION_KEY,
                $request->getPreferredLanguage(self::LOCALES),
            );
        }

        /** @var string */
        $locale = session()->get(self::SESSION_KEY);
        app()->setLocale($locale);

        return $next($request);
    }
}
