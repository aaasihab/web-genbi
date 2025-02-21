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
                        <h1 class="m-0">Edit Divisi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.divisi.index') }}">Divisi</a></li>
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
                        <h3 class="card-title">Edit Divisi</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.divisi.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.divisi.update', $divisi->id) }}" method="POST">
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
                                            {{ old('organisasi_id', $divisi->organisasi_id) == $org->id ? 'selected' : '' }}>
                                            {{ $org->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('organisasi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nama Divisi -->
                            <div class="form-group">
                                <label for="nama">Nama Divisi</label>
                                <input type="text" name="nama" id="nama" required
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $divisi->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Simpan
                                    Perubahan</button>
                                <a href="{{ route('admin.divisi.index') }}" class="btn btn-secondary"><i
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
