@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Daftar Pengurus Divisi -->
    <section id="index-pengurus-divisi" class="relative bg-gray-50 py-12 mt-14">
        <div class="container mx-auto max-w-5xl bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Daftar Pengurus Divisi</h2>

            <!-- Alert Notifikasi -->
            @if (session('success'))
                <div class="mb-4 text-green-700 bg-green-200 p-3 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tombol Tambah Pengurus -->
            <div class="mb-4 text-right">
                <a href="{{ route('admin.pengurus_divisi.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                    Tambah Pengurus
                </a>
            </div>

            <!-- Tabel Data Pengurus Divisi -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">Foto</th>
                            <th class="border border-gray-300 px-4 py-2">Nama</th>
                            <th class="border border-gray-300 px-4 py-2">Jabatan</th>
                            <th class="border border-gray-300 px-4 py-2">Divisi</th>
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                            <th class="border border-gray-300 px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengurusDivisi as $pengurus)
                            <tr class="text-center">
                                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <img src="{{ asset('storage/' . $pengurus->foto) }}" alt="Foto"
                                        class="w-16 h-16 rounded-md object-cover">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">{{ $pengurus->nama }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $pengurus->jabatan }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $pengurus->divisi->nama }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span
                                        class="px-2 py-1 text-white rounded-md 
                                    {{ $pengurus->status == 'published' ? 'bg-green-500' : 'bg-gray-500' }}">
                                        {{ ucfirst($pengurus->status) }}
                                    </span>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('admin.pengurus_divisi.edit', $pengurus->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded-md">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.pengurus_divisi.destroy', $pengurus->id) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Yakin ingin menghapus pengurus ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-md">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                    Tidak ada data pengurus divisi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('this-page-scripts')
    <script>
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
