<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pasien;

class Tindakan extends Model
{
    use HasFactory;
    protected $table = 'tindakans';
    protected $fillable = ['id_pasien', 'id_user', 'keluhan', 'pegawai', 'tindakan', 'obat', 'jumlah_obat', 'total', 'status'];

    public function getPasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'nik');
    }
}
