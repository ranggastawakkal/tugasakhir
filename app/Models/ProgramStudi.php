<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
