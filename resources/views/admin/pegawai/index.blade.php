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
                    <h1 class="m-0">Data Pegawai</h1>
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
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahPegawaiModal">
                                        Tambah Pegawai
                                    </button>
                                    {{-- modal tambah data --}}
                                    <div class="modal fade" id="tambahPegawaiModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                {{-- form tambah data --}}
                                                <form action="{{ route('adminpegawai.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label for="">Nama Pegawai</label>
                                                        <input type="text" id="" name="nama"
                                                            class="form-control" required>
                                                        <label for="">No Tlp</label>
                                                        <input type="text" id="" name="no_tlp"
                                                            class="form-control" required>
                                                        <label for="">Foto</label>
                                                        <input type="file" id="" name="foto"
                                                            class="form-control" required>
                                                        <label for="">Alamat</label>
                                                        <textarea name="alamat" id="" cols="30" rows="2" class="form-control" required></textarea>
                                                        <label for="">Tentang</label>
                                                        <textarea name="tentang" id="" cols="30" rows="3" class="form-control" required></textarea><br>
                                                        <div class="row" style="border-top: solid">
                                                            <label for="">Data Login</label>
                                                            <div class="col-6">
                                                                <label for="">Email</label>
                                                                <input type="email" class="form-control" name="email"
                                                                    id="" required>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="">Password</label>
                                                                <input type="text" class="form-control" name="password"
                                                                    id="" required>
                                                            </div>
                                                        </div>
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
                                <table class="table table-dark">
                                    <thead>
                                        <th class="text-center">No</th>
                                        {{-- <th class="text-center">Nama Pegawai</th> --}}
                                        <th class="text-center">Email</th>
                                        {{-- <th class="text-center">No Telp</th> --}}
                                        <th class="text-center">Detail</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($pegawai as $item)
                                            <tr>
                                                <td class="text-center">{{ $no++ }}</td>
                                                {{-- <td class="text-center">{{ $item->nama }}</td> --}}
                                                <td class="text-center">{{ $item->getUser->email }}</td>
                                                {{-- <td class="text-center">{{ $item->no_tlp }}</td> --}}
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
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Profil
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
                                                                    <img src="{{ asset('data_foto/' . $item->foto) }}"
                                                                        alt="" srcset="" width="200px"
                                                                        height="200px">
                                                                </div>
                                                            </div>
                                                            <div><br>
                                                                <div style="border-bottom: solid">
                                                                    <h2>{{ $item->nama }}</h2>
                                                                    <p>{{ $item->tentang }}</p>
                                                                </div><br>
                                                                <div style="">
                                                                    <label for="">Alamat</label>
                                                                    <p>{{ $item->alamat }}</p>
                                                                </div>
                                                                <div>
                                                                    <label for="">No Tlp</label>
                                                                    <input type="text" value="{{ $item->no_tlp }}"
                                                                        class="form-control" readonly>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Edit Data
                                                                {{ $item->nama }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('admin.update', $item->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label for="">Nama Pegawai</label>
                                                                <input type="text" id="" name="nama"
                                                                    class="form-control" value="{{ $item->nama }}"
                                                                    required>
                                                                <label for="">No Tlp</label>
                                                                <input type="text" id="" name="no_tlp"
                                                                    class="form-control" value="{{ $item->no_tlp }}"
                                                                    required>
                                                                <label for="">Foto</label>
                                                                <input type="file" id="" name="foto"
                                                                    class="form-control">
                                                                <label for="">Alamat</label>
                                                                <textarea name="alamat" id="" cols="30" rows="2" class="form-control" required>{{ $item->alamat }}</textarea>
                                                                <label for="">Tentang</label>
                                                                <textarea name="tentang" id="" cols="30" rows="3" class="form-control" required>{{ $item->tentang }}</textarea><br>
                                                                <div class="row" style="border-top: solid">
                                                                    <br>
                                                                    <label for="">Data Login</label>
                                                                    <div class="col-6">
                                                                        <label for="">Email</label>
                                                                        <input type="email" class="form-control"
                                                                            name="email" id=""
                                                                            value="{{ $item->getUser->email }}" required>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="">Password</label>
                                                                        <input type="text" class="form-control"
                                                                            name="password" id="" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-warning">Edit</button>
                                                            </div>
                                                            <input type="hidden" name="foto_lama"
                                                                value="{{ $item->foto }}" id="">
                                                            <input type="hidden" name="id_user"
                                                                value="{{ $item->id_user }}" id="">
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
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Hapus Obat
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('admin.destroy', $item->id) }}"
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
        {{ $pegawai->links('vendor.pagination.costum') }}
    </div>
@endsection
