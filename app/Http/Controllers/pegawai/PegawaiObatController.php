<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // tampil obat
    public function index()
    {
        $Sidebar = "obat";
        $Obat = Obat::select('*')->paginate(8);
        return view('pegawai.obat.index', compact('Obat', 'Sidebar'));
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
    //tambah obat
    public function store(Request $request)
    {
        //cek gambar

        $validator = Validator::make($request->all(), [
            'gambar' => 'mimes:jpeg,jpg,png,gif'
        ]);
        if ($validator->fails()) {
            echo "<script>alert('Format gambar harus JPG/JPRG/PNG/GIF !!!!');history.back();</script>";
        } else {
            //tambah gambar
            $file = $request->gambar;
            Obat::create([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
                'gambar' => $file->getClientOriginalName(),
            ]);
            //pindah gambar ke directory
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $file->getClientOriginalName());
            return redirect('/pegawaiobat')->with('dataTambah', "sukses");
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //update obat
    public function update(Request $request, $id)
    {
        //cek gambar
        if ($request->gambar != NULL) {
            $file = $request->gambar;
            $validator = Validator::make($request->all(), [
                'gambar' => 'mimes:jpeg,jpg,png,gif'
            ]);
            // dd($validator);
            if ($validator->fails()) {
                echo "<script>alert('Format gambar harus JPG/JPRG/PNG/GIF !!!!');history.back();</script>";
            } else {
                $gambarAkhir = $file->getClientOriginalName();
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload, $file->getClientOriginalName());
            }
        } else {
            $gambarAkhir = $request->gambarlama;
        }
        //update gambar
        Obat::find($id)->update(array(
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarAkhir,
        ));
        return redirect('/pegawaiobat')->with('dataUpdate', "sukses");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //hapus gambar
    public function destroy($id)
    {
        Obat::find($id)->delete();
        return redirect('pegawaiobat')->with('dataHapus', "sukses");
    }
}
