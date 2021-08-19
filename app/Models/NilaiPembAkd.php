<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class NilaiPembAkd extends Model
{
    use HasFactory;

    protected $table = "nilai_pemb_akd";
    protected $primaryKey = "id";
    protected $foreignKey = "id_bobot";
    protected $fillable = [
        'id_mahasiswa',
        'id_bobot',
        'nilai',
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }

    public function bobotPembAkd()
    {
        return $this->belongsTo(BobotPembAkd::class, 'id_bobot');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
