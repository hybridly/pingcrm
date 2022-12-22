<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    public function set_locale(string $locale): RedirectResponse
    {
        session()->put("locale", $locale);
        return redirect()->back();
    }
}
