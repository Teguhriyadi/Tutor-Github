<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\IzinKegiatan;
use App\Models\LaporanKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class LaporanKegiatanController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {

            $data["kegiatan"] = IzinKegiatan::where("user_id", Auth::user()->id)->where("status", "!=", "0")->where("file_surat_balasan", "!=", NULL)->orderBy("created_at", "ASC")->get();

            return view("page.ormawa.laporan_kegiatan.v_index", $data);
        });
    }

    public function create($id_kegiatan)
    {
        return DB::transaction(function() use ($id_kegiatan) {
            $data["izin_kegiatan"] = IzinKegiatan::where("status", "1")->where("file_surat_balasan", "!=", NULL)->get();
            $data["id_kegiatan"] = $id_kegiatan;
            
            return view("page.ormawa.laporan_kegiatan.v_create", $data);
        });
    }

    public function store(Request $request, $id_kegiatan)
    {
        $messages = [
            "required" => "Kolom :attribute Harus Diisi" 
        ];

        $this->validate($request, [
            "file_lpj" => "required",
            "foto_dokumentasi" => "required"
        ], $messages);

        return DB::transaction(function() use ($request, $id_kegiatan) {

            if ($request["file_lpj"]) {
                $lpj = $request->file("file_lpj")->store("file_lpj");
            }

            if ($request["foto_dokumentasi"]) {
                $dokumentasi = $request->file("foto_dokumentasi")->store("foto_dokumentasi");
            }

            LaporanKegiatan::create([
                "id" => Uuid::uuid4()->getHex(),
                "user_id" => Auth::user()->id,
                "izin_kegiatan_id" => $id_kegiatan,
                "file_lpj" => $lpj,
                "foto_dokumentasi" => $dokumentasi
            ]);

            return redirect("/ormawa/laporan_kegiatan")->with("message", "Data Berhasil di Simpan");
        });
    }

    public function show($id)
    {
        return DB::transaction(function() use ($id) {
            $data["detail"] = IzinKegiatan::where("id", $id)->first();

            return view("page.ormawa.laporan_kegiatan.v_detail", $data);
        });
    }

    public function laporan($id)
    {
        return DB::transaction(function() use ($id) {
            $izin = IzinKegiatan::where("id", $id)->first();

            return response()->download("storage/".$izin["file_laporan"]);
        });
    }

    public function balasan($id)
    {
        return DB::transaction(function () use ($id) {
            $balasan = IzinKegiatan::where("id", $id)->first();

            return response()->download("storage/".$balasan["file_surat_balasan"]);
        });
    }

    public function lpj($id)
    {
        return DB::transaction(function() use ($id) {
            $laporan = LaporanKegiatan::where("id", $id)->first();

            return response()->download("storage/".$laporan["file_lpj"]);
        });
    }
}
