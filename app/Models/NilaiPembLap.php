<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class NilaiPembLap extends Model
{
    use HasFactory;

    protected $table = "nilai_pemb_lap";
    protected $primaryKey = "id";
    protected $foreignKey = "id_bobot";
    protected $fillable = [
        'id_mahasiswa',
        'id_bobot',
        'nilai_angka',
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

    public function bobotPembLap()
    {
        return $this->hasOne(BobotPembLap::class, 'id', 'id_bobot');
    }
}
