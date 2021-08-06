<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kelas extends Model
{
    use HasFactory;

    protected $table = "kelas";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_kelas',
        'id_prodi',
    ];

    public function prodi()
    {
        return $this->hasOne(ProgramStudi::class, 'id', 'id_prodi');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id', 'id_kelas');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }
}
