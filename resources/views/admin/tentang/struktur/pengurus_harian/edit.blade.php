@extends('admin.layouts.main')

{{-- Untuk styles khusus halaman tertentu --}}
@section('this-page-style')
    <style>
        img {
            width: 90px;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Pengurus Harian</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.pengurus_harian.index') }}">Pengurus
                                    Harian</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Pengurus Harian</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.pengurus_harian.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.pengurus_harian.update', $pengurusHarian->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Pilihan Organisasi -->
                            <div class="form-group">
                                <label for="organisasi_id">Organisasi</label>
                                <select name="organisasi_id" id="organisasi_id" required
                                    class="form-control @error('organisasi_id') is-invalid @enderror">
                                    <option value="" disabled>Pilih Organisasi...</option>
                                    @foreach ($organisasi as $org)
                                        <option value="{{ $org->id }}"
                                            {{ old('organisasi_id', $pengurusHarian->organisasi_id) == $org->id ? 'selected' : '' }}>
                                            {{ $org->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('organisasi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nama Pengurus -->
                            <div class="form-group">
                                <label for="nama">Nama Pengurus</label>
                                <input type="text" name="nama" id="nama" required
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $pengurusHarian->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jabatan -->
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select name="jabatan" id="jabatan" required
                                    class="form-control @error('jabatan') is-invalid @enderror">
                                    <option value="Ketua" {{ $pengurusHarian->jabatan == 'Ketua' ? 'selected' : '' }}>Ketua
                                    </option>
                                    <option value="PJ_Komisariat"
                                        {{ $pengurusHarian->jabatan == 'PJ_Komisariat' ? 'selected' : '' }}>PJ Komisariat
                                    </option>
                                    <option value="Sekretaris"
                                        {{ $pengurusHarian->jabatan == 'Sekretaris' ? 'selected' : '' }}>Sekretaris
                                    </option>
                                    <option value="Bendahara"
                                        {{ $pengurusHarian->jabatan == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                                </select>
                                @error('jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Upload Foto -->
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" id="foto" accept=".jpeg,.png,.jpg"
                                    class="form-control @error('foto') is-invalid @enderror">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                @if (!empty($pengurusHarian->foto))
                                    <div class="mt-2">
                                        <p class="text-muted">Foto saat ini:</p>
                                        <img src="{{ asset('storage/' . $pengurusHarian->foto) }}" alt="Foto Pengurus"
                                            class="w-40 rounded-md border">
                                    </div>
                                @endif
                            </div>

                            <!-- Pilihan Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" required
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="published"
                                        {{ old('status', $pengurusHarian->status) == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="nonaktif"
                                        {{ old('status', $pengurusHarian->status) == 'nonaktif' ? 'selected' : '' }}>
                                        Nonaktif</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Simpan
                                    Perubahan</button>
                                <a href="{{ route('admin.pengurus_harian.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

{{-- Untuk scripts khusus halaman tertentu --}}
@section('this-page-scripts')
@endsection
