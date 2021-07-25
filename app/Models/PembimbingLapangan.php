<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class PembimbingLapangan extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "pembimbing_lapangan";
    protected $primaryKey = "nip";
    protected $fillable = [
        'nip',
        'nama',
        'email',
        'no_telepon',
        'id_perusahaan',
        'posisi',
        'image',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class, 'id', 'id_perusahaan');
    }
}
