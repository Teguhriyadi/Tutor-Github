<?php

namespace App\Http\Controllers\Wadir;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfilSayaController extends Controller
{
    public function index()
    {
        return view("page.wadir.profil_saya.v_index");
    }

    public function update(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute Harus Diisi",
        ];

        $this->validate($request, [
            "name" => "required",
        ], $message);

        return DB::transaction(function() use ($request) {
            $user = User::where("id", Auth::user()->id)->first();

            if ($request["foto"]) {
                if (empty($user["foto"])) {
                    $data = $request->file("foto")->store("profil_saya");
                } else {
                    Storage::delete($user["foto"]);

                    $data = $request->file("foto")->store("profil_saya");
                }
            } else {
                $data = $user["foto"];
            }

            User::where("id", Auth::user()->id)->update([
                "name" => $request["name"],
                "foto" => $data,
                "deskripsi" => empty($request["deskripsi"]) ? NULL : $request["deskripsi"]
            ]);

            return back();
        });
    }
}
