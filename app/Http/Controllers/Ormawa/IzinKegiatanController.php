<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\IzinKegiatan;
use App\Models\LaporanKegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class IzinKegiatanController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {
            $data["izin_kegiatan"] = IzinKegiatan::where("user_id", Auth::user()->id)->orderBy("status", "ASC")->orderBy("created_at", "ASC")->get();
            
            return view("page.ormawa.izin_kegiatan.v_index", $data);
        });
    }
    
    public function create()
    {
        $cek = IzinKegiatan::count();

        if ($cek == 0) {
            return view("page.ormawa.izin_kegiatan.v_create");
        } else {
            $kegiatan = IzinKegiatan::get();

            $isData = true;
            foreach ($kegiatan as $data) {
                $cek = LaporanKegiatan::where("izin_kegiatan_id", $data["id"])->first();

                if (!$cek) {
                    $isData = false;
                    break;
                }
            }

            if (!$isData) {
                return back()->with("message_error", "Anda Sudah Memiliki Kegiatan");

            }
        }

    }
    
    public function store(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute Harus Diisi"
        ];
        
        $this->validate($request, [
            "nama_kegiatan" => "required",
            "file_laporan" => "required",
            "tempat_pelaksanaan" => "required",
            "mulai" => "required",
            "akhir" => "required",
        ], $message);
        
        return DB::transaction(function() use ($request) {
            if ($request["file_laporan"]) {
                $data = $request->file("file_laporan")->store("file_laporan");
            }

            $cek = IzinKegiatan::count();
            
            if ($cek == 0) {
                IzinKegiatan::create([
                    "id" => Uuid::uuid4()->getHex(),
                    "user_id" => Auth::user()->id,
                    "nama_kegiatan" => $request["nama_kegiatan"],
                    "file_laporan" => $data,
                    "tempat" => $request["tempat_pelaksanaan"],
                    "mulai" => $request["mulai"],
                    "akhir" => $request["akhir"],
                    "status" => "0",
                ]);

                return redirect("/ormawa/izin_kegiatan")->with("message", "Data Berhasil di Tambahkan");
            } else {
                $mulai = Carbon::parse($request["mulai"]);
                $selesai = Carbon::parse($request["akhir"]);
                
                $isData = true;
                
                $data_kegiatan = IzinKegiatan::get();
                
                foreach ($data_kegiatan as $item) {
                    
                    $tempat = $request["tempat_pelaksanaan"];
                    $tanggalMulai = Carbon::parse($item["mulai"]);
                    $tanggalSelesai = Carbon::parse($item["akhir"]);

                    if ($tempat == $item["tempat"] && $tanggalMulai->lte($selesai) && $tanggalSelesai->gte($mulai)) {
                        $isData = false;
                        break;
                    }
                }

                if ($isData) {
                    IzinKegiatan::create([
                        "id" => Uuid::uuid4()->getHex(),
                        "user_id" => Auth::user()->id,
                        "nama_kegiatan" => $request["nama_kegiatan"],
                        "file_laporan" => $data,
                        "tempat" => $request["tempat_pelaksanaan"],
                        "mulai" => $request["mulai"],
                        "akhir" => $request["akhir"],
                        "status" => "0",
                    ]);

                    return redirect("/ormawa/izin_kegiatan")->with("message", "Data Berhasil di Tambahkan");
                } else {
                    return back()->withInput()->with("message_error", "Tanggal dan Tempat Sudah Ada Yang Mengajukan Terlebih Dahulu");
                }
            }
        });
    }
    
    public function show($id)
    {
        return DB::transaction(function() use($id) {
            $data["detail"] = IzinKegiatan::where("id", $id)->first();
            
            return view("page.ormawa.izin_kegiatan.v_detail", $data);
        });
    }
    
    public function edit($id)
    {
        return DB::transaction(function() use ($id) {
            $data["edit"] = IzinKegiatan::where('id', $id)->first();
            
            return view("page.ormawa.izin_kegiatan.v_edit", $data);
        });
    }
    
    public function update(Request $request, $id)
    {
        $message = [
            "required" => "Kolom :attribute Harus Diisi"
        ];
        
        $this->validate($request, [
            "nama_kegiatan" => "required",
            "file_laporan" => "required",
            "tempat_pelaksanaan" => "required",
            "mulai" => "required",
            "akhir" => "required",
        ], $message);
        
        return DB::transaction(function () use ($request, $id) {
            $file = IzinKegiatan::where("id", $id)->first();
            
            if ($request["file_laporan"]) {
                Storage::delete($file["file_laporan"]);
                
                $data = $request->file("file_laporan")->store("file_laporan");
            }
            
            IzinKegiatan::where("id", $id)->update([
                "nama_kegiatan" => $request["nama_kegiatan"],
                "file_laporan" => $data,
                "tempat" => $request["tempat_pelaksanaan"],
                "mulai" => $request["mulai"],
                "akhir" => $request["akhir"],
                "status" => "3",
            ]);
            
            return redirect("/ormawa/izin_kegiatan")->with("message", "Data Berhasil di Simpan");
        });
    }

    public function file_laporan($id)
    {
        return DB::transaction(function() use ($id) {
            $data = IzinKegiatan::where("id", $id)->first();

            return response()->download("storage/".$data["file_laporan"]);
        });
    }

    public function file_balasan($id)
    {
        return DB::transaction(function() use ($id) {
            $data = IzinKegiatan::where("id", $id)->first();

            return response()->download("storage/".$data["file_surat_balasan"]);
        });
    }
}
