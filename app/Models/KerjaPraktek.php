<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerjaPraktek extends Model
{
    use HasFactory;

    protected $table = "kerja_praktek";
    protected $primaryKey = "id";
    protected $foreignKey = ['nim', 'nip_pemb_akd', 'nip_pemb_lap'];
    protected $fillable = [
        'nim',
        'nip_pemb_akd',
        'nip_pemb_lap',
        'lokasi_kerja',
        'unit',
        'tanggal_mulai',
        'tanggal_berakhir',
        'surat_diterima',
        'surat_selesai',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
}
