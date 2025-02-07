@extends('home.layouts.main')

@section('this-page-style')
    <style>
        /* awal css struktur organisasi*/
        .swiper-container {
            width: 100%;
            padding-bottom: 20px;
            overflow: hidden;
        }

        .swiper-wrapper {
            display: flex;
        }

        .swiper-slide {
            flex-shrink: 0;
            width: auto;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 250px;
            margin-right: 15px;
        }

        .card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .swiper-button-prev,
        .swiper-button-next {
            color: #007bff;
            display: none;
        }

        .swiper-scrollbar {
            background: #ccc;
        }

        /* alhir code struktur organisasi */
    </style>
@endsection

@section('content')
    <section id="beranda" class="relative h-screen flex items-center justify-center text-white -mt-12">
        <div class="absolute inset-0 bg-cover bg-center opacity-50 hidden md:block"
            style="background-image: url('{{ asset('templates/img/visi-misi.jpg') }}');"></div>
        <div class="absolute inset-0 bg-center bg-no-repeat opacity-70 block md:hidden"
            style="background-image: url('../../img/genbi.jpg'); background-size: contain; background-position: 50% 60%;">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b to-transparent from-blue-800"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50"></div>
        <div class="relative z-10 text-center space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold">Struktur GenBI UNUJA</h1>
        </div>
    </section>

    @php
        $pengurusHarian = $organisasi->pengurusHarian->where('status', 'published')->keyBy('jabatan');
    @endphp

    <section class="container mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">Struktur Organisasi</h1>

        <!-- Ketua Komis -->
        <div class="text-center mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Ketua Komis</h2>
            <div class="flex justify-center">
                @php $ketua = optional($pengurusHarian->get('Ketua')) @endphp
                <div class="bg-white p-6 rounded-lg shadow-lg text-center w-64">
                    <img src="{{ asset('storage/' . ($ketua->foto ?? 'default.jpg')) }}" alt="Ketua Komis"
                        class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                    <h3 class="text-2xl font-bold text-gray-800">{{ $ketua->nama ?? 'Belum Ada' }}</h3>
                    <p class="text-blue-600 font-semibold">Ketua</p>
                </div>
            </div>
        </div>

        <!-- Sekretaris dan Bendahara -->
        <div class="flex flex-wrap justify-center gap-8 text-center mb-12">
            @foreach (['Sekretaris', 'Bendahara'] as $jabatan)
                @php $pengurus = optional($pengurusHarian->get($jabatan)) @endphp
                <div class="bg-white p-6 rounded-lg shadow-lg w-64">
                    <img src="{{ asset('storage/' . ($pengurus->foto ?? 'default.jpg')) }}" alt="{{ $jabatan }}"
                        class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                    <h3 class="text-2xl font-bold text-gray-800">{{ $pengurus->nama ?? 'Belum Ada' }}</h3>
                    <p class="text-blue-600 font-semibold">{{ $jabatan }}</p>
                </div>
            @endforeach
        </div>

        <!-- Struktur Divisi -->
        <div id="struktur-divisi">
            @foreach ($organisasi->divisi as $index => $div)
                @php $pengurusDivisi = $div->pengurusDivisi->where('status', 'published')->keyBy('jabatan'); @endphp

                <h2 class="text-2xl font-bold text-gray-800 text-center my-10">{{ $div->nama }}</h2>
                <div class="flex flex-wrap justify-center mb-8 gap-10">
                    @foreach (['CO', 'SekCO'] as $role)
                        @php $pengurus = optional($pengurusDivisi->get($role)) @endphp
                        <div class="bg-white p-6 rounded-lg shadow-lg text-center w-64">
                            <img src="{{ asset('storage/' . ($pengurus->foto ?? 'default.jpg')) }}"
                                alt="{{ $pengurus->nama }}" class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                            <h3 class="text-2xl font-bold text-gray-800">{{ $pengurus->nama ?? 'Belum Ada' }}</h3>
                            <p class="text-blue-600 font-semibold">{{ $role }} {{ $div->nama }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Anggota Divisi -->
                <h3 class="text-xl font-bold text-gray-800 text-center my-10">Anggota {{ $div->nama }}</h3>
                @php $anggotaAktif = $div->anggota->where('status', 'published'); @endphp

                @if ($anggotaAktif->isNotEmpty())
                    <div class="swiper overflow-hidden cursor-grab" id="swiper-{{ $index }}">
                        <div class="swiper-wrapper flex">
                            @foreach ($anggotaAktif as $anggota)
                                <div class="swiper-slide w-64">
                                    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                                        <img src="{{ asset('storage/' . ($anggota->foto ?? 'default.jpg')) }}"
                                            alt="{{ $anggota->nama }}"
                                            class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                                        <h3 class="text-2xl font-bold text-gray-800">{{ $anggota->nama }}</h3>
                                        <p class="text-blue-600 font-semibold">{{ $div->nama }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                @else
                    <p class="text-center text-gray-500">Belum Ada Anggota</p>
                @endif
            @endforeach
        </div>
    </section>
@endsection

@section('this-page-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".swiper").forEach(swiper => {
                new Swiper(swiper, {
                    slidesPerView: 3.5,
                    spaceBetween: 20,
                    navigation: {
                        nextEl: swiper.querySelector(".swiper-button-next"),
                        prevEl: swiper.querySelector(".swiper-button-prev"),
                    },
                    lazy: true,
                    mousewheel: true,
                    grabCursor: true,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false
                    },
                    loop: true,
                    breakpoints: {
                        640: {
                            slidesPerView: 2.5
                        },
                        1024: {
                            slidesPerView: 3.5
                        }
                    }
                });
            });
        });
    </script>
@endsection
