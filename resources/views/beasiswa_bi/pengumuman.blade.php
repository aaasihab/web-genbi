@extends('layouts.main')

@section('this-page-style')
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
            <h1 class="text-4xl md:text-5xl font-bold">Pengumuman</h1>
        </div>
    </section>

    <!-- Pengumuman -->
    <section id="pengumuman" class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <button
                    class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-lg mb-6 hover:bg-blue-600 transition duration-300 ease-in-out animate-hidden">
                    Beasiswa
                </button>
            </div>
            <!-- Judul -->
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12 animate-hidden">Pengumuman Beasiswa</h2>

            <!-- Grid Card -->
            <div class="grid gap-8 md:grid-cols-3">
                <!-- Card 1 -->
                <a href="link-pengumuman-tahap-1" class="block group animate-hidden animate-from-bottom">
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('templates/img/Cardboard.jpg') }}" alt="Pengumuman Tahap 1"
                            class="w-full h-40 object-cover group-hover:opacity-90 transition-opacity">
                        <div class="p-6">
                            <p class="text-sm text-gray-500">Tanggal: 1 Februari 2024</p>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                                Lolos Tahap 1</h3>
                            <p class="text-gray-600 mt-2">Daftar mahasiswa yang lolos seleksi tahap 1 untuk beasiswa GenBI.
                            </p>
                        </div>
                    </div>
                </a>

                <!-- Card 2 -->
                <a href="link-pengumuman-tahap-2" class="block group animate-hidden animate-from-bottom">
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('templates/img/Cardboard.jpg') }}" alt="Pengumuman Tahap 2"
                            class="w-full h-40 object-cover group-hover:opacity-90 transition-opacity">
                        <div class="p-6">
                            <p class="text-sm text-gray-500">Tanggal: 15 Februari 2024</p>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                                Lolos Tahap 2</h3>
                            <p class="text-gray-600 mt-2">Daftar mahasiswa yang lolos seleksi tahap 2 untuk beasiswa GenBI.
                            </p>
                        </div>
                    </div>
                </a>

                <!-- Card 3 -->
                <a href="link-pengumuman-tahap-final" class="block group animate-hidden animate-from-bottom">
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('templates/img/Cardboard.jpg') }}" alt="Pengumuman Tahap Final"
                            class="w-full h-40 object-cover group-hover:opacity-90 transition-opacity">
                        <div class="p-6">
                            <p class="text-sm text-gray-500">Tanggal: 28 Februari 2024</p>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                                Pengumuman Akhir</h3>
                            <p class="text-gray-600 mt-2">Daftar mahasiswa yang menerima beasiswa GenBI tahun 2024.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection

@section('this-page-scripts')
@endsection
