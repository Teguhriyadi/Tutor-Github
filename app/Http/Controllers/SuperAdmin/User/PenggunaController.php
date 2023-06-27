<?php

namespace App\Http\Controllers\SuperAdmin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PenggunaController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {
            $data["pengguna"] = User::orderBy("created_at", "DESC")->get();

            return view("page.super_admin.pengguna.v_index", $data);
        });
    }

    public function create()
    {
        return view("page.super_admin.pengguna.v_create");
    }

    public function store(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute Harus Diisi"
        ];

        $this->validate($request, [
            "name" => "required",
            "email" => "required",
            "role" => "required",
            "deskripsi" => "required"
        ], $message);

        return DB::transaction(function() use($request) {
            User::create([
                "id" => Uuid::uuid4()->getHex(),
                "name" => $request["name"],
                "email" => $request["email"],
                "password" => bcrypt("password123"),
                "role" => $request["role"],
                "status" => "1",
                "deskripsi" => $request["deskripsi"]
            ]);

            return redirect("/super_admin/data_pengguna");
        });
    }

    public function show($id)
    {
        return DB::transaction(function() use ($id) {
            $data["detail"] = User::where("id", $id)->first();

            return view("page.super_admin.pengguna.v_edit", $data);
        });
    }

    public function update(Request $request, $id)
    {
        $message = [
            "required" => "Kolom :attribute Harus Diisi"
        ];

        $this->validate($request, [
            "name" => "required",
            "email" => "required",
            "role" => "required",
            "deskripsi" => "required"
        ], $message);

        return DB::transaction(function () use ($request, $id) {
            User::where("id", $id)->update([
                "name" => $request["name"],
                "email" => $request["email"],
                "role" => $request["role"],
                "deskripsi" => $request["deskripsi"]
            ]);

            return redirect("/super_admin/data_pengguna");
        });
    }

    public function destroy($id)
    {
        return DB::transaction(function() use ($id) {
            User::where("id", $id)->delete();
            
            return redirect("/super_admin/data_pengguna");
        });
    }

    public function aktifkan($id)
    {
        return DB::transaction(function() use ($id) {
            User::where("id", $id)->update([
                "status" => "1"
            ]);

            return back()->with("message", "Data Berhasil di Aktifkan");
        });
    }

    public function non_aktifkan($id)
    {
        return DB::transaction(function() use ($id) {
            User::where("id", $id)->update([
                "status" => "0"
            ]);

            return back()->with("message", "Data Berhasil di Non-Aktifkan");
        });
    }
}
