<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class UserKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //tampilan konsultasi
    public function index()
    {
        $header = "Konsultasi";
        return view('user.konsultasi.index', compact('header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_user = session()->get('id');
        $cekNik = Pasien::where('nik', $request->nik)->first();
        if ($cekNik == NULL) {
            Pasien::create([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_tlp' => $request->no_tlp,
                'id_user' => $id_user
            ]);
            Tindakan::create([
                'id_pasien' => $request->nik,
                'id_user' => $id_user,
                'keluhan' => $request->keluhan,
                'tindakan' => "",
                'obat' => "",
                'pegawai' => '',
                'jumlah_obat' => '',
                'total' => '',
                'status' => "belum ditangani",
            ]);
            return redirect('riwayat')->with('konsultasiBerhasil', 'success');
        } else {
            Tindakan::create([
                'id_pasien' => $request->nik,
                'id_user' => $id_user,
                'keluhan' => $request->keluhan,
                'tindakan' => "",
                'obat' => "",
                'pegawai' => '',
                'jumlah_obat' => '',
                'total' => '',
                'status' => "belum ditangani",
            ]);
            return redirect('riwayat')->with('konsultasiBerhasil', 'success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = 'Konsultasi';
        $tindakan = Tindakan::find($id);
        $ambilData = Pasien::where('nik', $tindakan->id_pasien)->first();
        $nama = $ambilData->nama;
        return view('user.riwayat.tindakan', compact('tindakan', 'header', 'nama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
