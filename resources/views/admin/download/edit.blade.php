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
                        <h1 class="m-0">Edit Download</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.download.index') }}">Download</a></li>
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
                        <h3 class="card-title">Edit Download</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.download.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.download.update', $download->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Nama File -->
                            <div class="form-group">
                                <label for="nama_file">Nama File</label>
                                <input type="text" class="form-control @error('nama_file') is-invalid @enderror"
                                    id="nama_file" name="nama_file" value="{{ old('nama_file', $download->nama_file) }}"
                                    required />
                                @error('nama_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- File Upload -->
                            <div class="form-group">
                                <label for="file">File</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror"
                                    id="file" name="file"
                                    accept=".pdf,.doc,.docx,.xlsx,.xls,.ppt,.pptx,.jpg,.png,.jpeg" />
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                @if (!empty($download->file))
                                    <div class="mt-2">
                                        <p class="text-gray-600 text-sm">File saat ini:</p>
                                        @php
                                            $fileExtension = pathinfo($download->file, PATHINFO_EXTENSION);
                                            $imageExtensions = ['jpg', 'jpeg', 'png', 'svg'];
                                        @endphp
                                        @if (in_array(strtolower($fileExtension), $imageExtensions))
                                            <img src="{{ asset('storage/' . $download->file) }}" alt="File Gambar"
                                                class="w-40 rounded-md border">
                                        @else
                                            <a href="{{ asset('storage/' . $download->file) }}" target="_blank"
                                                class="text-blue-600 underline">Lihat File</a>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    <option value="published"
                                        {{ old('status', $download->status) == 'published' ? 'selected' : '' }}>Published
                                    </option>
                                    <option value="nonaktif"
                                        {{ old('status', $download->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group mt-3">
                                <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Simpan
                                    Perubahan</button>
                                <a href="{{ route('admin.download.index') }}" class="btn btn-secondary"><i
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
