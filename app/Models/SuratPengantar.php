<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPengantar extends Model
{
    use HasFactory;

    protected $table = "surat_pengantar";
    protected $primaryKey = "id";
    protected $foreignKey = "nim";
    protected $fillable = [
        'nim',
        'tanggal',
        'tujuan_surat',
        'nama_instansi',
        'alamat_instansi',
        'kota_instansi',
        'kontak_instansi',
        'bidang_minat',
        'file',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}
