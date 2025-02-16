@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Form Edit Pengurus Harian -->
    <section id="edit-pengurus-harian" class="relative bg-gray-50 py-12 mt-14">
        <div class="container mx-auto max-w-3xl bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Edit Pengurus Harian</h2>

            <form action="{{ route('admin.pengurus_harian.update', $pengurusHarian->id) }}" method="POST"
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
                    <input type="text" name="nama" id="nama" @error('nama') is-invalid @enderror required
                        value="{{ old('nama', $pengurusHarian->nama) }}"
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
                        <option value="PJ_Komisariat" {{ $pengurusHarian->jabatan == 'PJ_Komisariat' ? 'selected' : '' }}>Ketua</option>
                        <option value="Sekretaris" {{ $pengurusHarian->jabatan == 'Sekretaris' ? 'selected' : '' }}>
                            Sekretaris</option>
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
                    <input type="file" name="foto" id="foto" @error('foto') is-invalid @enderror
                        accept=".jpeg,.png,.jpg"
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


                <div class="mb-4">
                    <label for="status" class="block font-medium text-gray-700">Status</label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 @error('status', $pengurusHarian->status) is-invalid @enderror">
                        <option value="published" {{ old('status', $pengurusHarian->status) == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="nonaktif" {{ old('status', $pengurusHarian->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('admin.pengurus_harian.index') }}"
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
