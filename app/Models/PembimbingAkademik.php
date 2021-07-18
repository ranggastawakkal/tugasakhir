<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class PembimbingAkademik extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "pembimbing_akademik";
    protected $primaryKey = "nip";
    protected $fillable = [
        'nip',
        'nama',
        'email',
        'kode_dosen',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telepon',
        'alamat',
        'jenis_kelamin',
        'image',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
