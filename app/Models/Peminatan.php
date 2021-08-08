<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class Peminatan extends Model
{
    use HasFactory;

    protected $table = "peminatan";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama',
        'id_kk',
        'id_prodi',
    ];

    public function kelompokKeahlian()
    {
        return $this->hasOne(KelompokKeahlian::class, 'id', 'id_kk');
    }

    public function prodi()
    {
        return $this->hasOne(ProgramStudi::class, 'id', 'id_prodi');
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
