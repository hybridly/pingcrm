<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class SetLocale
{
    private const SESSION_KEY = 'locale';

    public function handle(Request $request, Closure $next): mixed
    {
        if (! session()->has(self::SESSION_KEY)) {
            $available_locales = $this->getAvailableLocales();
            session()->put(
                self::SESSION_KEY,
                $request->getPreferredLanguage($available_locales),
            );
        }

        /** @var string */
        $locale = session()->get(self::SESSION_KEY);
        app()->setLocale($locale);

        return $next($request);
    }

    /** @return array<string> */
    private function getAvailableLocales(): array
    {
        return Arr::map(
            Storage::disk('local')->directories(lang_path()),
            fn ($directory) => basename($directory),
        );
    }
}
