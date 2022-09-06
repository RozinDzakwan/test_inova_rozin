<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sidebar = 'pegawai';
        $pegawai = Pegawai::select('*')->paginate(8);
        return view('admin.pegawai.index', compact('pegawai', 'Sidebar'));
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
        //cek foto
        $validator = Validator::make($request->all(), [
            'foto' => 'mimes:jpeg,jpg,png,gif'
        ]);
        if ($validator->fails()) {
            echo "<script>alert('Format foto harus JPG/JPRG/PNG/GIF !!!!');history.back();</script>";
        } else {
            $file = $request->foto;
            $cekUser = User::where('email', $request->email)->first();
            if ($cekUser == NULL) {
                User::create([
                    'email' => $request->email,
                    'nama' => $request->nama,
                    'role' => "pegawai",
                    'password' => Hash::make($request->password),
                ]);
                $id_user = User::where('email', $request->email)->first();
                Pegawai::create([
                    'nama' => $request->nama,
                    'id_user' => $id_user->id,
                    'alamat' => $request->alamat,
                    'no_tlp' => $request->no_tlp,
                    'foto' =>  $file->getClientOriginalName(),
                    'tentang' => $request->tentang,
                ]);
                //pindah file
                $tujuan_upload = 'data_foto';
                $file->move($tujuan_upload, $file->getClientOriginalName());
                return redirect('admin')->with('dataTambah', "sukses");
            } else {
                echo "<script>alert('Email sudah terpakai, gunakan email lain !!!!');history.back();</script>";
            }
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
        // dd($request->all());
        if ($request->foto == NULL) {
            $fotoFinal = $request->foto_lama;
        } else {
            $validator = Validator::make($request->all(), [
                'foto' => 'mimes:jpeg,jpg,png,gif'
            ]);
            if ($validator->fails()) {
                echo "<script>alert('Format foto harus JPG/JPRG/PNG/GIF !!!!');history.back();</script>";
            } else {
                dd($request->all());
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
        $pegawai = Pegawai::find($id);
        User::where('id', $pegawai->id_user)->delete();
        $pegawai->delete();
        return redirect('admin')->with('dataHapus', "sukses");
    }
}
