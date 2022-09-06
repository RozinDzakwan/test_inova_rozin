<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PegawaiPasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::select('*')->paginate(8);
        $Sidebar = "pasien";
        return view('pegawai.pasien.index', compact('pasien', 'Sidebar'));
    }
}
