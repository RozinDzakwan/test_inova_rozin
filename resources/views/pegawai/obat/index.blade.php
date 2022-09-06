@extends('pegawai.Layout')
@section('content')
    {{-- alert --}}
    @if (session()->has('dataTambah'))
        <script>
            alert('Data Berhasil Ditambahkan');
        </script>
    @endif
    @if (session()->has('dataUpdate'))
        <script>
            alert('Data Berhasil Diganti');
        </script>
    @endif
    @if (session()->has('dataHapus'))
        <script>
            alert('Data Berhasil Dihapus');
        </script>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Obat</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahObatModal">
                                        Tambah Obat
                                    </button>

                                    {{-- modal tambah data --}}
                                    <div class="modal fade" id="tambahObatModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                {{-- form tambah data --}}
                                                <div class="modal-body">
                                                    <form action="{{ route('pegawaiobat.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <label for="NamaObat">Nama Obat</label>
                                                        <input type="text" id="NamaObat" name="nama"
                                                            class="form-control" required> <br>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <label for="JenisObat">Jenis Obat</label>
                                                                <select name="jenis" id="JenisObat" class="form-control"
                                                                    required>
                                                                    <option value="Tablet">Tablet</option>
                                                                    <option value="Syrup">Syrup</option>
                                                                    <option value="Serbuk">Serbuk</option>
                                                                    <option value="Salep">Salep</option>
                                                                    <option value="Tetes">Tetes</option>
                                                                    <option value="Larutan">Larutan</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="StokObat">Stok</label>
                                                                <input type="number" id="StokObat" name="stok"
                                                                    class="form-control" min="1" required>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="HargaObat">Harga</label>
                                                                <input type="number" id="HargaObat" name="harga"
                                                                    class="form-control" min="500" required>
                                                            </div>
                                                        </div>
                                                        <label for="GambarObat">Gambar</label>
                                                        <input type="file" id="GambarObat" name="gambar"
                                                            class="form-control" required> <br>
                                                        <label for="">Deskripsi</label>
                                                        <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control" required>

                                                        </textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Tambah</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div><br>
                            {{-- data obat --}}
                            <div class="row">
                                <table class="table table-dark" id="">
                                    <thead>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Obat</th>
                                        <th class="text-center">Jenis Obat</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Detail</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($Obat as $item)
                                            <tr>
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td class="text-center">{{ $item->nama }}</td>
                                                <td class="text-center">{{ $item->jenis }}</td>
                                                <td class="text-center">{{ $item->stok }}</td>
                                                <td class="text-center">
                                                    <a data-target="#view{{ $item->id }}" data-toggle="modal">
                                                        <i class="fas fa-eye btn btn-outline-primary"></i>
                                                    </a>
                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a data-target="#edit{{ $item->id }}" data-toggle="modal">
                                                                <i class="fas fa-edit btn btn-outline-warning"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-6">
                                                            <a data-target="#hapus{{ $item->id }}"
                                                                data-toggle="modal">
                                                                <i class="fas fa-trash-alt btn btn-outline-danger"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- modal view --}}
                                            <div class="modal fade" id="view{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail Obat
                                                                {{ $item->nama }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex justify-content-center">
                                                                <div class="row">
                                                                    <img src="{{ asset('data_file/' . $item->gambar) }}"
                                                                        alt="" srcset="" width="200px"
                                                                        height="200px">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div style="border-bottom: solid">
                                                                    <h2>{{ $item->nama }}</h2>
                                                                </div>
                                                                <p>{{ $item->deskripsi }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div style="text-align: start">
                                                                <h3>{{ 'Rp. ' . number_format($item->harga, 0, '.', '.') }}
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- modal edit --}}
                                            <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Obat
                                                                {{ $item->nama }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('pegawaiobat.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                @method('PUT')
                                                                @csrf
                                                                <label for="NamaObat">Nama Obat</label>
                                                                <input type="text" id="NamaObat" name="nama"
                                                                    class="form-control" required
                                                                    value="{{ $item->nama }}"><br>
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <label for="JenisObat">Jenis Obat</label>
                                                                        <select name="jenis" id="JenisObat"
                                                                            class="form-control" required>
                                                                            <option value="Serbuk"
                                                                                @selected($item->jenis == 'Serbuk')>Serbuk</option>
                                                                            <option value="Tablet"
                                                                                @selected($item->jenis == 'Tablet')>Tablet</option>
                                                                            <option value="Syrup"
                                                                                @selected($item->jenis == 'Syrup')>Syrup</option>
                                                                            <option value="Salep"
                                                                                @selected($item->jenis == 'Salep')>Salep</option>
                                                                            <option value="Tetes"
                                                                                @selected($item->jenis == 'Tetes')>Tetes</option>
                                                                            <option value="Larutan"
                                                                                @selected($item->jenis == 'Larutan')>Larutan
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label for="StokObat">Stok</label>
                                                                        <input type="number" id="StokObat"
                                                                            name="stok" class="form-control"
                                                                            value="{{ $item->stok }}"required
                                                                            min="1">
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label for="HargaObat">Harga</label>
                                                                        <input type="number" id="HargaObat"
                                                                            name="harga" class="form-control"
                                                                            value="{{ $item->harga }}" min="500"
                                                                            required>
                                                                    </div>
                                                                </div><br>
                                                                <label for="GambarObat">Gambar</label>
                                                                <input type="file" id="GambarObat" name="gambar"
                                                                    class="form-control"><small>Nb: Jika tidak menginputkan
                                                                    gambar, maka gambar
                                                                    sebelumnya yang akan di pakai</small><br>
                                                                <br><label for="">Deskripsi</label>
                                                                <input type="hidden" name="gambarlama"
                                                                    value="{{ $item->gambar }}">
                                                                <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control" required>{{ $item->deskripsi }}</textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-warning">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- modal hapus --}}
                                            <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Obat
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('pegawaiobat.destroy', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                @method('DELETE')
                                                                @csrf
                                                                Apakah anda yakin ingin menghapus
                                                                <p style="color: red">{{ $item->nama }}
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            {{ $Obat->links('vendor.pagination.costum') }}
        </div>
    </div>
@endsection
