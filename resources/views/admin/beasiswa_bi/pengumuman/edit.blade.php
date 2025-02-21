@extends('admin.layouts.main')

{{-- Untuk styles khusus halaman tertentu --}}
@section('this-page-style')
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Pengumuman</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.pengumuman.index') }}">Pengumuman</a></li>
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
                        <h3 class="card-title">Edit Pengumuman</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="judul">Judul Pengumuman</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    id="judul" name="judul" value="{{ old('judul', $pengumuman->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4"
                                    required>{{ old('deskripsi', $pengumuman->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    id="gambar" name="gambar" accept=".jpg,.png,.jpeg">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if (!empty($pengumuman->gambar))
                                    <div class="mt-2">
                                        <p class="text-gray-600 text-sm">Gambar saat ini:</p>
                                        <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="Gambar Pengumuman"
                                            class="rounded-md border" style="height: 80px">
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="file_download">File Download</label>
                                <input type="file" class="form-control @error('file_download') is-invalid @enderror"
                                    id="file_download" name="file_download" accept=".pdf,.doc,.docx,.xlsx,.xls,.ppt,.pptx">
                                @error('file_download')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if (!empty($pengumuman->file_download))
                                    <div class="mt-2">
                                        <p class="text-gray-600 text-sm">File saat ini:</p>
                                        <a href="{{ asset('storage/' . $pengumuman->file_download) }}" target="_blank"
                                            class="text-blue-600 underline">Lihat File</a>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    <option value="published"
                                        {{ old('status', $pengumuman->status) == 'published' ? 'selected' : '' }}>Published
                                    </option>
                                    <option value="nonaktif"
                                        {{ old('status', $pengumuman->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Simpan
                                    Perubahan</button>
                                <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary"><i
                                        class="fas fa-times"></i> Batal</a>
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
