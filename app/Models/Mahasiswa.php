<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "mahasiswa";
    protected $primaryKey = "nim";
    protected $foreignKey = "id_kelas";
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telepon',
        'alamat',
        'jenis_kelamin',
        'id_kelas',
        'tahun_angkatan',
        'image',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }

    public function suratPengantar()
    {
        return $this->hasMany(SuratPengantar::class, 'nim', 'nim');
    }
}
