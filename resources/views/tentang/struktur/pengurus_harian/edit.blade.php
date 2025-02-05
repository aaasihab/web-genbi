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
            <h1 class="text-4xl md:text-5xl font-bold">Edit Organisasi</h1>
        </div>
    </section>

    <!-- Form Edit Pengurus Harian -->
    <section id="edit-pengurus-harian" class="relative bg-gray-50 py-12 mt-14">
        <div class="container mx-auto max-w-3xl bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Edit Pengurus Harian</h2>

            <form action="{{ route('pengurus_harian.update', $pengurusHarian->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Pilihan Organisasi -->
                <div class="mb-4">
                    <label for="organisasi_id" class="block text-gray-700 font-semibold">Organisasi</label>
                    <select name="organisasi_id" id="organisasi_id" @error('organisasi_id') is-invalid @enderror required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled>Pilih Organisasi...</option>
                        @foreach ($organisasi as $org)
                            <option value="{{ $org->id }}"
                                {{ old('organisasi_id', $pengurusHarian->organisasi_id) == $org->id ? 'selected' : '' }}>
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

                <!-- Nama Pengurus -->
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold">Nama Pengurus</label>
                    <input type="text" name="nama" id="nama" @error('nama') is-invalid @enderror required value="{{ old('nama', $pengurusHarian->nama) }}"
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
                        <option value="Ketua" {{ $pengurusHarian->jabatan == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                        <option value="Sekretaris" {{ $pengurusHarian->jabatan == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                        <option value="Bendahara" {{ $pengurusHarian->jabatan == 'Bendahara' ? 'selected' : '' }}>Bendahara
                        </option>
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
                    <input type="file" name="foto" id="foto" @error('foto') is-invalid @enderror accept=".jpeg,.png,.jpg"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('foto')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Tampilkan foto lama jika ada -->
                    @if (!empty($pengurusHarian->foto))
                        <div class="mt-2">
                            <p class="text-gray-600 text-sm">Foto saat ini:</p>
                            <img src="{{ asset('storage/' . $pengurusHarian->foto) }}" alt="Foto Pengurus"
                                class="w-40 rounded-md border">
                        </div>
                    @endif
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('pengurus_harian.index') }}"
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
