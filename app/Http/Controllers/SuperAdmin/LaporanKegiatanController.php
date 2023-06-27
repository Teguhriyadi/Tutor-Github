<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\LaporanKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanKegiatanController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {
            $data["laporan_kegiatan"] = LaporanKegiatan::get();

            return view("page.super_admin.laporan_kegiatan.v_index", $data);
        });
    }

    public function show($id)
    {
        return DB::transaction(function() use ($id) {
            $data["detail"] = LaporanKegiatan::where("id", $id)->first();

            return view("page.super_admin.laporan_kegiatan.v_detail", $data);
        });
    }
    
    public function laporan($id)
    {
        return DB::transaction(function() use ($id) {
            $laporan = LaporanKegiatan::where("id", $id)->first();

            return response()->download("storage/".$laporan["file_lpj"]);
        });
    }

    public function dokumentasi($id)
    {
        return DB::transaction(function() use ($id) {
            $dokumentasi = LaporanKegiatan::where("id", $id)->first();

            return response()->download("storage/".$dokumentasi["foto_dokumentasi"]);
        });
    }
}
