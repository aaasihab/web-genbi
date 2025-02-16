@extends('admin.layouts.admin')

@section('title', 'Dashboard')


@section('content')
    <!-- Form Edit Divisi -->
    <section id="edit-divisi" class="relative bg-gray-50 py-12 mt-14">
        <div class="container mx-auto max-w-3xl bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Edit Divisi</h2>

            <form action="{{ route('admin.divisi.update', $divisi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Pilihan Organisasi -->
                <div class="mb-4">
                    <label for="organisasi_id" class="block text-gray-700 font-semibold">Organisasi</label>
                    <select name="organisasi_id" id="organisasi_id" required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled>Pilih Organisasi...</option>
                        @foreach ($organisasi as $org)
                            <option value="{{ $org->id }}"
                                {{ old('organisasi_id', $divisi->organisasi_id) == $org->id ? 'selected' : '' }}>
                                {{ $org->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('organisasi_id')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Nama Divisi -->
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold">Nama Divisi</label>
                    <input type="text" name="nama" id="nama" @error('nama') is-invalid @enderror required
                        value="{{ old('nama', $divisi->nama) }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('nama')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('admin.divisi.index') }}"
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
