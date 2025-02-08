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
        <div class="absolute inset-0 bg-center bg-no-repeat opacity-50 block md:hidden"
            style="background-image: url('{{ asset('templates/img/genbi.jpg') }}'); background-size: contain; background-position: 50% 60%;">
        </div>

        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-b to-transparent from-blue-800"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50"></div>

        <!-- Content -->
        <div class="relative z-10 text-center space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold">Tentang BI</h1>
        </div>
    </section>

    <!-- Tentang BI -->
    <section id="tentang-bi-malang" class="bg-gray-50 pt-10 pb-16 px-10">
        <div class="container mx-auto px-4">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <button
                    class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-lg mb-6 hover:bg-blue-600 transition duration-300 ease-in-out animate-hidden">
                    Bank Central Republik Indonesia
                </button>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 animate-hidden">Bank Indonesia Malang</h1>
            </div>

            <!-- About Section -->
            <div class="grid md:grid-cols-2 gap-8 items-center mb-12">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 animate-hidden animate-from-left">Sejarah Bank
                        Indonesia Malang</h2>
                    <p class="text-gray-600 leading-relaxed text-justify animate-hidden animate-from-left">
                        Berdiri sejak awal kemerdekaan Indonesia, Bank Indonesia Malang telah menjadi pilar utama dalam
                        menjaga stabilitas ekonomi daerah. Melalui kebijakan strategis yang berpihak pada pengembangan
                        sektor riil dan UMKM, Bank Indonesia Malang berperan dalam mendukung pertumbuhan ekonomi yang
                        inklusif dan berkelanjutan.
                    </p>
                </div>
                <div>
                    <img src="{{ asset('templates/img/gedung_BI.JPG') }}" alt="Gedung BI Malang"
                        class="rounded-lg shadow-md animate-hidden animate-from-right">
                </div>
            </div>

            <!-- Leadership Section -->
            <div class="grid md:grid-cols-2 gap-8 items-center mb-12">
                <div>
                    <img src="{{ asset('templates/img/ibu_febrina.jpg') }}" alt="Febrina Kurnia Dewi"
                        class="rounded-lg shadow-md animate-hidden animate-from-left">
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 animate-hidden animate-from-right">Kepemimpinan</h2>
                    <p class="text-gray-600 leading-relaxed text-justify animate-hidden animate-from-right">
                        Bank Indonesia Malang dipimpin oleh Ibu Febrina Kurnia Dewi yang dikenal dengan visi progresifnya.
                        Di bawah kepemimpinan beliau, Bank Indonesia Malang terus mendorong kolaborasi dengan berbagai pihak
                        untuk mendukung kebijakan ekonomi dan keuangan yang inovatif, stabilitas moneter, serta inklusi
                        keuangan di tingkat lokal.
                    </p>
                </div>
            </div>

            <!-- Visi dan Misi Section -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center animate-hidden">Visi dan Misi</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-bold text-blue-600 mb-4 animate-hidden animate-from-left">Visi</h3>
                        <p class="text-gray-600 leading-relaxed animate-hidden animate-from-left">
                            Menjadi mitra strategis dalam mewujudkan stabilitas ekonomi dan mendorong pertumbuhan yang
                            inklusif di wilayah Malang.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-blue-600 mb-4 animate-hidden animate-from-right">Misi</h3>
                        <ul
                            class="list-disc list-inside text-gray-600 leading-relaxed text-justify animate-hidden animate-from-right">
                            <li>Memastikan kebijakan moneter yang mendukung stabilitas ekonomi regional.</li>
                            <li>Mendukung pengembangan UMKM melalui kebijakan inklusi keuangan.</li>
                            <li>Memfasilitasi sistem pembayaran yang aman dan efisien.</li>
                            <li>Meningkatkan literasi keuangan masyarakat.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tujuan dan Tugas Section -->
            <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center animate-hidden">Tujuan dan Tugas</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Tujuan -->
                    <div class="flex flex-col items-center text-center animate-hidden animate-from-bottom">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fa-solid fa-bullseye text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Tujuan</h3>
                        <p class="text-gray-600">
                            Mewujudkan stabilitas moneter yang mendukung pertumbuhan ekonomi daerah secara berkelanjutan.
                        </p>
                    </div>
                    <!-- Tugas Kebijakan -->
                    <div class="flex flex-col items-center text-center animate-hidden animate-from-bottom">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fa-solid fa-handshake text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Kebijakan</h3>
                        <p class="text-gray-600">
                            Melaksanakan kebijakan moneter, sistem pembayaran, dan pengawasan stabilitas keuangan regional.
                        </p>
                    </div>
                    <!-- Penelitian -->
                    <div class="flex flex-col items-center text-center animate-hidden animate-from-bottom">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fa-solid fa-chart-pie text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Riset</h3>
                        <p class="text-gray-600">
                            Melakukan penelitian dan kajian untuk mendukung perumusan kebijakan ekonomi dan keuangan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('this-page-scripts')
@endsection
