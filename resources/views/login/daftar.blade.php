@extends('login.layout')
@section('judul', 'Daftar')
@section('content')
    <div class="wrap-login100" style="background-color: currentColor">
        <div class="text-center">
            <span>
                <img src="{{ asset('bootUser/Inova.png') }}" alt="" srcset="" width="200px" height="200px"
                    style="border-radius:100%">
            </span>
        </div>
        <form class="login100-form validate-form" action="{{ url('daftaruser') }}" method="POST" style="padding-top:47px">
            @csrf
            <div class="wrap-input100 validate-input" data-validate="Masukkan Email">
                <input class="input100" type="email" name="email">
                <span class="focus-input100" data-placeholder="Email"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Masukkan Nama">
                <input class="input100" type="text" name="nama">
                <span class="focus-input100" data-placeholder="Nama"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Masukkan password">
                <span class="btn-show-pass">
                    <i class="zmdi zmdi-eye"></i>
                </span>
                <input class="input100" type="password" name="password">
                <span class="focus-input100" data-placeholder="Password"></span>
            </div>
            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn" type="submit">
                        Daftar
                    </button>
                </div>
            </div>
            <div class="text-center" style="padding-top: 20px">
                <span class="txt1" style="color: white">
                    Sudah mempunyai akun ?
                </span>

                <a href="{{ url('login') }}" style="color: lightcoral" id="apa">
                    Login
                </a>
            </div>
            <div class="text-center">
                <a class="txt2 text-warning" href="{{ route('user.index') }}">
                    Ke Dashboard
                </a>
            </div>
            <input type="hidden" name="role" value="user" id="">
        </form>
    </div>
@endsection
