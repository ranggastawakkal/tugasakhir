<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    public function getTanggalMulaiAttribute()
    {
        if ($this->attributes['tanggal_mulai'] != null) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['tanggal_mulai'])->format('d M Y');
        } else {
            echo ('-');
        }
    }

    public function getTanggalBerakhirAttribute()
    {
        if ($this->attributes['tanggal_berakhir'] != null) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['tanggal_berakhir'])->format('d M Y');
        } else {
            echo ('-');
        }
    }

    // public function getTanggalMulaiAttribute()
    // {
    //     return Carbon::createFromFormat('Y-m-d', $this->attributes['tanggal_mulai'])->format('d M Y');
    // }

    // public function getTanggalBerakhirAttribute()
    // {
    //     return Carbon::createFromFormat('Y-m-d', $this->attributes['tanggal_berakhir'])->format('d M Y');
    // }

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function pembimbingAkademik()
    {
        return $this->belongsTo(PembimbingAkademik::class, 'id_pemb_akd');
    }

    public function pembimbingLapangan()
    {
        return $this->belongsTo(PembimbingLapangan::class, 'id_pemb_lap');
    }
}
