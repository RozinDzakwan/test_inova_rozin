    @extends('pegawai.Layout')
    @section('content')
        @if (session()->has('ditangani'))
            <script>
                alert('Pasien berhasil ditangani');
            </script>
        @endif
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tindakan</h1>
                    </div>
                </div>
            </div>
        </div><br><br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($tindakan as $data)
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
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <li>Alamat</li>
                                            </div>
                                            <div class="col-6"> : {{ $data->getPasien->alamat }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <li>Keluhan</li>
                                            </div>
                                            <div class="col-6">: {{ $data->keluhan }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('pegawaitindakan.edit', $data->id) }}">
                                        <button type="submit" class="btn btn-success btn-lg btn-block">Tangani</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    {{ $tindakan->links('vendor.pagination.costum') }}
                </div>
            </div>
        </div>
    @endsection
