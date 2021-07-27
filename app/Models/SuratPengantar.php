<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SuratPengantar extends Model
{
    use HasFactory;

    protected $table = "surat_pengantar";
    protected $primaryKey = "id";
    protected $foreignKey = "id_mahasiswa";
    protected $fillable = [
        'id_mahasiswa',
        'tanggal',
        'tujuan_surat',
        'nama_instansi',
        'alamat_instansi',
        'kota_instansi',
        'kontak_instansi',
        'bidang_minat',
        'file',
    ];

    public function getTanggalAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['tanggal'])->format('d-m-Y');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id', 'id_mahasiswa');
    }
}
