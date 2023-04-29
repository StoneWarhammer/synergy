<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth/login');
    }

    public function store(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withInput()
                ->withErrors([
                    'password' => 'Username or password entered incorrectly'
                ]);
        }
        $request->session()->regenerate();

        return redirect()->route('welcome');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
