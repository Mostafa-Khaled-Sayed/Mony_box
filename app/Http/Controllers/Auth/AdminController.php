<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function create(): View
    {
        return view('auth.Admin.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        //         $request->authenticate();
        // dd(12);
        //         $request->session()->regenerate();
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (auth()->guard('admin')->attempt($request->only('email', 'password'))) {
            if (auth()->guard('admin')->user()->status === 'مفعل')
            return redirect()->intended(RouteServiceProvider::HOMEUSER);
           
        }
        return redirect()->back()->withErrors(['error' => 'The Account Is Not Found']);


    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    }
}
