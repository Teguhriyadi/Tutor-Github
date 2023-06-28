<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\IzinKegiatan;
use App\Models\LaporanKegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function dashboard()
    {
        $data["data_pengguna"] = User::count();
        $data["kegiatan_ditolak"] = IzinKegiatan::where("status", "2")->count();
        $data["kegiatan_disetujui"] = IzinKegiatan::where("status", "1")->count();
        $data["laporan_kegiatan"] = LaporanKegiatan::count();
        $data["izin_kegiatan"] = IzinKegiatan::where("status", "0")->count();

        return view("page.super_admin.dashboard", $data);
    }

    public function dashboard_wadir()
    {
        $data["izin_kegiatan"] = IzinKegiatan::count();
        $data["ditolak"] = IzinKegiatan::where("status", "0")->count();
        $data["disetujui"] = IzinKegiatan::where("status", "1")->count();
        $data["laporan"] = LaporanKegiatan::count();

        $kegiatan = IzinKegiatan::get();

        $dataperbulan = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $dataperbulan[$bulan] = 0;
        }

        foreach ($kegiatan as $izin) {
            $bulan = date('n', strtotime($izin->created_at));
            $dataperbulan[$bulan]++;
        }

        return view("page.wadir.dashboard", compact("kegiatan", "dataperbulan") , $data);
    }

    public function dashboard_ormawa()
    {
        $data["izin_kegiatan"] = IzinKegiatan::where("user_id", Auth::user()->id)->count();
        $data["ditolak"] = IzinKegiatan::where("user_id", Auth::user()->id)->where("status", "0")->count();
        $data["disetujui"] = IzinKegiatan::where("user_id", Auth::user()->id)->where("status", "1")->count();
        $data["laporan"] = LaporanKegiatan::where("user_id", Auth::user()->id)->count();

        return view("page.ormawa.dashboard", $data);
    }
}
