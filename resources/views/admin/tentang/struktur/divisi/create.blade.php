@extends('admin.layouts.admin')

@section('title', 'Dashboard')


@section('content')
    <!-- Form Tambah Divisi -->
    <section id="tambah-divisi" class="bg-gray-50 py-12 mt-14">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Form Tambah Divisi</h2>

            <form action="{{ route('admin.divisi.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="organisasi_id" class="block font-medium text-gray-700">Organisasi</label>
                    <select name="organisasi_id" id="organisasi_id" @error('organisasi_id') is-invalid @enderror required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Pilih Organisasi...</option>
                        @foreach ($organisasi as $org)
                            <option value="{{ $org->id }}" {{ old('organisasi_id') == $org->id ? 'selected' : '' }}>
                                {{ $org->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('organisasi_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div>
                    <label for="nama" class="block font-medium text-gray-700">Nama Divisi</label>
                    <input type="text" id="nama" name="nama" required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('nama') }}">
                </div>

                <!-- Buttons -->
                <div class="flex justify-between mt-6">
                    <a href="{{ route('admin.divisi.index') }}"
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
