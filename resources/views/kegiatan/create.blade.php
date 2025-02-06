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
            <h1 class="text-4xl md:text-5xl font-bold">Tambah Kegiatan</h1>
        </div>
    </section>

    <!-- Form Tambah Kegiatan -->
    <section id="tambah-kegiatan" class="bg-gray-50 py-12 mt-14">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Form Tambah Kegiatan</h2>

            <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label for="nama" class="block font-medium text-gray-700">Nama Kegiatan</label>
                    <input type="text" id="nama" name="nama" @error('nama') is-invalid @enderror required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="deskripsi" class="block font-medium text-gray-700">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="3" @error('deskripsi') is-invalid @enderror required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="tanggal_kegiatan" class="block font-medium text-gray-700">Tanggal Kegiatan</label>
                    <input type="date" id="tanggal_kegiatan" name="tanggal_kegiatan" @error('tanggal_kegiatan') is-invalid @enderror required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('tanggal_kegiatan') }}">
                    @error('tanggal_kegiatan')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block font-medium text-gray-700">Status</label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <div>
                    <label for="gambar" class="block font-medium text-gray-700">Gambar (Opsional)</label>
                    <input type="file" id="gambar" name="gambar" @error('gambar') is-invalid @enderror accept="image/*" required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md">
                    @error('gambar')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex justify-between mt-6">
                    <a href="{{ route('kegiatan.index') }}"
                        class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow-md transition">
                        Kembali
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('this-page-scripts')
@endsection
