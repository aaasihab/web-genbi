@extends('layouts.main')

@section('this-page-style')
@endsection

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
            <h1 class="text-4xl md:text-5xl font-bold">Data Anggota</h1>
        </div>
    </section>

    <!-- Daftar Anggota -->
    <section id="index-anggota" class="relative bg-gray-50 py-12 mt-14">
        <div class="container mx-auto max-w-5xl bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Daftar Anggota</h2>

            <!-- Alert Notifikasi -->
            @if (session('success'))
                <div class="mb-4 text-green-700 bg-green-200 p-3 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tombol Tambah Anggota -->
            <div class="mb-4 text-right">
                <a href="{{ route('anggota.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                    Tambah Anggota
                </a>
            </div>

            <!-- Tabel Data Anggota -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">Foto</th>
                            <th class="border border-gray-300 px-4 py-2">Nama</th>
                            <th class="border border-gray-300 px-4 py-2">Divisi</th>
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                            <th class="border border-gray-300 px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggota as $key => $member)
                            <tr class="text-center">
                                <td class="border border-gray-300 px-4 py-2">{{ $key + 1 }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    @if ($member->foto)
                                        <img src="{{ asset('storage/' . $member->foto) }}" alt="Foto"
                                            class="w-16 h-16 rounded-md object-cover">
                                    @else
                                        <span class="text-gray-500">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td class="border border-gray-300 px-4 py-2">{{ $member->nama }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $member->divisi->nama }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span
                                        class="px-2 py-1 text-white rounded-md 
                                    {{ $member->status == 'published' ? 'bg-green-500' : 'bg-gray-500' }}">
                                        {{ ucfirst($member->status) }}
                                    </span>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('anggota.edit', $member->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded-md">
                                        Edit
                                    </a>
                                    <form action="{{ route('anggota.destroy', $member->id) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Yakin ingin menghapus anggota ini?');">
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
                                <td colspan="6" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                    Tidak ada data anggota.
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
