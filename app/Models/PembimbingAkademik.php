<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PembimbingAkademik extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "pembimbing_akademik";
    protected $primaryKey = "id";
    protected $fillable = [
        'nip',
        'nama',
        'kode_dosen',
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

    public function kerjaPraktek()
    {
        return $this->belongsTo(KerjaPraktek::class, 'id_pemb_akd', 'id');
    }
}
