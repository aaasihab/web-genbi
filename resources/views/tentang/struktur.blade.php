@extends('layouts.main')

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
    <!-- Hero Section -->
    <section id="beranda" class="relative h-screen flex items-center justify-center text-white -mt-12">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center opacity-50 hidden md:block"
            style="background-image: url('{{ asset('templates/img/visi-misi.jpg') }}');"></div>
        <div class="absolute inset-0 bg-center bg-no-repeat opacity-70 block md:hidden"
            style="background-image: url('../../img/genbi.jpg'); background-size: contain; background-position: 50% 60%;">
        </div>

        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-b to-transparent from-blue-800"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50"></div>

        <!-- Content -->
        <div class="relative z-10 text-center space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold">Struktur GenBI UNUJA</h1>
        </div>
    </section>

    <!-- Struktur Organisasi -->
    <section class="container mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">Struktur Organisasi</h1>

        <!-- Ketua Komis -->
        <div class="text-center mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Ketua Komis</h2>
            <div class="flex justify-center">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center max-w-xs">
                    <img src="{{ asset('templates/img/ibu_febrina.jpg') }}" alt="Ketua Komis"
                        class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                    <h3 class="text-2xl font-bold text-gray-800">Nama Ketua</h3>
                    <p class="text-blue-600 font-semibold">Jabatan</p>
                </div>
            </div>
        </div>

        <!-- Sekretaris & Bendahara -->
        <div class="flex flex-wrap justify-center gap-8 text-center mb-12">
            <div class="bg-white p-6 rounded-lg shadow-lg w-64">
                <img src="{{ asset('templates/img/ibu_febrina.jpg') }}" alt="Sekretaris"
                    class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                <h3 class="text-2xl font-bold text-gray-800">Nama Sekretaris</h3>
                <p class="text-blue-600 font-semibold">Sekretaris</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg w-64">
                <img src="{{ asset('templates/img/ibu_febrina.jpg') }}" alt="Bendahara"
                    class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                <h3 class="text-2xl font-bold text-gray-800">Nama Bendahara</h3>
                <p class="text-blue-600 font-semibold">Bendahara</p>
            </div>
        </div>

        <!-- Struktur Divisi -->
        <div id="struktur-divisi"></div>
    </section>
@endsection

@section('this-page-scripts')
    <script>
        // struktur organisasi
        document.addEventListener("DOMContentLoaded", function() {
            const divisi = [{
                    judul: "Media Kreatif",
                    nama: "Media Kreatif",
                    ketua: {
                        foto: "ketua_media.jpg",
                        nama: "Nama Ketua Media"
                    },
                    wakil: {
                        foto: "wakil_media.jpg",
                        nama: "Nama Wakil Media"
                    },
                    anggota: [{
                            foto: "media_1.jpg",
                            nama: "Nama Anggota 1"
                        },
                        {
                            foto: "media_2.jpg",
                            nama: "Nama Anggota 2"
                        },
                        {
                            foto: "media_3.jpg",
                            nama: "Nama Anggota 3"
                        },
                        {
                            foto: "media_4.jpg",
                            nama: "Nama Anggota 4"
                        },
                        {
                            foto: "media_5.jpg",
                            nama: "Nama Anggota 5"
                        },
                        {
                            foto: "media_6.jpg",
                            nama: "Nama Anggota 6"
                        },
                        {
                            foto: "media_7.jpg",
                            nama: "Nama Anggota 7"
                        },
                        {
                            foto: "media_8.jpg",
                            nama: "Nama Anggota 8"
                        },
                        {
                            foto: "media_9.jpg",
                            nama: "Nama Anggota 9"
                        },
                        {
                            foto: "media_10.jpg",
                            nama: "Nama Anggota 10"
                        },
                    ]
                },
                {
                    judul: "Pendidikan",
                    nama: "Pendidikan",
                    ketua: {
                        foto: "ketua_pendidikan.jpg",
                        nama: "Nama Ketua Pendidikan"
                    },
                    wakil: {
                        foto: "wakil_pendidikan.jpg",
                        nama: "Nama Wakil Pendidikan"
                    },
                    anggota: [{
                            foto: "pendidikan_1.jpg",
                            nama: "Nama Anggota 1"
                        },
                        {
                            foto: "pendidikan_2.jpg",
                            nama: "Nama Anggota 2"
                        },
                        {
                            foto: "pendidikan_3.jpg",
                            nama: "Nama Anggota 3"
                        },
                        {
                            foto: "pendidikan_4.jpg",
                            nama: "Nama Anggota 4"
                        },
                        {
                            foto: "pendidikan_5.jpg",
                            nama: "Nama Anggota 5"
                        },
                        {
                            foto: "pendidikan_6.jpg",
                            nama: "Nama Anggota 6"
                        },
                        {
                            foto: "pendidikan_7.jpg",
                            nama: "Nama Anggota 7"
                        },
                        {
                            foto: "pendidikan_8.jpg",
                            nama: "Nama Anggota 8"
                        },
                        {
                            foto: "pendidikan_9.jpg",
                            nama: "Nama Anggota 9"
                        },
                        {
                            foto: "pendidikan_10.jpg",
                            nama: "Nama Anggota 10"
                        },
                    ]
                },
                {
                    judul: "Kewirausahaan",
                    nama: "Kewirausahaan",
                    ketua: {
                        foto: "ketua_kewirausahaan.jpg",
                        nama: "Nama Ketua Kewirausahaan"
                    },
                    wakil: {
                        foto: "wakil_kewirausahaan.jpg",
                        nama: "Nama Wakil Kewirausahaan"
                    },
                    anggota: [{
                            foto: "kewirusahaan_1.jpg",
                            nama: "Nama Anggota 1"
                        },
                        {
                            foto: "kewirusahaan_2.jpg",
                            nama: "Nama Anggota 2"
                        },
                        {
                            foto: "kewirusahaan_3.jpg",
                            nama: "Nama Anggota 3"
                        },
                        {
                            foto: "kewirusahaan_4.jpg",
                            nama: "Nama Anggota 4"
                        },
                        {
                            foto: "kewirusahaan_5.jpg",
                            nama: "Nama Anggota 5"
                        },
                        {
                            foto: "kewirusahaan_6.jpg",
                            nama: "Nama Anggota 6"
                        },
                        {
                            foto: "kewirusahaan_7.jpg",
                            nama: "Nama Anggota 7"
                        },
                        {
                            foto: "kewirusahaan_8.jpg",
                            nama: "Nama Anggota 8"
                        },
                        {
                            foto: "kewirusahaan_9.jpg",
                            nama: "Nama Anggota 9"
                        },
                        {
                            foto: "kewirusahaan_10.jpg",
                            nama: "Nama Anggota 10"
                        },
                    ]
                },
                {
                    judul: "Lingkungan Hidup",
                    nama: "Lingkungan Hidup",
                    ketua: {
                        foto: "ketua_Lingkungan Hidup.jpg",
                        nama: "Nama Ketua Lingkungan Hidup"
                    },
                    wakil: {
                        foto: "wakil_Lingkungan Hidup.jpg",
                        nama: "Nama Wakil Lingkungan Hidup"
                    },
                    anggota: [{
                            foto: "LH_1.jpg",
                            nama: "Nama Anggota 1"
                        },
                        {
                            foto: "LH_2.jpg",
                            nama: "Nama Anggota 2"
                        },
                        {
                            foto: "LH_3.jpg",
                            nama: "Nama Anggota 3"
                        },
                        {
                            foto: "LH_4.jpg",
                            nama: "Nama Anggota 4"
                        },
                        {
                            foto: "LH_5.jpg",
                            nama: "Nama Anggota 5"
                        },
                        {
                            foto: "LH_6.jpg",
                            nama: "Nama Anggota 6"
                        },
                        {
                            foto: "LH_7.jpg",
                            nama: "Nama Anggota 7"
                        },
                        {
                            foto: "LH_8.jpg",
                            nama: "Nama Anggota 8"
                        },
                        {
                            foto: "LH_9.jpg",
                            nama: "Nama Anggota 9"
                        },
                        {
                            foto: "LH_10.jpg",
                            nama: "Nama Anggota 10"
                        },
                    ]
                },
                {
                    judul: "Pengabdian Masyarakat",
                    nama: "Pengabdian Masyarakat",
                    ketua: {
                        foto: "ketua_Pengabdian Masyarakat.jpg",
                        nama: "Nama Ketua Pengmas"
                    },
                    wakil: {
                        foto: "wakil_Pengabdian Masyarakat.jpg",
                        nama: "Nama Wakil Pengmas"
                    },
                    anggota: [{
                            foto: "Pengmas_1.jpg",
                            nama: "Nama Anggota 1"
                        },
                        {
                            foto: "Pengmas_2.jpg",
                            nama: "Nama Anggota 2"
                        },
                        {
                            foto: "Pengmas_3.jpg",
                            nama: "Nama Anggota 3"
                        },
                        {
                            foto: "Pengmas_4.jpg",
                            nama: "Nama Anggota 4"
                        },
                        {
                            foto: "Pengmas_5.jpg",
                            nama: "Nama Anggota 5"
                        },
                        {
                            foto: "Pengmas_6.jpg",
                            nama: "Nama Anggota 6"
                        },
                        {
                            foto: "Pengmas_7.jpg",
                            nama: "Nama Anggota 7"
                        },
                        {
                            foto: "Pengmas_8.jpg",
                            nama: "Nama Anggota 8"
                        },
                        {
                            foto: "Pengmas_9.jpg",
                            nama: "Nama Anggota 9"
                        },
                        {
                            foto: "Pengmas_10.jpg",
                            nama: "Nama Anggota 10"
                        },
                    ]
                },
            ];

            const container = document.getElementById("struktur-divisi");
            let content = "";

            divisi.forEach((div, index) => {
                let anggotaHtml = div.anggota.map(anggota => `
            <div class="swiper-slide w-64">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="../../img/${anggota.foto}" alt="${anggota.nama}" class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                    <h3 class="text-2xl font-bold text-gray-800">${anggota.nama}</h3>
                    <p class="text-blue-600 font-semibold">${div.nama}</p>
                </div>
            </div>
        `).join("");

                content += `
            <div>
                <h2 class="text-2xl font-bold text-gray-800 text-center my-10">${div.judul}</h2>
                <div class="flex flex-wrap justify-center mb-8 gap-10">
                    <div class="bg-white p-6 rounded-lg shadow-lg text-center w-64">
                        <img src="../../img/${div.ketua.foto}" alt="${div.ketua.nama}" class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                        <h3 class="text-2xl font-bold text-gray-800">${div.ketua.nama}</h3>
                        <p class="text-blue-600 font-semibold">CO ${div.nama}</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg text-center w-64">
                        <img src="../../img/${div.wakil.foto}" alt="${div.wakil.nama}" class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                        <h3 class="text-2xl font-bold text-gray-800">${div.wakil.nama}</h3>
                        <p class="text-blue-600 font-semibold">SekCO ${div.nama}</p>
                    </div>
                </div>

                <h3 class="text-xl font-bold text-gray-800 text-center my-10">Anggota ${div.judul}</h3>
                <div class="swiper-container overflow-hidden" id="swiper-${index}">
                    <div class="swiper-wrapper flex">
                        ${anggotaHtml}
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        `;
            });

            container.innerHTML = content;

            // Inisialisasi SwiperJS untuk setiap container
            divisi.forEach((_, index) => {
                new Swiper(`#swiper-${index}`, {
                    slidesPerView: "auto",
                    spaceBetween: 20,
                    navigation: {
                        nextEl: `#swiper-${index} .swiper-button-next`,
                        prevEl: `#swiper-${index} .swiper-button-prev`,
                    },
                    scrollbar: {
                        el: `#swiper-${index} .swiper-scrollbar`,
                        draggable: true,
                    },
                    mousewheel: true,
                    grabCursor: true,
                });
            });
        });
    </script>
@endsection
