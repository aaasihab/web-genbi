@extends('layouts.main')

@section('this-page-style')
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="relative h-screen flex items-center justify-center text-white -mt-12">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center opacity-50 hidden md:block"
            style="background-image: url('{{ asset('templates/img/download-banner.jpg') }}');"></div>
        <div class="absolute inset-0 bg-center bg-no-repeat opacity-70 block md:hidden"
            style="background-image: url('../../img/genbi.jpg'); background-size: contain; background-position: 50% 60%;">
        </div>

        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-b to-transparent from-blue-800"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50"></div>

        <!-- Content -->
        <div class="relative z-10 text-center space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold">Daftar Download</h1>
        </div>
    </section>

    <!-- Content Daftar File Download -->
    <section id="daftar-download" class="bg-gray-50 py-12 mt-14">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Data File Download</h2>
                <a href="{{ route('download.create') }}" {{-- <a href="{{ route('download.create') }}" --}}
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                    + Tambah File
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
                            <th class="p-3">Nama File</th>
                            <th class="p-3">File</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Tanggal Upload</th>
                            <th class="p-3">Terakhir Diubah</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($files as $key => $file)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="p-3 text-center">{{ $key + 1 }}</td>
                                <td class="p-3">{{ $file->nama_file }}</td>
                                <td class="p-3">
                                    @if ($file->file)
                                        <img src="{{ asset('storage/' . $file->file) }}" class="w-24 rounded-md shadow-md"
                                            alt="file download">
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="p-3 text-center">
                                    <span
                                        class="px-2 py-1 rounded-lg text-white text-sm font-semibold {{ $file->status === 'published' ? 'bg-green-500' : 'bg-red-500' }}">
                                        {{ ucfirst($file->status) }}
                                    </span>
                                </td>
                                <td class="p-3 text-center">
                                    {{ $file->created_at->format('d M Y') }}
                                </td>
                                <td class="p-3 text-center">
                                    {{ $file->updated_at->diffForHumans() }}
                                </td>
                                <td class="p-3 text-center">
                                    <a href="{{ route('download.downloadFile', $file->id) }}"
                                        class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold rounded shadow-md transition">
                                        Download
                                    </a>

                                    <a href="{{ route('download.edit', $file->id) }}"
                                        class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold rounded shadow-md transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('download.destroy', $file->id) }}" method="POST" method="POST"
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
                                <td colspan="6" class="p-6 text-center text-gray-500">Tidak ada data file</td>
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
