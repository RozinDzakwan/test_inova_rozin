<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $fillable = ['id_user', 'nama', 'alamat', 'no_tlp', 'tentang', 'foto'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
