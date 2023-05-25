<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view("page.autentikasi.login");
    }

    public function post_login(Request $request)
    {
        $cek = User::where("email", $request->email)->first();

        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();

            if ($cek->role == "admin") {
                return redirect()->intended("/super_admin/dashboard");
            } else if($cek->role == "wadir") {
                return redirect()->intended("/wadir/dashboard");
            } else if($cek->role == "ormawa") {
                return redirect()->intended("/ormawa/dashboard");
            } else{
                return back();
            }
        } else {
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/login");
    }
}
