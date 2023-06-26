<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\IzinKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IzinKegiatanController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {
            $data["izin_kegiatan"] = IzinKegiatan::where("status", "1")->get();
            
            return view("page.super_admin.izin_kegiatan.v_index", $data);
        });
    }

    public function show($id)
    {
        return DB::transaction(function() use ($id) {
            $data["detail"] = IzinKegiatan::where("id", $id)->first();

            return view("page.super_admin.izin_kegiatan.v_detail", $data);
        });
    }

    public function update(Request $request, $id)
    {
        $messages = [
            "required" => "Kolom :attribute Harus Diisi"
        ];

        $this->validate($request, [
            "file_surat_balasan" => "required"
        ], $messages);

        if ($request["file_surat_balasan"]) {
            $data = $request["file_surat_balasan"]->store("file_surat_balasan");
        }

        return DB::transaction(function() use ($data, $id) {
            IzinKegiatan::where("id", $id)->update([
                "file_surat_balasan" => $data
            ]);

            return redirect("/super_admin/izin_kegiatan");
        });
    }
}
