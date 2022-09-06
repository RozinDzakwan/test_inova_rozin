@extends('user.LayoutUser')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{ asset('slide3.jpg') }});">
        <h2 class="ltext-105 cl0 txt-center" style="color: black">
            Hasil Konsultasi
        </h2>
    </section>
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-6">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ $nama }}" readonly><br>
                        </div>
                        <div class="col-6">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" class="form-control" value="{{ $tindakan->pegawai }}" readonly><br>
                        </div>
                    </div>
                    <div>
                        <label for="">Keluhan</label>
                        <textarea class="form-control" readonly>{{ $tindakan->keluhan }}</textarea><br>
                    </div>
                    <div>
                        <label for="">Tindakan dari Pegawai</label>
                        <textarea class="form-control" readonly> {{ $tindakan->tindakan }}</textarea><br>
                    </div>
                    <div>
                        <table class="table table-stripped">
                            <thead>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </thead>
                            <tbody>
                                @php
                                    $pecahObat = explode(',', $tindakan->obat);
                                    $pecahJumlah = explode(',', $tindakan->jumlah_obat);
                                    $pecahBayar = explode(',', $tindakan->total);
                                    $total = 0;
                                    $array = 0;
                                    $no = 1;
                                @endphp
                                @foreach ($pecahObat as $dataObat)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $dataObat }}</td>
                                        <td>{{ $pecahJumlah[$array] }}</td>
                                        <td>{{ 'Rp. ' . number_format((int) $pecahBayar[$array], 0, '.', '.') }}</td>
                                    </tr>
                                    @php
                                        $total += (int) $pecahBayar[$array] * (int) $pecahJumlah[$array];
                                        $array++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <h2 class="cl0 txt-center" style="color: black">
                            Total Bayar : {{ 'Rp. ' . number_format($total, 0, '.', '.') }}
                        </h2>
                    </div><br>
                    @if ($tindakan->status == 'belum bayar' || $tindakan->status == 'transaksi selesai')
                        <a href="{{ url('bayar', $tindakan->id) }}">
                            <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                                Bayar
                            </button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
