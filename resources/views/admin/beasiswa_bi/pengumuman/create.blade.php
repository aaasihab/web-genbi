@extends('admin.layouts.admin')

@section('title', 'Dashboard')


@section('content')
    <!-- Form Tambah Pengumuman -->
    <section class="bg-gray-50 py-12">
        <div class="container mx-auto max-w-3xl bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Form Tambah Pengumuman</h2>

            <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 font-semibold">Judul Pengumuman</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}" @error('judul') is-invalid @enderror required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('judul')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 font-semibold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" @error('deskripsi') is-invalid @enderror required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block text-gray-700 font-semibold">Upload Gambar</label>
                    <input type="file" name="gambar" id="gambar" accept=".jpg,.png,.jpeg"
                        @error('gambar') is-invalid @enderror required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('gambar')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="file_download" class="block text-gray-700 font-semibold">Uploud File</label>
                    <input type="file" id="file_download" name="file_download"
                        @error('file_download') is-invalid @enderror required accept=".pdf,.doc,.docx,.xlsx,.xls,.ppt,.pptx"
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('file_download')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="block font-medium text-gray-700">Status</label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        <option value="published">Published</option>
                        <option value="nonaktif">nonaktif</option>
                    </select>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('admin.pengumuman.index') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md">
                        Kembali
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                        Simpan Pengumuman
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
