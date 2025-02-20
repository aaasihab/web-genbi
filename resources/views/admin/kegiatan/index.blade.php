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
                font-size: 0.9rem;
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
                        <h1 class="m-0">Daftar Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ route('admin.kegiatan.index') }}">Kegiatan</a></li>
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
                                <h3 class="card-title">Daftar Kegiatan</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.kegiatan.create') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-cart-plus"></i> Tambah Kegiatan
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-reponsive table-container">
                                    <table id="kegiatan-table" class="table table-bordered table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">No</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Tanggal Kegiatan</th>
                                                <th>Terakhir Diubah</th>
                                                <th>Status</th>
                                                <th>Gambar</th>
                                                <th style="width: 15%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($kegiatan as $key => $item)
                                                <tr>
                                                    <td class="align-middle">{{ $key + 1 }}</td>
                                                    <td class="align-middle">{{ $item->nama }}</td>
                                                    <td class="align-middle">{{ Str::limit($item->deskripsi, 50, '...') }}</td>
                                                    <td class="align-middle">
                                                        {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->updated_at->diffForHumans() }}</td>
                                                    <td class="text-center align-middle">
                                                        <!-- Menampilkan gambar -->
                                                        @if ($item->gambar)
                                                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                                                alt="{{ $item->nama }}" class="img-thumbnail img-fluid"
                                                                style="max-width: 50px; max-height: 50px; object-fit: cover;">
                                                        @else
                                                            <span class="text-muted">Tidak ada gambar</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        <span
                                                            class="badge {{ $item->status == 'published' ? 'bg-success' : 'bg-danger' }}">
                                                            {{ ucfirst($item->status) }}
                                                        </span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="btn-group">
                                                            <a href="{{ route('admin.kegiatan.edit', $item->id) }}"
                                                                class="btn btn-sm btn-outline-secondary">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>
                                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                                onclick="confirmDelete({{ $item->id }})">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </button>
                                                            <form id="delete-form-{{ $item->id }}"
                                                                action="{{ route('admin.kegiatan.destroy', $item->id) }}"
                                                                method="POST" style="display:none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
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
            $("#kegiatan-table").DataTable({
                "responsive": false,
                "searching": false,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#kegiatan-table_wrapper .col-md-6:eq(0)');
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
