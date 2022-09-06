@extends('login.layout')
@section('judul', 'Login')
@section('content')
    {{-- alertcek --}}
    @if (session()->has('Logout'))
        <script>
            alert('Telah berhasil logout');
        </script>
    @endif
    @if (session()->has('loginGagal'))
        <script>
            alert('Password yang anda masukkan tidak sesuai');
        </script>
    @endif
    @if (session()->has('loginKosong'))
        <script>
            alert('Email anda belum terdaftar, silahkan daftar terlebih dahulu');
        </script>
    @endif
    @if (session()->has('aksesDitolak'))
        <script>
            alert('Anda tidak punya akses ke halaman ini, silahkan login');
        </script>
    @endif
    @if (session()->has('Login'))
        <script>
            alert('Silahkan login');
        </script>
    @endif
    @if (session()->has('daftarBerhasil'))
        <script>
            alert('Berhasil daftar, silahkan login');
        </script>
    @endif
    {{-- login --}}
    <div class="wrap-login100" style="background-color: currentColor">
        <div class="text-center">
            <span>
                <img src="{{ asset('bootUser/Inova.png') }}" alt="" srcset="" width="200px" height="200px"
                    style="border-radius:100%">
            </span>
        </div>
        <form class="login100-form validate-form" action="{{ url('loginuser') }}" method="POST" style="padding-top:47px">
            @csrf
            <div class="wrap-input100 validate-input" data-validate="Masukkan Email">
                <input class="input100" type="email" name="email">
                <span class="focus-input100" data-placeholder="Email"></span>
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
                        Login
                    </button>
                </div>
            </div>
            <div class="text-center" style="padding-top: 57px">
                <span class="txt1" style="color: white">
                    Belum mempunyai akun ?
                </span>

                <a href="{{ url('daftar') }}" style="color: lightcoral" id="apa">
                    Daftar
                </a>
            </div>
            <div class="text-center">
                <a class="txt2 text-warning" href="{{ route('user.index') }}">
                    Ke Dashboard
                </a>
            </div>

        </form>
    </div>
@endsection
