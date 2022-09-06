@extends('user.LayoutUser')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{ asset('slide1.jpg') }});">
        <h2 class="ltext-105 cl0 txt-center" style="color: black">
            Daftar Pegawai
        </h2>
    </section>
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            @php $a = 1; @endphp
            @foreach ($pegawai as $item)
                @if ($a % 2 == 0)
                    <div class="row p-b-148">
                        <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                            <div class="how-bor1 ">
                                <div class="hov-img0">
                                    <img src="{{ asset('data_foto/' . $item->foto) }}" style="height: 332px;width:332px"
                                        alt="IMG">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-8">
                            <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                                <h3 class="mtext-111 cl2 p-b-16">
                                    {{ $item->nama }}
                                </h3>
                                <p class="stext-113 cl6 p-b-26">{{ $item->tentang }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row p-b-148">
                        <div class="col-md-7 col-lg-8">
                            <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                                <h3 class="mtext-111 cl2 p-b-16">
                                    {{ $item->nama }}
                                </h3>
                                <p class="stext-113 cl6 p-b-26">{{ $item->tentang }}</p>
                            </div>
                        </div>
                        <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                            <div class="how-bor1 ">
                                <div class="hov-img0">
                                    <img src="{{ asset('data_foto/' . $item->foto) }}" style="height: 332px;width:332px"
                                        alt="IMG">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @php $a++; @endphp
            @endforeach
            <div>
                {{ $pegawai->links('vendor.pagination.costum') }}
            </div>
        </div>
    </section>
@endsection
