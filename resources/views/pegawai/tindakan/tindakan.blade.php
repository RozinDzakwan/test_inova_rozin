    @extends('pegawai.Layout')
    @section('content')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Penanganan</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('pegawaitindakan.index') }}">
                                    <button class="btn btn-warning">Kembali</button>
                                </a>
                            </div>
                            <form action="{{ route('pegawaitindakan.update', $tindakan->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div>
                                        <label for="">Nama Pasien</label>
                                        <input type="text" name="nama" value="{{ $pasien }}" id=""
                                            class="form-control" readonly>
                                    </div><br>
                                    <div>
                                        <label for="">Keluhan</label>
                                        <textarea name="keluhan" id="" cols="30" rows="2" readonly class="form-control">{{ $tindakan->keluhan }}</textarea>
                                    </div><br>
                                    <div>
                                        <h4 for="">Penanganan</h4><br>
                                        <div>
                                            <label for="">Tindakan</label>
                                            <textarea name="tindakan" id="" cols="30" rows="3" class="form-control" required></textarea>
                                        </div>
                                        <div>
                                            <label for="">Obat</label>
                                            <div class="row">
                                                <div class="form-group fieldGroup col-4">
                                                    <div class="input-group">
                                                        <select name="obat[]" class="form-select" id="inputGroupSelect04"
                                                            required>
                                                            @foreach ($obat as $dataObat)
                                                                <option value="{{ $dataObat->id }}">{{ $dataObat->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <input type="number" name="jumlah_obat[]" id=""
                                                            class="form-control" placeholder="Jumlah" required
                                                            min="1">
                                                        <div class="input-group-addon">
                                                            <a href="javascript:void(0)" class="btn btn-success addMore">
                                                                <i class="fas fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg btn-block">input</button>
                            </form>
                            <div class="form-group fieldGroupCopy col-6" style="display: none;">
                                <div class="input-group">
                                    <select name="obat[]" id="inputGroupSelect04" class="form-select">
                                        @foreach ($obat as $dataObat)
                                            <option value="{{ $dataObat->id }}">{{ $dataObat->nama }}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" name="jumlah_obat[]" id="" class="form-control"
                                        placeholder="Jumlah" required min="1">
                                    <div class="input-group-addon">
                                        <a href="javascript:void(0)" class="btn btn-danger remove">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>
    @endsection
