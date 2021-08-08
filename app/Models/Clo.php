<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Clo extends Model
{
    use HasFactory;

    protected $table = "clo";
    protected $primaryKey = "id";
    protected $foreignKey = "id_plo";
    protected $fillable = [
        'kode_clo',
        'deskripsi',
        'id_plo',
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }

    public function plo()
    {
        return $this->hasOne(Plo::class, 'id', 'id_plo');
    }
}
