<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IzinKegiatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "izin_kegiatan";

    protected $guarded = [''];

    public $incrementing = false;

    protected $keyType = "string";
    
    public $primaryKey = "id";

    public function users()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

    public function laporan()
    {
        return $this->hasOne("App\Models\LaporanKegiatan", "id", "izin_kegiatan_id");
    }
}
