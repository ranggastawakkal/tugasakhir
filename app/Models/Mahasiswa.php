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
    protected $foreignKey = "id_kelas";
    protected $fillable = [
        'nim',
        'nama',
        'id_kelas',
        'id_peminatan',
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

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }

    public function suratPengantar()
    {
        return $this->belongsTo(SuratPengantar::class, 'id_mahasiswa', 'id');
    }

    public function kerjaPraktek()
    {
        return $this->hasOne(KerjaPraktek::class, 'id_mahasiswa', 'id');
    }

    public function peminatan()
    {
        return $this->hasOne(Peminatan::class, 'id', 'id_peminatan');
    }
}
