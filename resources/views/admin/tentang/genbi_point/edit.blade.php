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
                        <h1 class="m-0">Edit GenBI Point</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.genbi_point.index') }}">GenBI Point</a></li>
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
                        <h3 class="card-title">Edit Data Genbi Point</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.genbi_point.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.genbi_point.update', $genbiPoint->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Bulan -->
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select name="bulan" id="bulan"
                                    class="form-control @error('bulan') is-invalid @enderror" required>
                                    <option value="" disabled>Pilih Bulan</option>
                                    @foreach ($availableMonths as $month)
                                        <option value="{{ $month }}"
                                            {{ old('bulan', $genbiPoint->bulan) == $month ? 'selected' : '' }}>
                                            {{ $month }}</option>
                                    @endforeach
                                </select>
                                @error('bulan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Link Drive -->
                            <div class="form-group">
                                <label for="link_drive">Link Drive</label>
                                <input type="url" class="form-control @error('link_drive') is-invalid @enderror"
                                    id="link_drive" name="link_drive"
                                    value="{{ old('link_drive', $genbiPoint->link_drive) }}" required />
                                @error('link_drive')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    <option value="published"
                                        {{ old('status', $genbiPoint->status) == 'published' ? 'selected' : '' }}>Published
                                    </option>
                                    <option value="nonaktif"
                                        {{ old('status', $genbiPoint->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif
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
                                <a href="{{ route('admin.genbi_point.index') }}" class="btn btn-secondary"><i
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
