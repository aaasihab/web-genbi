@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
 <!-- Content Daftar Kegiatan -->
    <section id="daftar-kegiatan" class="bg-gray-50 py-12 mt-14">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Data Kegiatan</h2>
                <a href="{{ route('admin.kegiatan.create') }}"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                    + Tambah Kegiatan
                </a>
            </div>

            <!-- Responsive Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="p-3">No</th>
                            <th class="p-3">Nama</th>
                            <th class="p-3">Deskripsi</th>
                            <th class="p-3">Tanggal Kegiatan</th>
                            <th class="p-3">Tanggal Posting</th>
                            <th class="p-3">Terakhir Diubah</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Gambar</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($kegiatan as $key => $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="p-3 text-center">{{ $key + 1 }}</td>
                                <td class="p-3">{{ $item->nama }}</td>
                                <td class="p-3">{{ Str::limit($item->deskripsi, 50, '...') }}</td>
                                <td class="p-3 text-center">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </td>
                                <td class="p-3 text-center">
                                    {{ $item->created_at->format('d M Y') }}
                                </td>
                                <td>
                                    {{ $item->updated_at->diffForHumans() }}
                                </td>
                                <td class="p-3 text-center">
                                    <span
                                        class="px-2 py-1 rounded-lg text-white text-sm font-semibold {{ $item->status === 'published' ? 'bg-green-500' : 'bg-red-500' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="p-3 text-center">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" class="w-24 rounded-md shadow-md"
                                            alt="Gambar Kegiatan">
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="p-3 text-center">
                                    <a href="{{ route('admin.kegiatan.edit', $item->id) }}"
                                        class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold rounded shadow-md transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.kegiatan.destroy', $item->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded shadow-md transition">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="p-6 text-center text-gray-500">Tidak ada data kegiatan</td>
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
