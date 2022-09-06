@extends('user.LayoutUser')
@section('content')
    @if (session()->has('konsultasiBerhasil'))
        <script>
            alert('Mohon menunggu penanganan dari kami, Terima kasih');
        </script>
    @endif
    @if (session()->has('menungguKonfirmasi'))
        <script>
            alert('Mohon menunggu konfirmasi pembayaran dari kami, Terima kasih');
        </script>
    @endif
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{ asset('slide4.jpg') }});">
        <h2 class="ltext-105 cl0 txt-center" style="color: black">
            Riwayat
        </h2>
    </section>
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <table class="table table-dark">
                <thead>
                    <th class="text-center">No</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Keluhan</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($riwayat as $item)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">{{ $item->id_pasien }}</td>
                            <td class="text-center">{{ $item->keluhan }}</td>
                            <td class="text-center">{{ $item->status }}</td>
                            <td class="text-center">
                                @if ($item->status == 'belum bayar' || $item->status == 'menunggu konfirmasi')
                                    <a href="{{ route('userkonsultasi.edit', $item->id) }}">
                                        <button class="btn btn-primary">Lihat Hasil</button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row-lg-12">
                <div class="row">
                    {{ $riwayat->links('vendor.pagination.costum') }}
                </div>
            </div>
        </div>
    </section>
@endsection
