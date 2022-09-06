<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens';
    protected $fillable = ['nik', 'id_user', 'nama', 'alamat', 'no_tlp', 'keluhan'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
