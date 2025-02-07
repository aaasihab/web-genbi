@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Form Tambah File -->
    <section id="tambah-file" class="bg-gray-50 py-12 mt-14">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Form Tambah File</h2>

            <form action="{{ route('admin.download.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label for="nama_file" class="block font-medium text-gray-700">Nama File</label>
                    <input type="text" id="nama_file" name="nama_file" @error('nama_file') is-invalid @enderror required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('nama_file') is-invalid @enderror"
                        value="{{ old('nama_file') }}">
                    @error('nama_file')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="file" class="block font-medium text-gray-700">Pilih File</label>
                    <input type="file" id="file" name="file" @error('file') is-invalid @enderror required
                        accept=".pdf,.doc,.docx,.xlsx,.xls,.ppt,.pptx,.jpg,.png,.jpeg"
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md">
                    @error('file')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block font-medium text-gray-700">Status</label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('status') is-invalid @enderror">
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between mt-6">
                    <a href="{{ route('admin.download.index') }}"
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
