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
            <h1 class="text-4xl md:text-5xl font-bold">Pengumuman</h1>
        </div>
    </section>

    <!-- Pengumuman -->
    <section id="pengumuman" class="bg-gray-50 pt-12 pb-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <button
                    class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-lg mb-6 hover:bg-blue-600 transition duration-300 ease-in-out">
                    Beasiswa
                </button>
            </div>
            <!-- Judul -->
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Pengumuman Beasiswa</h2>

            <!-- Grid Card -->
            <div class="grid gap-8 md:grid-cols-3">
                @if ($pengumuman->isEmpty())
                    <div class="col-span-3 text-center text-gray-500">
                        <p>Masih belum ada pengumuman beasiswa saat ini.</p>
                    </div>
                @else
                    @foreach ($pengumuman as $item)
                        <a href="{{ route('home.downloadPengumuman', $item->id) }}" class="block group">
                            <div
                                class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                    class="w-full h-40 object-cover group-hover:opacity-90 transition-opacity">
                                <div class="p-6">
                                    <p class="text-sm text-gray-500">Tanggal:
                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                                    </p>
                                    <h3
                                        class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                                        {{ $item->judul }}
                                    </h3>
                                    <p class="text-gray-600 mt-2">{{ Str::limit($item->deskripsi, 100) }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>

        </div>
    </section>
@endsection

@section('this-page-scripts')
@endsection
