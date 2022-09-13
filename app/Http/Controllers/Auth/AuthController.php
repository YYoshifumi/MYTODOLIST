<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // return View

    public function showlogin()
    {

        return view('auth.login');
    }

    public function login(LoginFormRequest $request)
    {
        $credentials = $request->onnly('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('home');
        }

        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています'
        ]);
    }
}
