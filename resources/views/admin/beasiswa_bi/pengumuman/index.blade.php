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
                        <h1 class="m-0">Data Pengumuman</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.pengumuman.index') }}">
                                    Pengumuman
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
                                <h3 class="card-title">Data Pengumuman</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus-lg"></i> Tambah Pengumuman
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="bulkDeleteForm" action="{{ route('admin.pengumuman.bulkDelete') }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm mt-2" id="deleteSelected">
                                        <i class="fas fa-trash"></i> Hapus Terpilih
                                    </button>

                                    <div class="table-responsive">
                                        <table id="pengumumanTable" class="table table-bordered table-striped mt-3">
                                            <thead>
                                                <tr class="text-center align-middle">
                                                    <th><input type="checkbox" id="selectAll"></th>
                                                    <th>No</th>
                                                    <th>Judul</th>
                                                    <th>Deskripsi</th>
                                                    <th>Terakhir Diubah</th>
                                                    <th>Gambar</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($pengumuman as $key => $item)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            <input type="checkbox" name="ids[]"
                                                                value="{{ $item->id }}">
                                                        </td>
                                                        <td class="align-middle text-center">{{ $key + 1 }}</td>
                                                        <td class="align-middle">{{ $item->judul }}</td>
                                                        <td class="align-middle text-truncate" style="max-width: 150px;">
                                                            {{ $item->deskripsi }}</td>
                                                        <td class="align-middle text-center">
                                                            {{ $item->updated_at->diffForHumans() }}</td>
                                                        <td class="align-middle text-center">
                                                            @if ($item->gambar)
                                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                                    class="img-thumbnail img-fluid"
                                                                    style="max-width: 50px; max-height: 50px; object-fit: cover;">
                                                            @else
                                                                <span class="text-gray-500 italic">Tidak ada gambar</span>
                                                            @endif
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span
                                                                class="badge {{ $item->status === 'published' ? 'bg-success' : 'bg-danger' }}">
                                                                {{ ucfirst($item->status) }}
                                                            </span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <div class="btn-group">
                                                                <a href="{{ route('home.downloadFile', $item->id) }}"
                                                                    class="btn btn-sm btn-outline-primary">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                                <a href="{{ route('admin.pengumuman.edit', $item->id) }}"
                                                                    class="btn btn-sm btn-outline-secondary">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                                    onclick="confirmDelete({{ $item->id }})">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                                <form id="delete-form-{{ $item->id }}"
                                                                    action="{{ route('admin.pengumuman.destroy', $item->id) }}"
                                                                    method="POST" style="display:none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="text-center text-gray-500">Tidak ada data
                                                            pengumuman</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
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
            $("#kegiatan-table").DataTable({
                "responsive": false,
                "searching": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#kegiatan-table_wrapper .col-md-6:eq(0)');
        });

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
