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
                        <h3 class="card-title">Edit Pengurus Divisi</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.pengurus_divisi.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.pengurus_divisi.update', $pengurusDivisi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Pilihan Divisi -->
                            <div class="form-group">
                                <label for="divisi_id">Divisi</label>
                                <select name="divisi_id" id="divisi_id" required
                                    class="form-control @error('divisi_id') is-invalid @enderror">
                                    <option value="" disabled>Pilih Divisi...</option>
                                    @foreach ($divisi as $d)
                                        <option value="{{ $d->id }}"
                                            {{ old('divisi_id', $pengurusDivisi->divisi_id) == $d->id ? 'selected' : '' }}>
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
                                <input type="text" name="nama" id="nama" required
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $pengurusDivisi->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jabatan -->
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select name="jabatan" id="jabatan" required
                                    class="form-control @error('jabatan') is-invalid @enderror">
                                    <option value="CO" {{ $pengurusDivisi->jabatan == 'CO' ? 'selected' : '' }}>CO
                                    </option>
                                    <option value="SekCO" {{ $pengurusDivisi->jabatan == 'SekCO' ? 'selected' : '' }}>
                                        SekCO</option>
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

                                @if (!empty($pengurusDivisi->foto))
                                    <div class="mt-2">
                                        <p class="text-muted">Foto saat ini:</p>
                                        <img src="{{ asset('storage/' . $pengurusDivisi->foto) }}" alt="Foto Pengurus"
                                            class="w-40 rounded-md border">
                                    </div>
                                @endif
                            </div>

                            <!-- Pilihan Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" required
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="" disabled>Pilih Status...</option>
                                    <option value="published"
                                        {{ old('status', $pengurusDivisi->status) == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="nonaktif"
                                        {{ old('status', $pengurusDivisi->status) == 'nonaktif' ? 'selected' : '' }}>
                                        Nonaktif</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Simpan
                                    Perubahan</button>
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

{{-- Untuk scripts khusus halaman tertentu --}}
@section('this-page-scripts')
@endsection
