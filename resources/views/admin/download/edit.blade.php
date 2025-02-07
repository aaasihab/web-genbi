@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Form Edit File Download -->
    <section id="edit-download" class="relative bg-gray-50 py-12 mt-14">
        <div class="container mx-auto max-w-3xl bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Edit File Download</h2>

            <form action="{{ route('admin.download.update', $download->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nama_file" class="block text-gray-700 font-semibold">Nama File</label>
                    <input type="text" name="nama_file" id="nama_file" @error('nama_file') is-invalid @enderror
                        value="{{ old('nama_file', $download->nama_file) }}" required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('nama_file')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="file" class="block text-gray-700 font-semibold">File</label>
                    <input type="file" name="file" id="file" @error('file') is-invalid @enderror
                        accept=".pdf,.doc,.docx,.xlsx,.xls,.ppt,.pptx,.jpg,.png,.jpeg"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('file')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Tampilkan file lama jika ada -->
                    @if (!empty($download->file))
                        <div class="mt-2">
                            <p class="text-gray-600 text-sm">File saat ini:</p>

                            @php
                                $fileExtension = pathinfo($download->file, PATHINFO_EXTENSION);
                                $imageExtensions = ['jpg', 'jpeg', 'png', 'svg'];
                            @endphp

                            @if (in_array(strtolower($fileExtension), $imageExtensions))
                                <!-- Tampilkan sebagai gambar jika tipe file adalah gambar -->
                                <img src="{{ asset('storage/' . $download->file) }}" alt="File Gambar"
                                    class="w-40 rounded-md border">
                            @else
                                <!-- Jika bukan gambar, tampilkan sebagai link download -->
                                <a href="{{ asset('storage/' . $download->file) }}" target="_blank"
                                    class="text-blue-600 underline">Lihat File</a>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-semibold">Status</label>
                    <select name="status" id="status" required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="published" {{ old('status', $download->status) == 'published' ? 'selected' : '' }}>
                            Published</option>
                        <option value="nonaktif" {{ old('status', $download->status) == 'nonaktif' ? 'selected' : '' }}>
                            Nonaktif</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('admin.download.index') }}"
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
