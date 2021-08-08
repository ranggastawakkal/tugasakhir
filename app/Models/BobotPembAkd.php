<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PenilaianPembimbingLapangan extends Model
{
    use HasFactory;

    protected $table = "bobot_pemb_akd";
    protected $primaryKey = "id";
    protected $foreignKey = "id_sub_clo";
    protected $fillable = [
        'id_sub_clo',
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

    public function subClo()
    {
        return $this->hasOne(SubClo::class, 'id', 'id_sub_clo');
    }
}
