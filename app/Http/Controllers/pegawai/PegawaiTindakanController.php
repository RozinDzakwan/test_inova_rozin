<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class PegawaiTindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tindakan = Tindakan::where('status', 'belum ditangani')->paginate(3);
        $Sidebar = "tindakan";
        return view('pegawai.tindakan.index', compact('Sidebar', 'tindakan'));
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
        //
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
        $Sidebar = 'tindakan';
        $tindakan = Tindakan::find($id);
        $cekPasien = Pasien::where('nik', $tindakan->id_pasien)->first();
        $pasien = $cekPasien->nama;
        $obat = Obat::all();
        return view('pegawai.tindakan.tindakan', compact('Sidebar', 'tindakan', 'obat', 'pasien'));
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
        //cek duplikat obat
        $cekDuplikat = array();
        foreach (array_count_values($request->obat) as $val => $c) {
            if ($c > 1) $cekDuplikat[] = $val;
        }
        if ($cekDuplikat) {
            echo "<script>alert('Obat tidak boleh ada yang sama !!!!');history.back();</script>";
        } else {
            $array = 0;
            //cek stok
            foreach ($request->obat as $cekObat) {
                $data = Obat::find($cekObat);
                if (($data->stok -= $request->jumlah_obat[$array]) >= 0) {
                    $cekStok = TRUE;
                } else {
                    $cekStok = FALSE;
                }
            };
            if ($cekStok == FALSE) {
                echo "<script>alert('Ada stok obat yang kurang !!!!');history.back();</script>";
            } else {
                //update obat + penanganan
                $array = 0;
                foreach ($request->obat as $cekObat) {
                    $data = Obat::find($cekObat);
                    $data->update([
                        'stok' => $data->stok -= $request->jumlah_obat[$array]
                    ]);
                    $namaObat[$array] = $data->nama;
                    $hargaObat[$array] = $data->harga;
                    $array++;
                };
                $obat = implode(',', array_values($namaObat));
                $harga = implode(',', array_values($hargaObat));
                $total = implode(',', array_values($request->jumlah_obat));
                Tindakan::find($id)->update([
                    'pegawai' => session()->get('nama'),
                    'tindakan' => $request->tindakan,
                    'obat' => $obat,
                    'jumlah_obat' => $total,
                    'total' => $harga,
                    'status' => 'belum bayar',
                ]);
                return redirect('pegawaitindakan')->with('ditangani', 'success');
            }
        }
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
    public function tampilCari(Request $request)
    {
        $cari = $request->cari;
        $obat = Tindakan::where('nama', "like", "%" . $request->cari . "%")->paginate(8);
        $isi = count($obat);
        $header = "Obat";
        return view('user.obat.index', compact('obat', 'jenis', 'cari', 'isi', 'header'));
    }
}
