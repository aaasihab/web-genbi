@extends('admin.layouts.main')

{{-- Styles khusus halaman --}}
@section('this-page-style')
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Pengurus Divisi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.pengurus_divisi.index') }}">Pengurus
                                    Divisi</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
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
                        <h3 class="card-title">Tambah Pengurus Harian</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.pengurus_harian.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.pengurus_harian.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Pilihan Organisasi -->
                            <div class="form-group">
                                <label for="organisasi_id">Organisasi</label>
                                <select name="organisasi_id" id="organisasi_id"
                                    class="form-control @error('organisasi_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Organisasi...</option>
                                    @foreach ($organisasi as $org)
                                        <option value="{{ $org->id }}"
                                            {{ old('organisasi_id') == $org->id ? 'selected' : '' }}>
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
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                                    required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jabatan -->
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select name="jabatan" id="jabatan"
                                    class="form-control @error('jabatan') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Jabatan...</option>
                                    <option value="Ketua">Ketua</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="PJ_Komisariat">PJ Komisariat</option>
                                </select>
                                @error('jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Upload Foto -->
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" id="foto" accept=".jpeg,.png,.jpg"
                                    class="form-control @error('foto') is-invalid @enderror" required>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Pilihan Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Tambah Pengurus
                                </button>
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

{{-- Scripts khusus halaman --}}
@section('this-page-scripts')
@endsection
