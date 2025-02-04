@extends('layouts.main')

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
            <h1 class="text-4xl md:text-5xl font-bold">Edit Pengumuman</h1>
        </div>
    </section>

    <!-- Form Edit Pengumuman -->
    <section id="edit-pengumuman" class="relative bg-gray-50 py-12 mt-14">
        <div class="container mx-auto max-w-3xl bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Edit Pengumuman</h2>

            <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 font-semibold">Judul Pengumuman</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul', $pengumuman->judul) }}"
                        required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 font-semibold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $pengumuman->deskripsi) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block text-gray-700 font-semibold">Gambar</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <!-- Tampilkan gambar lama jika ada -->
                    @if (!empty($pengumuman->gambar))
                        <div class="mt-2">
                            <p class="text-gray-600 text-sm">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="Gambar Pengumuman"
                                class="w-40 rounded-md border">
                        </div>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-semibold">Status</label>
                    <select name="status" id="status"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="published" {{ old('status', $pengumuman->status) == 'published' ? 'selected' : '' }}>
                            Published</option>
                        <option value="nonaktif" {{ old('status', $pengumuman->status) == 'nonaktif' ? 'selected' : '' }}>
                            Nonaktif</option>
                    </select>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('pengumuman.show') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md">
                        Kembali
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
