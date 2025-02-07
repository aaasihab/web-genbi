@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Form Tambah Kegiatan -->
    <section id="tambah-kegiatan" class="bg-gray-50 py-12 mt-14">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Form Tambah Kegiatan</h2>

            <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                    <a href="{{ route('admin.kegiatan.index') }}"
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
