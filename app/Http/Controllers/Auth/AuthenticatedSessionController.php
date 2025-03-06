<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Memeriksa apakah pengguna yang login adalah admin atau guru
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('guru')) {
            return redirect()->intended(route('dashboard.index', absolute: false));
        }

        // Memeriksa apakah pengguna yang login adalah siswa
        if (auth()->user()->hasRole('siswa')) {
            return redirect()->intended(route('tests.index', absolute: false));
        }

        // Default redirect jika tidak ada kondisi yang cocok
        return redirect()->intended(route('/', absolute: false));
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

