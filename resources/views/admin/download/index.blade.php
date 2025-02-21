@extends('admin.layouts.main')

{{-- Untuk styles khusus halaman tertentu --}}
@section('this-page-style')
    <style>
        .table-container {
            overflow-x: auto;
        }

        @media (max-width: 768px) {
            .content-header h1 {
                font-size: 1.3rem;
            }

            .table th,
            .table td {
                font-size: 0.8rem;
                padding: 5px;
            }

            .btn-sm {
                font-size: 0.75rem;
                padding: 4px 6px;
            }

            .img-thumbnail {
                width: 40px !important;
                height: 40px !important;
            }
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
                        <h1 class="m-0">Data Download</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.download.index') }}">
                                    Download
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Download</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.download.create') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus-lg"></i> Tambah File
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="fileTable" class="table table-bordered table-striped mt-3">
                                        <thead>
                                            <tr class="text-center align-middle">
                                                <th>No</th>
                                                <th>Nama File</th>
                                                <th>File</th>
                                                <th>Status</th>
                                                <th>Tanggal Upload</th>
                                                <th>Terakhir Diubah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($files as $key => $file)
                                                <tr>
                                                    <td class="align-middle text-center">{{ $key + 1 }}</td>
                                                    <td class="align-middle">{{ $file->nama_file }}</td>
                                                    <td class="align-middle text-center">
                                                        @php
                                                            $extension = pathinfo($file->file, PATHINFO_EXTENSION);
                                                        @endphp
                                                        @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                            <img src="{{ asset('storage/' . $file->file) }}"
                                                                class="img-thumbnail img-fluid"
                                                                style="max-width: 50px; max-height: 50px; object-fit: cover;">
                                                        @else
                                                            <i class="fas fa-file-alt text-gray-500"></i>
                                                            <span>{{ $file->nama_file }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="badge {{ $file->status === 'published' ? 'bg-success' : 'bg-danger' }}">
                                                            {{ ucfirst($file->status) }}
                                                        </span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        {{ $file->created_at->format('d M Y') }}</td>
                                                    <td class="align-middle text-center">
                                                        {{ $file->updated_at->diffForHumans() }}</td>
                                                    <td class="align-middle text-center">
                                                        <div class="btn-group">
                                                            <a href="{{ route('home.downloadFile', $file->id) }}"
                                                                class="btn btn-sm btn-outline-primary">
                                                                <i class="fas fa-download"></i>
                                                            </a>
                                                            <a href="{{ route('admin.download.edit', $file->id) }}"
                                                                class="btn btn-sm btn-outline-secondary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                                onclick="confirmDelete({{ $file->id }})">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                            <form id="delete-form-{{ $file->id }}"
                                                                action="{{ route('admin.download.destroy', $file->id) }}"
                                                                method="POST" style="display:none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center text-gray-500">Tidak ada data file
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

{{-- Untuk scripts khusus halaman tertentu --}}
@section('this-page-scripts')
    <script>
        $(function() {
            $("#fileTable").DataTable({
                "responsive": false,
                "searching": false,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#fileTable_wrapper .col-md-6:eq(0)');
        });


        function confirmDelete(id) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data ini akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            });
        }

        // Tampilkan SweetAlert untuk pesan sukses
        @if (session('success'))
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        // Tampilkan SweetAlert untuk pesan error
        @if (session('error'))
            Swal.fire({
                title: "Gagal!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "OK",
            });
        @endif
    </script>
@endsection
