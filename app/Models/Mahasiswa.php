<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Mahasiswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "mahasiswa";
    protected $primaryKey = "id";
    protected $foreignKey = [
        'id_kelas',
        'id_peminatan',
        'id_periode',
    ];
    protected $fillable = [
        'nim',
        'nama',
        'id_kelas',
        'id_peminatan',
        'id_periode',
        'email',
        'no_telepon',
        'alamat',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function getTanggalLahirAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['tanggal_lahir'])->format('d M Y');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }

    public function suratPengantar()
    {
        return $this->belongsTo(SuratPengantar::class, 'id_mahasiswa', 'id');
    }

    public function dokumenMahasiswa()
    {
        return $this->hasOne(DokumenMahasiswa::class, 'id_mahasiswa');
    }

    public function kerjaPraktek()
    {
        return $this->hasOne(KerjaPraktek::class, 'id_mahasiswa');
    }

    public function peminatan()
    {
        return $this->hasOne(Peminatan::class, 'id', 'id_peminatan');
    }

    public function periode()
    {
        return $this->hasOne(Periode::class, 'id', 'id_periode');
    }

    public function nilaiPembAkd()
    {
        return $this->hasMany(NilaiPembAkd::class, 'id_mahasiswa');
    }

    public function logAktivitas()
    {
        return $this->hasMany(LogAktivitas::class, 'id_mahasiswa');
    }

    public function nilaiPembLap()
    {
        return $this->hasMany(NilaiPembLap::class, 'id_mahasiswa');
    }
}
