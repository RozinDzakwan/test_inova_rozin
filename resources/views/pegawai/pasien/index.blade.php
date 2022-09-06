@extends('pegawai.Layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pasien</h1>
                </div>
            </div>
        </div>
    </div><br><br>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- data obat --}}
                            <div class="row">
                                <table class="table table-dark" id="">
                                    <thead>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Pasien</th>
                                        <th class="text-center">NIK</th>
                                        <th class="text-center">No Tlp</th>
                                        <th class="text-center">Alamat</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($pasien as $item)
                                            <tr>
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td class="text-center">{{ $item->nama }}</td>
                                                <td class="text-center">{{ $item->nik }}</td>
                                                <td class="text-center">{{ $item->no_tlp }}</td>
                                                <td class="text-center">{{ $item->alamat }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
