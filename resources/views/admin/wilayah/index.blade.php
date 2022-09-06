@extends('admin.layout')
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
                    <h1 class="m-0">Data Wilayah</h1>
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
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahWilayahModal">
                                        Tambah Wilayah
                                    </button>
                                    {{-- modal tambah data --}}
                                    <div class="modal fade" id="tambahWilayahModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Wilayah</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                {{-- form tambah data --}}
                                                <form action="{{ route('wilayah.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label for="NamaObat">Nama Wilayah</label>
                                                        <input type="text" id="NamaObat" name="nama"
                                                            class="form-control" required> <br>
                                                        <label for="GambarObat">Gambar</label>
                                                        <input type="file" id="GambarObat" name="gambar"
                                                            class="form-control" required> <br>
                                                        <label for="">Alamat</label>
                                                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control" required></textarea>
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
                            </div><br>
                            {{-- data wilayah --}}
                            <div class="row">
                                <table class="table table-dark" id="">
                                    <thead>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Wilayah</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($wilayah as $item)
                                            <tr>
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td class="text-center">{{ $item->nama }}</td>
                                                <td class="text-center">{{ $item->alamat }}</td>
                                                <td class="text-center">
                                                    <a data-target="#view{{ $item->id }}" data-toggle="modal">
                                                        <i class="fas fa-eye btn btn-outline-primary"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a data-target="#edit{{ $item->id }}" data-toggle="modal">
                                                                <i class="fas fa-edit btn btn-outline-warning"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-6">
                                                            <a data-target="#hapus{{ $item->id }}" data-toggle="modal">
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Gambar Wilayah
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
                                                                    <img src="{{ asset('data_wilayah/' . $item->gambar) }}"
                                                                        alt="" srcset="" width="200px"
                                                                        height="200px">
                                                                </div>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Wilayah
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('wilayah.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                @method('PUT')
                                                                @csrf
                                                                <label for="NamaObat">Nama Wilayah</label>
                                                                <input type="text" id="NamaObat" name="nama"
                                                                    class="form-control" required
                                                                    value="{{ $item->nama }}"><br>
                                                                <label for="GambarObat">Gambar</label>
                                                                <input type="file" id="GambarObat" name="gambar"
                                                                    class="form-control"><small>Nb: Jika tidak menginputkan
                                                                    gambar, maka gambar
                                                                    sebelumnya yang akan di pakai</small><br>
                                                                <br><label for="">Alamat</label>
                                                                <input type="hidden" name="gambarlama"
                                                                    value="{{ $item->gambar }}">
                                                                <textarea name="alamat" id="" cols="30" rows="5" class="form-control" required>{{ $item->alamat }}</textarea>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Wilayah
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('wilayah.destroy', $item->id) }}"
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
        {{ $wilayah->links('vendor.pagination.costum') }}
    </div>
@endsection
