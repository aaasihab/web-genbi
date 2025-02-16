@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Content Daftar File Download -->
    <section id="daftar-download" class="bg-gray-50 py-12 mt-14">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Data File Download</h2>
                <a href="{{ route('admin.download.create') }}" {{-- <a href="{{ route('admin.download.create') }}" --}}
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                    + Tambah File
                </a>
            </div>

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
                                <td class="p-3 text-center">
                                    @if ($file->file)
                                        @php
                                            $extension = pathinfo($file->file, PATHINFO_EXTENSION);
                                        @endphp

                                        @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                            <img src="{{ asset('storage/' . $file->file) }}"
                                                class="w-24 rounded-md shadow-md" alt="File Download">
                                        @else
                                            <div class="flex items-center justify-center space-x-2">
                                                @if ($extension === 'pdf')
                                                    <i class="fas fa-file-pdf text-red-500 text-xl"></i>
                                                @elseif (in_array($extension, ['doc', 'docx']))
                                                    <i class="fas fa-file-word text-blue-500 text-xl"></i>
                                                @elseif (in_array($extension, ['xls', 'xlsx']))
                                                    <i class="fas fa-file-excel text-green-500 text-xl"></i>
                                                @elseif (in_array($extension, ['ppt', 'pptx']))
                                                    <i class="fas fa-file-powerpoint text-orange-500 text-xl"></i>
                                                @else
                                                    <i class="fas fa-file text-gray-500 text-xl"></i>
                                                @endif
                                                <span class="text-gray-700">{{ $file->nama_file }}</span>
                                            </div>
                                        @endif
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada file</span>
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
                                    <a href="{{ route('home.downloadFile', $file->id) }}"
                                        class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold rounded shadow-md transition">
                                        Download
                                    </a>

                                    <a href="{{ route('admin.download.edit', $file->id) }}"
                                        class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold rounded shadow-md transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.download.destroy', $file->id) }}" method="POST" method="POST"
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
