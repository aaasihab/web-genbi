@extends('layouts.main')

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="relative h-screen flex items-center justify-center text-white -mt-12">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center opacity-50 hidden md:block"
            style="background-image: url('{{ asset('templates/img/visi-misi.jpg') }}');"></div>
        <div class="absolute inset-0 bg-center bg-no-repeat opacity-70 block md:hidden"
            style="background-image: url('../../img/genbi.jpg'); background-size: contain; background-position: 50% 60%;">
        </div>

        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-b to-transparent from-blue-800"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50"></div>

        <!-- Content -->
        <div class="relative z-10 text-center space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold">Data pengumuman</h1>
        </div>
    </section>

    <!-- Content Daftar Pengumuman -->
    <section id="daftar-pengumuman" class="bg-gray-50 py-12 mt-14">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Data Pengumuman</h2>
                <a href="{{ route('pengumuman.create') }}"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                    + Tambah Pengumuman
                </a>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Responsive Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="p-3">No</th>
                            <th class="p-3">Judul</th>
                            <th class="p-3">Deskripsi</th>
                            <th class="p-3">Tanggal Posting</th>
                            <th class="p-3">Terakhir Diubah</th>
                            <th class="p-3">Gambar</th>
                            <th class="p-3">File Download</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($pengumuman as $key => $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="p-3 text-center">{{ $key + 1 }}</td>
                                <td class="p-3">{{ $item->judul }}</td>
                                <td class="p-3">{{ $item->deskripsi }}</td>
                                <td class="p-3 text-center">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </td>
                                <td class="p-3 text-center">
                                    {{ $item->updated_at->diffForHumans() }}
                                </td>
                                <td class="p-3 text-center">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" class="w-24 rounded-md shadow-md"
                                            alt="Gambar Pengumuman">
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="p-3 text-center">
                                    @if ($item->file_download)
                                        <a href="{{ route('pengumuman.downloadFile', $item->file_download) }}"
                                            class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold rounded shadow-md transition">
                                            Download
                                        </a>
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada File</span>
                                    @endif
                                </td>

                                <td class="p-3 text-center">
                                    <span
                                        class="px-2 py-1 rounded-lg text-white text-sm font-semibold {{ $item->status === 'published' ? 'bg-green-500' : 'bg-red-500' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="p-3 text-center">
                                    <a href="{{ route('pengumuman.edit', $item->id) }}"
                                        class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold rounded shadow-md transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST"
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
                                <td colspan="7" class="p-6 text-center text-gray-500">Tidak ada data pengumuman</td>
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
