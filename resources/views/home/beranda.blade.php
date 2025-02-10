@extends('home.layouts.main')

@section('this-page-style')
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="relative h-screen flex items-center justify-center text-white md:-mt-12">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center opacity-50 hidden md:block"
            style="background-image: url('{{ asset('templates/img/visi-misi.jpg') }}');">
        </div>
        <div class="absolute inset-0 bg-center bg-no-repeat opacity-70 block md:hidden"
            style="background-image: url('{{ asset('templates/img/genbi.jpg') }}'); background-size: contain; background-position: 50% 60%;">
        </div>
        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-b to-transparent from-blue-800"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50"></div>

        <!-- Content -->
        <div class="relative z-10 text-center space-y-4 px-5">
            <h1 class="text-4xl md:text-5xl font-bold mb-10 ">Mimpi, Aksi, dan Perubahan!</h1>
            <h1 class="text-xl md:text-2xl mb-12 pb-4 block md:hidden">Kita membentuk masa depan dengan pendidikan,
                dan aksi nyata. </h1>
            <h1 class="text-xl md:text-2xl mb-12 pb-4 hidden md:block">Kita membentuk masa depan dengan pendidikan,
                </br>kolaborasi dan aksi nyata. </h1>
            <button class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-lg mb-6 hover:bg-blue-600 transition">
                Bergabung bersama kami
            </button>
        </div>
    </section>

    <!-- Logo Universitas -->
    <section id="logo-universitas" class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 text-center animate-hidden animate-from botom">
            <div class="flex flex-wrap justify-center gap-10 md:gap-20">
                <img src="{{ asset('templates/img/Logo-UNUJA.png') }}" alt="Universitas 1" class="w-24">
                <img src="{{ asset('templates/img/LOGO-UIN-MALANG-HI-RES-2048x1990.png') }}" alt="Universitas 2"
                    class="w-24">
                <img src="{{ asset('templates/img/Logo_Universitas_Brawijaya.svg.png') }}" alt="Universitas 3"
                    class="w-24">
                <img src="{{ asset('templates/img/Lambang-UM-550x550.png') }}" alt="Universitas 4" class="w-24">
                <img src="{{ asset('templates/img/Logo_umm.png') }}" alt="Universitas 5" class="w-24">
            </div>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section id="tentang-kami" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Section 1 -->
            <div class="grid md:grid-cols-2 gap-8 items-center mb-12 mx-10">
                <div class="animate-hidden animate-from-left">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Tentang GenBI Malang</h2>
                    <p class="text-gray-600 leading-relaxed">
                        GenBI Malang adalah komunitas penerima beasiswa Bank Indonesia yang memiliki komitmen dalam
                        pengembangan sosial dan akademik.
                    </p>
                </div>
                <div>
                    <img src="{{ asset('templates/img/genbiMalang.jpg') }}" alt="Tentang Kami"
                        class="rounded-lg shadow-md animate-hidden animate-from-right">
                </div>
            </div>

            <!-- Section 2 -->
            <div class="grid md:grid-cols-2 gap-8 items-center mx-10">
                <div class="md:order-2 animate-hidden animate-from-right">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Visi dan Misi</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Kami berperan aktif dalam mendukung literasi keuangan, pengembangan komunitas, dan pemberdayaan
                        generasi muda.
                    </p>
                </div>
                <div class="md:order-1">
                    <img src="{{ asset('templates/img/gedung_BI.JPG') }}" alt="Visi dan Misi"
                        class="rounded-lg shadow-md animate-hidden animate-from-left">
                </div>
            </div>
        </div>
    </section>

    <!-- Anggota Teraktif -->
    <section id="anggota-teraktif" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-6 animate-hidden">Anggota Teraktif</h2>
            <p class="text-gray-600 mb-10 text-lg animate-hidden hidden md:block">
                Menginspirasi melalui Dedikasi: Anggota Teraktif Yang Membuktikan </br>Bahwa Kerja Keras dan Komitmen
                Membawa Keberhasilan.
            </p>
            <p class="text-gray-600 mb-10 text-lg animate-hidden block md:hidden">
                Menginspirasi melalui Dedikasi: Anggota Teraktif Yang Membuktikan Bahwa Kerja Keras dan Komitmen Membawa
                Keberhasilan.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <!-- Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center animate-hidden animate-from-bottom">
                    <img src="{{ asset('templates/img/visi-misi.jpg') }}" alt="Anggota 1"
                        class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                    <h3 class="text-2xl font-bold text-gray-800">Anggota 1</h3>
                    <p class="text-blue-600 font-semibold">Teknik Informatika - UB</p>
                    <p class="text-gray-600 mt-2 text-sm">
                        First Winner Hackathon Festival by Telkom Indonesia
                    </p>
                    <div class="flex justify-center space-x-4 mt-4">
                        <a href="#"><i class="fab fa-twitter text-gray-500 text-xl"></i></a>
                        <a href="#"><i class="fab fa-linkedin text-gray-500 text-xl"></i></a>
                        <a href="#"><i class="fab fa-dribbble text-gray-500 text-xl"></i></a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg text-center animate-hidden animate-from-bottom">
                    <img src="{{ asset('templates/img/visi-misi.jpg') }}" alt="Anggota 2"
                        class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                    <h3 class="text-2xl font-bold text-gray-800">Anggota 2</h3>
                    <p class="text-blue-600 font-semibold">Akuntansi - UM</p>
                    <p class="text-gray-600 mt-2 text-sm">
                        Second Place Winner Business Case Competition by Paragon Corp
                    </p>
                    <div class="flex justify-center space-x-4 mt-4">
                        <a href="#"><i class="fab fa-twitter text-gray-500 text-xl"></i></a>
                        <a href="#"><i class="fab fa-linkedin text-gray-500 text-xl"></i></a>
                        <a href="#"><i class="fab fa-dribbble text-gray-500 text-xl"></i></a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg text-center animate-hidden animate-from-bottom">
                    <img src="{{ asset('templates/img/visi-misi.jpg') }}" alt="Anggota 3"
                        class="w-48 h-48 rounded-lg mx-auto mb-4 object-cover">
                    <h3 class="text-2xl font-bold text-gray-800">Anggota 3</h3>
                    <p class="text-blue-600 font-semibold">Hukum - UB</p>
                    <p class="text-gray-600 mt-2 text-sm">
                        First Winner Debate Competition by Universitas Indonesia
                    </p>
                    <div class="flex justify-center space-x-4 mt-4">
                        <a href="#"><i class="fab fa-twitter text-gray-500 text-xl"></i></a>
                        <a href="#"><i class="fab fa-linkedin text-gray-500 text-xl"></i></a>
                        <a href="#"><i class="fab fa-dribbble text-gray-500 text-xl"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Kegiatan Terbaru -->
    <section id="kegiatan-terbaru" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-8 animate-hidden">Kegiatan Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($kegiatan as $item)
                    <!-- Card -->
                    <div class="bg-white p-6 rounded-lg shadow-lg text-left animate-hidden animate-from-bottom">
                        <img src="{{ asset('storage/' . ($item->gambar ?? 'img/default.jpg')) }}"
                            alt="{{ $item->nama }}" class="rounded-lg mb-4 h-48 w-full object-cover">
                        <h3 class="text-xl font-bold text-gray-800">{{ $item->nama }}</h3>
                        <p class="text-gray-600 text-sm mt-2">
                            Tanggal: {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d F Y') }}
                        </p>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($item->deskripsi, 100) }}</p>
                        <a href="#" class="text-blue-600 font-semibold mt-4 block">Selengkapnya →</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('this-page-scripts')
@endsection
