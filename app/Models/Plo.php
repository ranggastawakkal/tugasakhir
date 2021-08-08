<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Plo extends Model
{
    use HasFactory;

    protected $table = "plo";
    protected $primaryKey = "id";
    protected $fillable = [
        'kode_plo',
        'deskripsi',
        'id_periode',
        'id_prodi',
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }

    public function periode()
    {
        return $this->hasOne(Periode::class, 'id', 'id_periode');
    }

    public function prodi()
    {
        return $this->hasOne(ProgramStudi::class, 'id', 'id_prodi');
    }
}
