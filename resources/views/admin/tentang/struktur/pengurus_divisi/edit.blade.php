@extends('admin.layouts.admin')

@section('title', 'Dashboard')


@section('content')
    <!-- Form Edit Pengurus Divisi -->
    <section id="edit-pengurus-divisi" class="relative bg-gray-50 py-12 mt-14">
        <div class="container mx-auto max-w-3xl bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Edit Pengurus Divisi</h2>

            <form action="{{ route('admin.pengurus_divisi.update', $pengurusDivisi->id) }}" method="POST"
                enctype="multipart/form-data">
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
                                {{ old('divisi_id', $pengurusDivisi->divisi_id) == $d->id ? 'selected' : '' }}>
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

                <!-- Nama Pengurus -->
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold">Nama Pengurus</label>
                    <input type="text" name="nama" id="nama" @error('nama') is-invalid @enderror required
                        value="{{ old('nama', $pengurusDivisi->nama) }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('nama')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <!-- Jabatan -->
                <div class="mb-4">
                    <label for="jabatan" class="block text-gray-700 font-semibold">Jabatan</label>
                    <select name="jabatan" id="jabatan" @error('jabatan') is-invalid @enderror required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="CO" {{ $pengurusDivisi->jabatan == 'CO' ? 'selected' : '' }}>CO</option>
                        <option value="SekCO" {{ $pengurusDivisi->jabatan == 'SekCO' ? 'selected' : '' }}>
                            SekCO</option>
                    </select>
                    @error('jabatan')
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
                    @if (!empty($pengurusDivisi->foto))
                        <div class="mt-2">
                            <p class="text-gray-600 text-sm">Foto saat ini:</p>
                            <img src="{{ asset('storage/' . $pengurusDivisi->foto) }}" alt="Foto Pengurus"
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
                            {{ old('status', $pengurusDivisi->status) == 'published' ? 'selected' : '' }}>
                            Published</option>
                        <option value="nonaktif"
                            {{ old('status', $pengurusDivisi->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('admin.pengurus_divisi.index') }}"
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
