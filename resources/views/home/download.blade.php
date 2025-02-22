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
            <h1 class="text-4xl md:text-5xl font-bold">Download</h1>
        </div>
    </section>

    <!-- Halaman Download -->
    <section id="download" class="bg-gray-50 pt-12 pb-16 md:mx-10 mx-3">
        <div class="container mx-auto px-4 text-center">
            <div class="text-center">
                <button
                    class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-lg mb-6 hover:bg-blue-600 transition duration-300 ease-in-out">
                    Download
                </button>
            </div>
            <h1 class="md:text-4xl text-3xl font-bold text-gray-800 mb-8">Download Logo Resmi</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @if ($downloads->isEmpty())
                    <div class="col-span-3 text-center text-gray-500">
                        <p>Tidak ada File yang bisa didownload untuk saat ini.</p>
                    </div>
                @else
                    @foreach ($downloads as $file)
                        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
                            <img src="{{ Storage::url($file->file) }}" 
                                alt="{{ $file->nama_file }}" 
                                class="w-full max-w-xs h-auto aspect-square object-cover rounded-lg shadow-md">
                            <h2 class="text-lg font-bold text-gray-800 mt-4 text-center">{{ $file->nama_file }}</h2>
                            <a href="{{ route('home.downloadFile', $file->id) }}"
                                class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                Download
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection

@section('this-page-scripts')
@endsection
