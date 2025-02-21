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
                        <h3 class="card-title">Tambah Pengurus Divisi</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.pengurus_divisi.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.pengurus_divisi.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Pilihan Divisi -->
                            <div class="form-group">
                                <label for="divisi_id">Divisi</label>
                                <select name="divisi_id" id="divisi_id"
                                    class="form-control @error('divisi_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Divisi...</option>
                                    @foreach ($divisi as $d)
                                        <option value="{{ $d->id }}"
                                            {{ old('divisi_id') == $d->id ? 'selected' : '' }}>
                                            {{ $d->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('divisi_id')
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
                                    <option value="CO">Koordinator</option>
                                    <option value="SekCO">Sekretaris Koordinator</option>
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
                                    <option value="" disabled selected>Pilih Status...</option>
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
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                                <a href="{{ route('admin.pengurus_divisi.index') }}" class="btn btn-secondary">
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
