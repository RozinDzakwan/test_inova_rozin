<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class UserPegawaiController extends Controller
{
    public function index()
    {
        $header = 'Pegawai';
        $pegawai = Pegawai::select('*')->paginate(2);
        return view('user.pegawai.index', compact('header', 'pegawai'));
    }
}
