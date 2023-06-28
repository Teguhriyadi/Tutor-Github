<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        return view("page.autentikasi.login");
    }
    
    public function post_login(Request $request)
    {
        $messages = [
            "required" => "Kolom :attribute Harus Diisi",
            "min" => "Kolom :attribute Minimal Harus :min Digit"
        ];
        
        $this->validate($request, [
            "email" => "required",
            "password" => "required|min:8"
        ], $messages);
        
        return DB::transaction(function() use ($request) {
            $cek = User::where("email", $request->email)->first();
            
            if ($cek) {
                if ($cek["status"] == "1") {
                    if (Auth::attempt(["email" => $request["email"], "password" => $request["password"]])) {
                        $request->session()->regenerate();
                        
                        if ($cek->role == "admin") {
                            return redirect()->intended("/super_admin/dashboard")->with("message", "BERHASIL LOGIn");
                        } else if($cek->role == "wadir") {
                            return redirect()->intended("/wadir/dashboard")->with("message", "BERHASIL LOGIn");
                        } else if($cek->role == "ormawa") {
                            return redirect()->intended("/ormawa/dashboard")->with("message", "BERHASIL LOGIn");
                        } else{
                            return back();
                        }
                    } else {
                        return back();
                    }
                } else {
                    return back()->withInput()->with("message", "Akun Anda Tidak Aktif");
                }
            } else {
                return back()->withInput()->with("message", "Akun Anda Tidak Ditemukan");
            }
        });
    }
    
    public function logout()
    {
        Auth::logout();
        
        return redirect("/login");
    }
}
