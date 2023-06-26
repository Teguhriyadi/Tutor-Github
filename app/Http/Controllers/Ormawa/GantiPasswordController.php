<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GantiPasswordController extends Controller
{
    public function index()
    {
        return view("page.ormawa.ganti_password.v_index");
    }

    public function update(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute Harus Disii",
            "min" => "Kolom :attribute Minimal Harus :min Digit"
        ];

        $this->validate($request, [
            "password_baru" => "required|min:8",
            "konfirmasi_password" => "required|min:8"
        ], $message);

        return DB::transaction(function() use ($request) {

            if ($request["password_baru"] != $request["konfirmasi_password"]) {
                return back();
            } else {
                User::where("id", Auth::user()->id)->update([
                    "password" => bcrypt($request["password_baru"])
                ]);
    
                return back();
            }

        });
    }
}
