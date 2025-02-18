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
        <div class="absolute inset-0 bg-gradient-to-b to-transparent from-red-800"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50"></div>

        <!-- Content -->
        <div class="relative z-10 text-center space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-10 ">404 | Not Found</h1>
            <h1 class="text-xl md:text-2xl mb-12 pb-4 block md:hidden">Maaf, halaman yang anda cari tidak ditemukan</h1>
            <h1 class="text-xl md:text-2xl mb-12 pb-4 hidden md:block">Maaf, halaman yang anda cari tidak ditemukan</h1>
        </div>
    </section>
@endsection

@section('this-page-scripts')
@endsection
