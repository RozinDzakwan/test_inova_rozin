<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class UserObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //tampilan obat
    public function index()
    {
        $obat = Obat::select('*')->paginate(8);
        $jenis = "Semua";
        $header = "Obat";
        $isi = count($obat);
        return view('user.obat.index', compact('obat', 'jenis', 'isi', 'header'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //tampil obat berdasarkan jenis
    public function tampilJenis($id)
    {
        $obat = Obat::where('jenis', $id)->paginate(8);
        $jenis = $id;
        $isi = count($obat);
        $header = "Obat";
        return view('user.obat.index', compact('obat', 'jenis', 'isi', 'header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //tampil obat berdasarkan pencarian
    public function tampilCari(Request $request)
    {
        $jenis = "semua";
        $cari = $request->cari;
        $obat = Obat::where('nama', "like", "%" . $request->cari . "%")->paginate(8);
        $isi = count($obat);
        $header = "Obat";
        return view('user.obat.index', compact('obat', 'jenis', 'cari', 'isi', 'header'));
    }
}
