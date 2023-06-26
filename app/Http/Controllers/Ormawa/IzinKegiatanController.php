<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\IzinKegiatan;
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
            $data["izin_kegiatan"] = IzinKegiatan::where("user_id", Auth::user()->id)->orderBy("status", "DESC")->orderBy("created_at", "ASC")->get();
            
            return view("page.ormawa.izin_kegiatan.v_index", $data);
        });
    }
    
    public function create()
    {
        return view("page.ormawa.izin_kegiatan.v_create");
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

                return redirect("/ormawa/izin_kegiatan");
            } else {
                $mulai = Carbon::parse($request["mulai"]);
                $selesai = Carbon::parse($request["akhir"]);
                
                $isData = true;
                
                $data_kegiatan = IzinKegiatan::get();
                
                foreach ($data_kegiatan as $item) {
                    
                    $tanggalMulai = Carbon::parse($item["mulai"]);
                    $tanggalSelesai = Carbon::parse($item["akhir"]);

                    if ($tanggalMulai->lt($selesai) && $tanggalSelesai->gt($mulai)) {
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

                    return redirect("/ormawa/izin_kegiatan");
                } else {
                    return back();
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
            
            return redirect("/ormawa/izin_kegiatan");
        });
    }
}
