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
                        <h1 class="m-0">Data Pengurus Divisi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">
                                <a href="{{ route('admin.pengurus_divisi.index') }}">
                                    Pengurus Divisi
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
                        <h3 class="card-title">Data Pengurus Divisi</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.pengurus_divisi.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah Pengurus
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-container">
                            <table id="pengurusDivisiTable" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <th>Jabatan</th>
                                        <th>Divisi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pengurusDivisi as $pengurus)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pengurus->nama }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $pengurus->foto) }}" alt="Foto"
                                                    class="w-16 h-16 rounded-md object-cover" style="width:30px;">
                                            </td>
                                            <td>{{ $pengurus->jabatan }}</td>
                                            <td>{{ $pengurus->divisi->nama }}</td>
                                            <td class="text-center">
                                                <span
                                                    class="badge {{ $pengurus->status == 'published' ? 'bg-success' : 'bg-danger' }}">
                                                    {{ ucfirst($pengurus->status) }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.pengurus_divisi.edit', $pengurus->id) }}"
                                                        class="btn btn-sm btn-outline-secondary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                        onclick="confirmDelete({{ $pengurus->id }})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $pengurus->id }}"
                                                        action="{{ route('admin.pengurus_divisi.destroy', $pengurus->id) }}"
                                                        method="POST" style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">Tidak ada data pengurus divisi
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
            $("#pengurusDivisiTable").DataTable({
                "responsive": false,
                "searching": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#pengurusDivisiTable_table_wrapper .col-md-6:eq(0)');
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
