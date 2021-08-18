<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DokumenMahasiswa extends Model
{
    use HasFactory;

    protected $table = "dokumen_mahasiswa";
    protected $primaryKey = "id";
    protected $foreignKey = "id_mahasiswa";
    protected $fillable = [
        'id_mahasiswa',
        'surat_diterima',
        'laporan',
        'surat_selesai',
        'krs',
    ];

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
