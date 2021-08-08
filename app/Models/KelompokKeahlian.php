<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class KelompokKeahlian extends Model
{
    use HasFactory;

    protected $table = "kelompok_keahlian";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_kk',
    ];

    public function peminatan()
    {
        return $this->belongsTo(Peminatan::class, 'id', 'id_kk');
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
