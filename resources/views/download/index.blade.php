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
            <h1 class="text-4xl md:text-5xl font-bold">Download</h1>
        </div>
    </section>

    <!-- Dpwnload -->
    <section id="download" class="bg-gray-50 py-16 md:mx-10 mx-3">
        <div class="container mx-auto px-4 text-center">
            <div class="text-center">
                <button
                    class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-lg mb-6 hover:bg-blue-600 transition duration-300 ease-in-out animate-hidden">
                    Download
                </button>
            </div>
            <h1 class="md:text-4xl text-3xl font-bold text-gray-800 mb-8 animate-hidden">Download Logo Resmi</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Logo BI -->
                <div
                    class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center animate-hidden animate-from-bottom">
                    <img src="{{ asset('templates/img/gedung_BI.JPG') }}" alt="Logo Bank Indonesia" class="w-24 h-24 mb-4">
                    <h2 class="text-lg font-bold text-gray-800">Logo Bank Indonesia</h2>
                    <a href="../../downloads/logo_BI.png" download
                        class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Download
                    </a>
                </div>

                <!-- Logo GenBI Malang -->
                <div
                    class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center animate-hidden animate-from-bottom">
                    <img src="{{ asset('templates/img/gedung_BI.JPG') }}" alt="Logo GenBI Malang" class="w-24 h-24 mb-4">
                    <h2 class="text-lg font-bold text-gray-800">Logo GenBI Malang</h2>
                    <a href="../../downloads/logo_GenBI.png" download
                        class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Download
                    </a>
                </div>

                <!-- Logo CBP -->
                <div
                    class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center animate-hidden animate-from-bottom">
                    <img src="{{ asset('templates/img/gedung_BI.JPG') }}" alt="Logo CBP" class="w-24 h-24 mb-4">
                    <h2 class="text-lg font-bold text-gray-800">Logo CBP</h2>
                    <a href="../../downloads/logo_CBP.png" download
                        class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Download
                    </a>
                </div>

                <!-- Logo QRIS -->
                <div
                    class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center animate-hidden animate-from-bottom">
                    <img src="{{ asset('templates/img/gedung_BI.JPG') }}" alt="Logo QRIS" class="w-24 h-24 mb-4">
                    <h2 class="text-lg font-bold text-gray-800">Logo QRIS</h2>
                    <a href="../../downloads/logo_QRIS.png" download
                        class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Download
                    </a>
                </div>

                <!-- Logo 5J -->
                <div
                    class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center animate-hidden animate-from-bottom">
                    <img src="{{ asset('templates/img/gedung_BI.JPG') }}" alt="Logo 5J" class="w-24 h-24 mb-4">
                    <h2 class="text-lg font-bold text-gray-800">Logo 5J</h2>
                    <a href="../../downloads/logo_5J.png" download
                        class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Download
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('this-page-scripts')
@endsection
