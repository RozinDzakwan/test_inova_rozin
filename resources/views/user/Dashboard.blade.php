@extends('user.layoutUser')
@section('content')
    {{-- alert login --}}
    @if (session()->has('loginSukses'))
        <script>
            alert('Selamat Datang <?= $nama = session()->get('nama') ?> ');
        </script>
    @endif
    <section class="section-slide">
        <div class="wrap-slick1 rs2-slick1">
            <div class="slick1">
                <div class="item-slick1 bg-overlay1"
                    style="background-image: url({{ asset('bootUser/images/slide-05.jpg') }});"
                    data-thumb="images/thumb-01.jpg" data-caption="Women’s Wear">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    Tempat konsultasi penyakit anda
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    INOVA MEDIKA
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="{{ route('userkonsultasi.index') }}"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    Konsultasi Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 bg-overlay1"
                    style="background-image: url({{ asset('bootUser/images/slide-06.jpg') }});"
                    data-thumb="images/thumb-02.jpg" data-caption="Men’s Wear">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">

                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    Anda sehat kami puas
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="{{ route('userobat.index') }}"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    Lihat Obat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 bg-overlay1"
                    style="background-image: url({{ asset('bootUser/images/slide-07.jpg') }});"
                    data-thumb="images/thumb-03.jpg" data-caption="Men’s Wear">
                    <div class="container h-full">
                        <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                                <span class="ltext-202 txt-center cl0 respon2">
                                    Jagalah kesehatan anda
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                    Kesehatan itu penting!!
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
