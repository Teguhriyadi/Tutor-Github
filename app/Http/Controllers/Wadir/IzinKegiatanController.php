<?php

namespace App\Http\Controllers\Wadir;

use App\Http\Controllers\Controller;
use App\Models\IzinKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IzinKegiatanController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {
            $data['izin_kegiatan'] = IzinKegiatan::orderBy("created_at", "ASC")->get();

            return view("page.wadir.izin_kegiatan.v_index", $data);
        });
    }

    public function show($id)
    {
        return DB::transaction(function() use ($id) {
            $data["detail"] = IzinKegiatan::where("id", $id)->first();
            
            return view("page.wadir.izin_kegiatan.v_detail", $data);
        });
    }

    public function edit($id)
    {
        return DB::transaction(function () use ($id) {
            $data["edit"] = IzinKegiatan::where("id", $id)->first();

            return view("page.wadir.izin_kegiatan.v_edit", $data);
        });
    }

    public function update(Request $request, $id)
    {
        $message = [
            "required" => "Kolom :attribute Harus Diisi"
        ];

        $this->validate($request, [
            "status" => "required"
        ], $message);

        return DB::transaction(function() use($request, $id) {
            IzinKegiatan::where("id", $id)->update([
                "status" => $request["status"],
                "komentar" => empty($request["komentar"]) ? NULL : $request["komentar"],
                "user_validasi_id" => Auth::user()->id,
                "is_validasi" => "1"
            ]);

            return redirect("/wadir/izin_kegiatan")->with("message", "Data Berhasil di Simpan");
        });
    }

    public function file_laporan($id)
    {
        return DB::transaction(function() use ($id) {
            $laporan = IzinKegiatan::where("id", $id)->first();

            return response()->download("storage/".$laporan["file_laporan"]);
        });
    }

    public function file_balasan($id)
    {
        return DB::transaction(function() use ($id) {
            $balasan = IzinKegiatan::where("id", $id)->first();

            return response()->download("storage/".$balasan["file_surat_balasan"]);
        });
    }
}
