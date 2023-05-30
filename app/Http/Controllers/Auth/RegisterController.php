<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravolt\Avatar\Facade as Avatar;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $password = Str::random(15);
        $data['password'] = Hash::make($password);
        $user = User::create($data);
        Mail::to($data['email'])->send(new PasswordMail($password));
        Avatar::create($request->first_name)->save(storage_path('app/public/avatar-' . $user->id . '.png'), 100);
        Auth::login($user);
        return redirect()->route('welcome');
    }
}
