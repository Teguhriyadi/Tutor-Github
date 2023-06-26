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
            $data["laporan_kegiatan"] = LaporanKegiatan::orderBy("created_at", "DESC")->get();

            return view("page.ormawa.laporan_kegiatan.v_index", $data);
        });
    }

    public function create()
    {
        return DB::transaction(function() {
            $data["izin_kegiatan"] = IzinKegiatan::where("status", "1")->where("file_surat_balasan", "!=", NULL)->get();
            
            return view("page.ormawa.laporan_kegiatan.v_create", $data);
        });
    }

    public function store(Request $request)
    {
        $messages = [
            "required" => "Kolom :attribute Harus Diisi" 
        ];

        $this->validate($request, [
            "izin_kegiatan_id" => "required",
            "file_lpj" => "required",
            "foto_dokumentasi" => "required"
        ], $messages);

        return DB::transaction(function() use ($request) {

            if ($request["file_lpj"]) {
                $lpj = $request->file("file_lpj")->store("file_lpj");
            }

            if ($request["foto_dokumentasi"]) {
                $dokumentasi = $request->file("foto_dokumentasi")->store("foto_dokumentasi");
            }

            LaporanKegiatan::create([
                "id" => Uuid::uuid4()->getHex(),
                "user_id" => Auth::user()->id,
                "izin_kegiatan_id" => $request["izin_kegiatan_id"],
                "file_lpj" => $lpj,
                "foto_dokumentasi" => $dokumentasi,
                "status" => 1
            ]);

            return redirect("/ormawa/laporan_kegiatan");
        });
    }
}
