@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Content Daftar Pengumuman -->
    <section id="daftar-pengumuman" class="mt-5">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-800">Data Pengumuman</h2>
                <a href="{{ route('admin.pengumuman.create') }}"
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
                <table class="w-full border border-white bg-white text-left text-gray-700">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="p-3 w-12">No</th>
                            <th class="p-3 w-40">Judul</th>
                            <th class="p-3 w-56 hidden md:table-cell">Deskripsi</th>
                            <th class="p-3 w-32">Tanggal Posting</th>
                            <th class="p-3 w-32 hidden md:table-cell">Terakhir Diubah</th>
                            <th class="p-3 w-32">Gambar</th>
                            <th class="p-3 w-40 hidden md:table-cell">File Download</th>
                            <th class="p-3 w-28">Status</th>
                            <th class="p-3 w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($pengumuman as $key => $item)
                            <tr class="border-b border-white hover:bg-gray-100">
                                <td class="p-3 text-center">{{ $key + 1 }}</td>
                                <td class="p-3 font-semibold">{{ $item->judul }}</td>
                                <td class="p-3 hidden md:table-cell truncate max-w-xs">{{ $item->deskripsi }}</td>
                                <td class="p-3 text-center">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                                <td class="p-3 text-center hidden md:table-cell">{{ $item->updated_at->diffForHumans() }}</td>
                                <td class="p-3 text-center">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" class="w-16 md:w-24 rounded-md shadow-md" alt="Gambar Pengumuman">
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="p-3 text-center hidden md:table-cell">
                                    @if ($item->file_download)
                                        <a href="{{ asset('storage/' . $item->file_download) }}" target="_blank" class="text-blue-600 hover:underline">
                                            Download File
                                        </a>
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada file</span>
                                    @endif
                                </td>
                                <td class="p-3 text-center">
                                    <span class="px-2 py-1 rounded-lg text-white text-sm font-semibold {{ $item->status === 'published' ? 'bg-green-500' : 'bg-red-500' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="p-3 text-center">
                                    <div class="flex flex-wrap justify-center gap-2">
                                        <a href="{{ route('home.downloadFile', $item->id) }}"
                                            class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold rounded shadow-md transition">
                                            Download
                                        </a>
                                        <a href="{{ route('admin.pengumuman.edit', $item->id) }}"
                                            class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold rounded shadow-md transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" method="POST"
                                            class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded shadow-md transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="p-6 text-center text-gray-500">Tidak ada data pengumuman</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection