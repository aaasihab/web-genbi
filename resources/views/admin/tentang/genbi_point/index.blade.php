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
                        <h1 class="m-0">Data GenBI Point</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.genbi_point.index') }}">
                                    GenBI Point
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Genbi Point</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.genbi_point.create') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-lg"></i> Tambah Genbi Point
                            </a>

                        </div>
                    </div>
                    <div class="card-body">
                        <form id="bulkDeleteForm" action="{{ route('admin.genbi_point.bulkDelete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mt-2">
                                <i class="fas fa-trash"></i> Hapus Terpilih
                            </button>
                            <div class="table-responsive table-container">
                                <table id="genbiPoint_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th><input type="checkbox" id="selectAll"></th>
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Link Drive</th>
                                            <th>Terakhir Diubah</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($genbiPoints as $key => $genbiPoint)
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" name="ids[]" value="{{ $genbiPoint->id }}">
                                                </td>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td>{{ $genbiPoint->bulan }}</td>
                                                <td>
                                                    <a href="{{ $genbiPoint->link_drive }}" target="_blank"
                                                        class="text-primary">
                                                        {{ Str::limit($genbiPoint->link_drive, 30) }}
                                                    </a>
                                                </td>
                                                <td class="text-center">{{ $genbiPoint->updated_at->diffForHumans() }}</td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge {{ $genbiPoint->status == 'published' ? 'bg-success' : 'bg-danger' }}">
                                                        {{ ucfirst($genbiPoint->status) }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.genbi_point.edit', $genbiPoint->id) }}"
                                                            class="btn btn-sm btn-outline-secondary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            onclick="confirmDelete({{ $genbiPoint->id }})">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $genbiPoint->id }}"
                                                            action="{{ route('admin.genbi_point.destroy', $genbiPoint->id) }}"
                                                            method="POST" style="display:none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada data Genbi Point</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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
    <script>
        $(function() {
            $("#genbiPoint_table").DataTable({
                "responsive": false,
                "searching": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#genbiPoint_table_wrapper .col-md-6:eq(0)');
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
