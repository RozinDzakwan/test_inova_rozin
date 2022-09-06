<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //tampilan login
    public function login()
    {
        return view('login.login');
    }
    //tampilan daftar
    public function daftar()
    {
        return view('login.daftar');
    }
    //daftar
    public function daftarUser(Request $request)
    {
        if ($request->role == "user") {
            $cekUser = User::where('email', $request->email)->first();
            if ($cekUser == NULL) {
                User::create([
                    'email' => $request->email,
                    'nama' => $request->nama,
                    'password' => Hash::make($request->password),
                    'role' => $request->role
                ]);
                return redirect('login')->with('daftarBerhasil', 'success');
            } else {
                echo "<script>alert('Email sudah terpakai, gunakan email lain !!!!');history.back();</script>";
            }
        } else {
            //
        }
    }
    //login
    public function loginUser(Request $request)
    {
        //cek email
        $cekUser = User::where('email', $request->email)->first();
        $dataPegawai = Pegawai::where('id_user', $cekUser->id)->first();
        if ($cekUser == NULL) {
            return redirect('login')->with('loginKosong', 'gagal');
        }
        //cek role
        if ($cekUser->role == "user") {
            //cek password
            if (Hash::check($request->password, $cekUser->password)) {
                $data = array(
                    'id' => $cekUser->id,
                    'nama' => $cekUser->nama,
                    'email' => $cekUser->email,
                    'password' => $cekUser->password,
                    'role' => $cekUser->role,
                );
                //session
                $request->session()->put($data);
                return redirect('user')->with('loginSukses', "halo");
            } else {
                return redirect('login')->with('loginGagal', 'gagal');
            }
        } elseif ($cekUser->role == "pegawai") {
            if (Hash::check($request->password, $cekUser->password)) {
                $data = array(
                    'id' => $dataPegawai->id,
                    'nama' => $dataPegawai->nama,
                    'alamat' => $dataPegawai->alamat,
                    'no_tlp' => $dataPegawai->no_tlp,
                    'foto' => $dataPegawai->foto,
                    'tentang' => $dataPegawai->tentang,
                    'id_user' => $dataPegawai->id_user,
                    'email' => $cekUser->email,
                    'password' => $cekUser->password,
                    'role' => $cekUser->role,
                );
                //session
                $request->session()->put($data);
                return redirect('pegawai')->with('loginSukses', "halo");
            } else {
                return redirect('login')->with('loginGagal', 'gagal');
            }
        } elseif ($cekUser->role == "admin") {
            if (Hash::check($request->password, $cekUser->password)) {
                $data = array(
                    'id' => $cekUser->id,
                    'nama' => $cekUser->nama,
                    'email' => $cekUser->email,
                    'password' => $cekUser->password,
                    'role' => $cekUser->role,
                );
                //session
                $request->session()->put($data);
                return redirect('admin')->with('admin', "halo");
            } else {
                return redirect('login')->with('loginGagal', 'gagal');
            }
        }
    }
    // logout
    public function logout()
    {
        if (session()->has('aksesDitolak')) {
            session()->flush();
            return redirect('login')->with('aksesDitolak', 'berhasil');
        }
        if (session()->get('nama') == NULL) {
            return redirect('login')->with('Login', 'berhasil');
        } else {
            session()->flush();
            return redirect('login')->with('Logout', 'berhasil');
        }
    }
}
