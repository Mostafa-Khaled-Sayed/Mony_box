<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (auth()->guard('web')->attempt($request->only('email', 'password'))) {
             if (auth()->guard('web')->user()->status === 'مفعل')
                return redirect()->intended(RouteServiceProvider::HOME);
               
          
        }
        return redirect()->back()->withErrors(['error' => 'The Account Is Not Found']);
    }
}
