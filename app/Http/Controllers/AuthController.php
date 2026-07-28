<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(private AuthHelper $authHelper) {}

    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if ($this->authHelper->attemptLogin($request->validated())) {
            $request->session()->regenerate();

            return redirect()->route('events.index')->with('success', 'Login berhasil.');
        }

        return back()->withErrors(['email' => 'Kredensial tidak cocok.']);
    }

    public function showRegisterForm(): View
    {
        // Asumsi data roles dikirim ke view pendaftaran
        $roles = Role::all();

        return view('auth.register', compact('roles'));
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $this->authHelper->registerUser($request->validated());

        return redirect()->route('auth.login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function logout(): RedirectResponse
    {
        $this->authHelper->logoutUser();

        return redirect()->route('auth.login');
    }
}
