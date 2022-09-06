<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class UserRiwayatController extends Controller
{
    public function index()
    {
        //cek apakah sudah login
        $header = 'Riwayat';
        $riwayat = Tindakan::where('id_user', session()->get('id'))->paginate(4);

        if (session()->has('konsultasiBerhasil')) {
            return view('user.riwayat.index', compact('header', 'riwayat'))->with('konsultasiBerhasil', 'success');
        } elseif (session()->has('menungguKonfirmasi')) {
            return view('user.riwayat.index', compact('header', 'riwayat'))->with('menungguKonfirmasi', 'success');
        } else {
            return view('user.riwayat.index', compact('header', 'riwayat'));
        }
    }

    public function bayar($id)
    {
        Tindakan::find($id)->update([
            'status' => 'menunggu konfirmasi'
        ]);

        return redirect('riwayat')->with('menungguKonfirmasi', 'success');
    }
}
