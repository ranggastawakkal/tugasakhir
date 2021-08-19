<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class LogAktivitas extends Model
{
    use HasFactory;

    protected $table = "log_aktivitas";
    protected $primaryKey = "id";
    protected $foreignKey = [
        'id_mahasiswa',
        'id_pemb_akd',
        'id_pemb_lap',
    ];
    protected $fillable = [
        'id_mahasiswa',
        'id_pemb_akd',
        'id_pemb_lap',
        'tanggal',
        'jam_datang',
        'jam_pulang',
        'aktivitas',
        'evaluasi',
    ];

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
        return $this->hasOne(Mahasiswa::class, 'id', 'id_mahasiswa');
    }

    public function pembimbingAkademik()
    {
        return $this->hasOne(PembimbingAkademik::class, 'id', 'id_pemb_akd');
    }

    public function pembimbingLapangan()
    {
        return $this->hasOne(PembimbingLapangan::class, 'id', 'id_pemb_lap');
    }
}
