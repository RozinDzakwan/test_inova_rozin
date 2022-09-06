    @extends('pegawai.Layout')
    @section('content')
        @if (session()->has('transaksiBerhasil'))
            <script>
                alert('Pembayaran telah di konfirmasi');
            </script>
        @endif
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pembayaran</h1>
                    </div>
                </div>
            </div>
        </div><br><br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($pembayaran as $data)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ 'TDK' . $data->id }}</h4>
                                </div>
                                <div class="card-body" style="padding-top: 30px;padding-bottom:30px">
                                    <h5>Data Pasien</h5>
                                    <div class="row" style="padding-top: 20px">
                                        <div class="row">
                                            <div class="col-6">
                                                <li>Nama</li>
                                            </div>
                                            <div class="col-6"> : {{ $data->getPasien->nama }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <li>NIK</li>
                                            </div>
                                            <div class="col-6"> : {{ $data->id_pasien }}</div>
                                        </div><br><br>
                                        <div style="padding-top:5px;text-align:center">
                                            <label for="">Obat</label>
                                        </div><br>
                                        {{-- table obat --}}
                                        <table class="table table-stripped">
                                            <thead>
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Jumlah</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $pecahObat = explode(',', $data->obat);
                                                    $pecahJumlah = explode(',', $data->jumlah_obat);
                                                    $pecahBayar = explode(',', $data->total);
                                                    $total = 0;
                                                    $array = 0;
                                                    $no = 1;
                                                @endphp
                                                @foreach ($pecahObat as $dataObat)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $dataObat }}</td>
                                                        <td>{{ $pecahJumlah[$array] }}</td>
                                                    </tr>
                                                    @php
                                                        $total += (int) $pecahBayar[$array] * (int) $pecahJumlah[$array];
                                                        $array++;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-6">
                                                <h4>Total Bayar</h4>
                                            </div>
                                            <div class="col-6">
                                                <h4>{{ 'Rp. ' . number_format($total, 0, '.', '.') }}</h4>
                                            </div>
                                        </div>
                                        <div>
                                            @if ($data->status == 'menunggu konfirmasi')
                                                <a href="{{ route('pegawaipembayaran.edit', $data->id) }}">
                                                    <button class="btn btn-success btn-lg btn-block">Konfirmasi
                                                        Pembayaran</button>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    {{ $pembayaran->links('vendor.pagination.costum') }}
                </div>
            </div>
        </div>
    @endsection
