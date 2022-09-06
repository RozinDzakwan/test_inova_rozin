<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminWilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sidebar = 'wilayah';
        $wilayah = Wilayah::select('*')->paginate(8);
        return view('admin.wilayah.index', compact('wilayah', 'Sidebar'));
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
        //cek gambar
        $validator = Validator::make($request->all(), [
            'gambar' => 'mimes:jpeg,jpg,png,gif'
        ]);
        if ($validator->fails()) {
            echo "<script>alert('Format gambar harus JPG/JPRG/PNG/GIF !!!!');history.back();</script>";
        } else {
            //tambah gambar
            $file = $request->gambar;
            Wilayah::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'gambar' => $file->getClientOriginalName(),
            ]);
            //pindah gambar ke directory
            $tujuan_upload = 'data_wilayah';
            $file->move($tujuan_upload, $file->getClientOriginalName());
            return redirect('wilayah')->with('dataTambah', "sukses");
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
    public function update(Request $request, $id)
    {
        //cek gambar
        if ($request->gambar != NULL) {
            $file = $request->gambar;
            $validator = Validator::make($request->all(), [
                'gambar' => 'mimes:jpeg,jpg,png,gif'
            ]);
            if ($validator->fails()) {
                echo "<script>alert('Format gambar harus JPG/JPRG/PNG/GIF !!!!');history.back();</script>";
            } else {
                $gambarAkhir = $file->getClientOriginalName();
                $tujuan_upload = 'data_wilayah';
                $file->move($tujuan_upload, $file->getClientOriginalName());
            }
        } else {
            $gambarAkhir = $request->gambarlama;
        }
        //update gambar
        Wilayah::find($id)->update(array(
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'gambar' => $gambarAkhir,
        ));
        return redirect('wilayah')->with('dataUpdate', "sukses");
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
