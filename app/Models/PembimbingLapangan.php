<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PembimbingLapangan extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "pembimbing_lapangan";
    protected $primaryKey = "id";
    protected $fillable = [
        'nip',
        'nama',
        'email',
        'no_telepon',
        'jabatan',
        'nama_perusahaan',
        'alamat_perusahaan',
        'kota_perusahaan',
        'email_perusahaan',
        'no_telepon_perusahaan',
        'plain_password',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }

    // public function kerjaPraktek()
    // {
    //     return $this->belongsTo(KerjaPraktek::class, 'id_pemb_lap', 'id');
    // }

    public function kerjaPraktek()
    {
        return $this->hasMany(KerjaPraktek::class, 'id_pemb_lap');
    }
}
