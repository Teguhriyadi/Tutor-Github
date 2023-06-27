<?php

namespace App\Http\Controllers\Wadir;

use App\Http\Controllers\Controller;
use App\Models\IzinKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanKegiatanController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {
            
            $data["kegiatan"] = IzinKegiatan::where("status", "1")->where("file_surat_balasan", "!=", NULL)->where("user_validasi_id", Auth::user()->id)->get();

            return view("page.wadir.laporan_kegiatan.v_index", $data);
        });
    }

    public function show($id)
    {
        return DB::transaction(function() use ($id) {
            $data["detail"] = IzinKegiatan::where("id", $id)->first();

            return view("page.wadir.laporan_kegiatan.v_detail", $data);
        });
    }
}
