<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ProgramStudi extends Model
{
    use HasFactory;
    protected $table = "program_studi";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_prodi',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id', 'id_prodi');
    }

    public function peminatan()
    {
        return $this->belongsTo(Peminatan::class, 'id', 'id_prodi');
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
