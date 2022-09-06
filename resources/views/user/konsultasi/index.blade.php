@extends('user.LayoutUser')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url({{ asset('bootUser/images/slide-05.jpg') }});">
        <h2 class="ltext-105 cl0 txt-center" style="color: black">
            Konsultasi
        </h2>
    </section>
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="">
                <div class="">
                    {{-- form konsultasi --}}
                    <form action="{{ route('userkonsultasi.store') }}" method="POST">
                        @csrf
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Isi Data
                        </h4>
                        <div>
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan Nama Lengkap" onkeydown="return /[a-z ]/i.test(event.key)"
                                required><br>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="no_tlp">No Telp</label>
                                <input type="text" class="form-control" name="no_tlp" placeholder="Masukkan Nomor Tlp"
                                    pattern="[0-9]+" required maxlength="12" minlength="7">
                            </div>
                            <div class="col-6">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" name="nik" placeholder="Masukkan Nik"
                                    maxlength="16" minlength="16" required pattern="[0-9]+"><br>
                            </div>
                        </div>
                        <div>
                            <label for="">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat" placeholder="Harap isi alamat dengan lengkap" required></textarea><br>
                        </div>
                        <div>
                            <label for="">Keluhan</label>
                            <textarea class="form-control" name="keluhan" placeholder="Apa keluhan anda.?"></textarea>
                        </div><br>
                        <div>
                            <small>Nb: Data wajib diisi semua</small>
                        </div><br>
                        <button type="submit"
                            class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
