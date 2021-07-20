<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = "kelas";
    protected $fillable = [
        'nama_kelas',
        'id_prodi',
    ];

    public function prodi()
    {
        return $this->hasOne(ProgramStudi::class, 'id', 'id_prodi');
    }
}
