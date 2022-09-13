<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        // ログインユーザーを取得する
        $user = Auth::id();
        $folder = DB::table('folders')->where('user_id', $user)->first();
        // ログインユーザーに紐づくフォルダを一つ取得する
        // $folder = $user->folders()->first();
        if (is_null($folder)) {
            return view('home');
        }

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
