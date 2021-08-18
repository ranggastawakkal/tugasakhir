<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DokumenKp extends Model
{
    use HasFactory;

    protected $table = "dokumen_kp";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama',
        'deskripsi',
        'aktor',
        'file',
    ];

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y H:i:s');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i:s');
    }
}
