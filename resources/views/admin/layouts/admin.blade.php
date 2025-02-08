<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">
    <!-- Sidebar -->
    <div class="w-64 bg-blue-900 min-h-screen p-5 text-white fixed md:relative transition-all duration-300 md:block hidden"
        id="sidebar">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-2xl font-bold">Admin Panel</h2>
            <button class="md:hidden text-white" onclick="toggleSidebar()">✖</button>
        </div>
        <ul>
            {{-- <li class="mb-4"><a href="{{ url('/admin') }}" class="block py-2 px-3 rounded hover:bg-blue-700">Beranda</a></li> --}}
            <li class="mb-4"><a href="{{ url('/admin/kegiatan') }}"
                    class="block py-2 px-3 rounded hover:bg-blue-700">Manajemen Kegiatan</a></li>
            <li class="mb-4">
                <button class="w-full text-left py-2 px-3 rounded hover:bg-blue-700"
                    onclick="toggleDropdown('biDropdown')">Beasiswa BI ▾</button>
                <ul id="biDropdown" class="hidden ml-4">
                    {{-- <li class="mb-2"><a href="{{ url('/admin/tentang_bi') }}" class="block py-2 px-3 rounded hover:bg-blue-600">Tentang BI</a></li> --}}
                    {{-- <li class="mb-2"><a href="{{ url('/admin/persyaratan') }}" class="block py-2 px-3 rounded hover:bg-blue-600">Persyaratan</a></li> --}}
                    <li class="mb-2"><a href="{{ url('/admin/pengumuman') }}"
                            class="block py-2 px-3 rounded hover:bg-blue-600">Pengumuman</a></li>
                </ul>
            </li>
            <li class="mb-4">
                <button class="w-full text-left py-2 px-3 rounded hover:bg-blue-700"
                    onclick="toggleDropdown('orgDropdown')">Organisasi ▾</button>
                <ul id="orgDropdown" class="hidden ml-4">
                    {{-- <li class="mb-2"><a href="{{ url('/admin/tentang_bi') }}" class="block py-2 px-3 rounded hover:bg-blue-600">Tentang BI</a></li> --}}
                    {{-- <li class="mb-2"><a href="{{ url('/admin/persyaratan') }}" class="block py-2 px-3 rounded hover:bg-blue-600">Persyaratan</a></li> --}}
                    <li class="mb-2"><a href="{{ url('/admin/pengurus_harian') }}"
                            class="block py-2 px-3 rounded hover:bg-blue-600">Pengurus Harian</a></li>
                    <li class="mb-2"><a href="{{ url('/admin/pengurus_divisi') }}"
                            class="block py-2 px-3 rounded hover:bg-blue-600">Pengurus Divisi</a></li>
                    <li class="mb-2"><a href="{{ url('/admin/anggota') }}"
                            class="block py-2 px-3 rounded hover:bg-blue-600">Anggota</a></li>
                </ul>
            </li>
            <li class="mb-2"><a href="{{ url('/admin/genbi_point') }}"
                    class="block py-2 px-3 rounded hover:bg-blue-600">Manajemen GenBI Point</a></li>
            {{-- <li class="mb-2"><a href="{{ url('/admin/tentang_genbi') }}" class="block py-2 px-3 rounded hover:bg-blue-600">Tentang GenBI</a></li> --}}
            <li class="mb-4"><a href="{{ url('/admin/download') }}"
                    class="block py-2 px-3 rounded hover:bg-blue-700">Manajemen Download</a></li>
            <li class="mb-4"><a href="{{ route('admin.logout') }}"
                    class="block py-2 px-3 rounded hover:bg-blue-700">Logout</a></li>
            <li class="mb-4"><a href="{{ route('beranda') }}" class="block py-2 px-3 rounded hover:bg-blue-700">menuju
                    beranda</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 md:ml-5 p-5 transition-all duration-300" id="content">
        <button class="md:hidden bg-blue-900 text-white px-3 py-2 rounded mb-5" onclick="toggleSidebar()">☰</button>

        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        }

        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('hidden');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('this-page-scripts')
</body>

</html>
