<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaporanKegiatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "laporan_kegiatan";

    protected $guarded = [''];

    public $incrementing = false;

    protected $keyType = "string";
    
    public $primaryKey = "id";

    public function kegiatan()
    {
        return $this->belongsTo("App\Models\IzinKegiatan", "izin_kegiatan_id", "id");
    }
}
