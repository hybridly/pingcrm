<?php

namespace App\Http\Controllers;

use App\Data\LoginData;
use App\Providers\RouteServiceProvider;
use Hybridly\Contracts\HybridResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): HybridResponse
    {
        return hybridly('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginData $data): RedirectResponse
    {
        $data->authenticate();
        session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(): RedirectResponse
    {
        Auth::guard('web')->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }
}
