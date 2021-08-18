<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class BobotPembAkd extends Model
{
    use HasFactory;

    protected $table = "bobot_pemb_akd";
    protected $primaryKey = "id";
    protected $foreignKey = "id_indikator";
    protected $fillable = [
        'id_indikator',
        'bobot',
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }

    public function indikatorPenilaian()
    {
        return $this->hasOne(IndikatorPenilaian::class, 'id', 'id_indikator');
    }
}
