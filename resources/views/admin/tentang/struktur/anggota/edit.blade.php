@extends('admin.layouts.admin')

@section('title', 'Dashboard')


@section('content')
    <!-- Form Edit Anggota -->
    <section id="edit-anggota" class="relative bg-gray-50 py-12 mt-14">
        <div class="container mx-auto max-w-3xl bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Edit Anggota</h2>

            <form action="{{ route('admin.anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Pilihan Divisi -->
                <div class="mb-4">
                    <label for="divisi_id" class="block text-gray-700 font-semibold">Divisi</label>
                    <select name="divisi_id" id="divisi_id" @error('divisi_id') is-invalid @enderror required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled>Pilih Divisi...</option>
                        @foreach ($divisi as $d)
                            <option value="{{ $d->id }}"
                                {{ old('divisi_id', $anggota->divisi_id) == $d->id ? 'selected' : '' }}>
                                {{ $d->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('divisi_id')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Nama Anggota -->
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold">Nama Anggota</label>
                    <input type="text" name="nama" id="nama" @error('nama') is-invalid @enderror required
                        value="{{ old('nama', $anggota->nama) }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('nama')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Upload Foto -->
                <div class="mb-4">
                    <label for="foto" class="block text-gray-700 font-semibold">Foto</label>
                    <input type="file" name="foto" id="foto" @error('foto') is-invalid @enderror
                        accept=".jpeg,.png,.jpg"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('foto')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Tampilkan foto lama jika ada -->
                    @if (!empty($anggota->foto))
                        <div class="mt-2">
                            <p class="text-gray-600 text-sm">Foto saat ini:</p>
                            <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto Anggota"
                                class="w-40 rounded-md border">
                        </div>
                    @endif
                </div>

                <!-- Pilihan Status -->
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-semibold">Status</label>
                    <select name="status" id="status" @error('status') is-invalid @enderror required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled>Pilih Status...</option>
                        <option value="published"
                            {{ old('status', $anggota->status) == 'published' ? 'selected' : '' }}>
                            Published</option>
                        <option value="nonaktif"
                            {{ old('status', $anggota->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('admin.anggota.index') }}"
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
