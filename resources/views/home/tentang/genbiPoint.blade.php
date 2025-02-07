@extends('home.layouts.main')

@section('this-page-style')
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="relative h-screen flex items-center justify-center text-white -mt-12">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center opacity-50 hidden md:block"
            style="background-image: url('{{ asset('templates/img/visi-misi.jpg') }}');"></div>
        <div class="absolute inset-0 bg-center bg-no-repeat opacity-70 block md:hidden"
            style="background-image: url('.{{ asset('templates/img/genbi.jpg') }}'); background-size: contain; background-position: 50% 60%;">
        </div>

        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-b to-transparent from-blue-800"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50"></div>

        <!-- Content -->
        <div class="relative z-10 text-center space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold">GenBI UNUJA Point</h1>
        </div>
    </section>

    <!-- GenBI Point -->
    <section id="genbi-point" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-center text-3xl font-bold text-gray-800 mb-8 animate-hidden">GenBI Point</h2>

            @if ($genbiPoints->isEmpty())
                <!-- Pesan jika data kosong -->
                <p class="text-center text-lg text-gray-600">Data GenBI Point belum tersedia.</p>
            @else
                <div class="max-w-3xl mx-auto space-y-4">
                    @foreach ($genbiPoints as $genbiPoint)
                        <!-- Point -->
                        <div
                            class="bg-white shadow-md rounded-lg p-4 hover:shadow-lg transition animate-hidden animate-from-bottom">
                            <a href="{{ $genbiPoint->link_drive }}" target="_blank"
                                class="flex items-center justify-between text-blue-600 hover:text-blue-800 transition">
                                <span class="text-lg font-medium">Point Anggota GenBI bulan {{ $genbiPoint->bulan }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

@endsection

@section('this-page-scripts')
@endsection
