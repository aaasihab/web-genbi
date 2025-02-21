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
                        <h1 class="m-0">Tambah Anggota</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.anggota.index') }}">Anggota</a></li>
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
                        <h3 class="card-title">Tambah Anggota</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.anggota.store') }}" method="POST" enctype="multipart/form-data">
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

                            <!-- Nama Anggota -->
                            <div class="form-group">
                                <label for="nama">Nama Anggota</label>
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                                    required>
                                @error('nama')
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

                            <!-- Submit Button -->
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Tambah
                                    Anggota</button>
                                <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary"><i
                                        class="fas fa-times"></i> Batal</a>
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
