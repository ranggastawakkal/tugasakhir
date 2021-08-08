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
        return $this->hasOne(Mahasiswa::class, 'id', 'id_mahasiswa');
    }

    // public function pembimbingAkademik()
    // {
    //     return $this->hasOne(PembimbingAkademik::class, 'id', 'id_pemb_akd');
    // }

    // public function pembimbingLapangan()
    // {
    //     return $this->hasOne(PembimbingLapangan::class, 'id', 'id_pemb_lap');
    // }

    public function pembAkd()
    {
        return $this->belongsTo(PembimbingAkademik::class, 'id_pemb_akd');
    }

    public function pembLap()
    {
        return $this->belongsTo(PembimbingLapangan::class, 'id_pemb_lap');
    }
}
