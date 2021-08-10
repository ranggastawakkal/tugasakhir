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
        return Carbon::createFromFormat('Y-m-d', $this->attributes['tanggal_lahir'])->format('d-m-Y');
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

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'id_mahasiswa', 'id');
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
}
