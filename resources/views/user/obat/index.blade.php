@extends('user.LayoutUser')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{ asset('obat.jpg') }});">
        <h2 class="ltext-105 cl0 txt-center" style="color: black">
            Daftar Obat
        </h2>
    </section>
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                {{-- tampilan jenis obat --}}
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <a href="{{ route('userobat.index') }}"
                        class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 @if ($jenis == 'Semua') how-active1 @endif">
                        Semua Jenis
                    </a>
                    <a href="{{ url('userobatjenis', 'Tablet') }}"
                        class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 @if ($jenis == 'Tablet') how-active1 @endif">
                        Tablet
                    </a>
                    <a href="{{ url('userobatjenis', 'Syrup') }}"
                        class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 @if ($jenis == 'Syrup') how-active1 @endif">
                        Syrup
                    </a>
                    <a href="{{ url('userobatjenis', 'Serbuk') }}"
                        class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 @if ($jenis == 'Serbuk') how-active1 @endif">
                        Serbuk
                    </a>
                    <a href="{{ url('userobatjenis', 'Salep') }}"
                        class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 @if ($jenis == 'Salep') how-active1 @endif">
                        Salep
                    </a>
                    <a href="{{ url('userobatjenis', 'Tetes') }}"
                        class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 @if ($jenis == 'Tetes') how-active1 @endif">
                        Tetes
                    </a>
                    <a href="{{ url('userobatjenis', 'Larutan') }}"
                        class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 @if ($jenis == 'Larutan') how-active1 @endif">
                        Larutan
                    </a>
                </div>

                <div class="flex-w flex-c-m m-tb-10">

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Cari
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <form action="{{ url('userobatcari') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari" aria-label="Recipient's username"
                                aria-describedby="button-addon2" name="cari" style="height: 60px">
                            <button class="btn btn-outline-primary" id="button-addon2" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- tampilan cari --}}
            @if (isset($cari))
                <div class="row" style="padding-bottom: 40px">
                    <h3>Hasil Pencarian "{{ $cari }}"</h3>
                </div>
            @endif
            {{-- tampilan semua / berdasarkan jenis --}}
            @if ($isi > 0)
                <div class="row isotope-grid">
                    @foreach ($obat as $data)
                        @if ($data->stok != 0)
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="{{ asset('data_file/' . $data->gambar) }}" alt="IMG-PRODUCT"
                                            style="width: 300px; height:300px">

                                        <a href="#"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal{{ $data->id }}">
                                            Lihat
                                        </a>
                                        <script src="{{ asset('bootUser/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
                                        <script>
                                            $(document).ready(function() {
                                                console.log('masuk');
                                                console.log({{ $data->id }});
                                                $('.js-modal{{ $data->id }}').attr('id', {{ $data->id }});
                                                $('.js-show-modal{{ $data->id }}').on('click', function(e) {
                                                    e.preventDefault();
                                                    $('.js-modal{{ $data->id }}').addClass('show-modal1');
                                                });

                                                $('.js-hide-modal{{ $data->id }}').on('click', function() {
                                                    $('.js-modal{{ $data->id }}').removeClass('show-modal1');
                                                });
                                            })
                                        </script>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <span>
                                                <h4 class="">
                                                    {{ $data->nama }}
                                                </h4>
                                            </span>
                                            <span class="stext-105 cl5">
                                                {{ $data->jenis }}
                                            </span>
                                            <span class="stext-105 cl5">

                                            </span>

                                            <span class="stext-105 cl3">
                                                {{ 'Rp. ' . number_format($data->harga, 0, '.', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-modal1 js-modal{{ $data->id }} p-t-60 p-b-20">
                                <div class="overlay-modal1 js-hide-modal{{ $data->id }}"></div>

                                <div class="container">
                                    <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                                        <button class="how-pos3 hov3 trans-04 js-hide-modal{{ $data->id }}">
                                            <img src="{{ asset('bootUser/images/icons/icon-close.png') }}" alt="CLOSE">
                                        </button>

                                        <div class="row">
                                            <div class="col-md-6 col-lg-7 p-b-30">
                                                <div class="p-l-25 p-r-30 p-lr-0-lg">
                                                    <div class="wrap-slick3 flex-sb flex-w">
                                                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                                        <div class="slick3 gallery-lb">
                                                            <div class="wrap-pic-w pos-relative">
                                                                <img src="{{ asset('data_file/' . $data->gambar) }}"
                                                                    alt="IMG-PRODUCT" style="width: 500px; height:500px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-5 p-b-30">
                                                <div class="p-r-50 p-t-5 p-lr-0-lg">
                                                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                                        {{ $data->nama }}
                                                    </h4>
                                                    <h5 class="mtext-106 cl2 js-name-detail p-b-14">
                                                        {{ $data->jenis }}
                                                    </h5>
                                                    <h5 class="mtext-106 cl2 js-name-detail p-b-14">
                                                        {{-- {{ $data->subkategoriF->nama_subkategori }} --}}
                                                    </h5>

                                                    <span class="mtext-106 cl2">
                                                        {{ 'Rp. ' . number_format($data->harga, 0, '.', '.') }}

                                                    </span>

                                                    <p class="stext-102 cl3 p-t-23">
                                                        {{ $data->deskripsi }}
                                                    </p>

                                                    <!--  -->
                                                    {{-- <form action="{{ route('keranjang.store') }}" method="POST">
                                                        @csrf
                                                        <div class="p-t-33">
                                                            <div class="flex-w flex-r-m p-b-10">
                                                                <div class="size-204 flex-w flex-m respon6-next">
                                                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                                        <div
                                                                            class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                                        </div>

                                                                        <input class="mtext-104 cl3 txt-center num-product"
                                                                            type="number" name="jumlah" value="1"
                                                                            max="{{ $data->stok }}" min="1">

                                                                        <div
                                                                            class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="obat"
                                                                        value="{{ $data->id }}">
                                                                    <button type="submit"
                                                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                                        Masukkan Keranjang
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form> --}}


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                {{-- pagination --}}
                <div>
                    {{ $obat->links('vendor.pagination.costum') }}
                </div>
            @else
                {{-- data kosong --}}
                <div class="row" style="padding-bottom: 280px">
                    <h1>Data Tidak Di temukan</h1>
                </div>
            @endif
        </div>
    </div>
@endsection
