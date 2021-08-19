<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SubClo extends Model
{
    use HasFactory;

    protected $table = "sub_clo";
    protected $primaryKey = "id";
    protected $foreignKey = "id_clo";
    protected $fillable = [
        'deskripsi',
        'id_clo',
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }

    public function clo()
    {
        return $this->hasOne(Clo::class, 'id', 'id_clo');
    }
}
