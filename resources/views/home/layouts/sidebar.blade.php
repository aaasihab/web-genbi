<!-- Sidebar Admin -->
<aside id="admin-sidebar" class="fixed left-0 top-0 h-full w-64 bg-gray-800 text-white shadow-lg transition-transform -translate-x-full md:translate-x-0">
    <div class="p-4 text-center text-2xl font-bold bg-gray-900">
        <a href="{{ route('admin.beranda.index') }}" class="text-white">Admin Panel</a>
    </div>

    <nav class="mt-4">
        <a href="{{ route('admin.beranda.index') }}" class="block py-3 px-6 hover:bg-gray-700">Beranda</a>
        <a href="{{ route('admin.kegiatan.index') }}" class="block py-3 px-6 hover:bg-gray-700">Kegiatan</a>
        
        <!-- Beasiswa Dropdown -->
        <div class="group">
            <button class="w-full text-left py-3 px-6 flex justify-between items-center hover:bg-gray-700">
                Beasiswa BI <i class="fas fa-angle-down"></i>
            </button>
            <div class="hidden group-hover:block bg-gray-700">
                <a href="{{ route('admin.tentang_bi.index') }}" class="block py-2 px-8 hover:bg-gray-600">Tentang BI</a>
                <a href="{{ route('admin.persyaratan.index') }}" class="block py-2 px-8 hover:bg-gray-600">Persyaratan</a>
                <a href="{{ route('admin.pengumuman.index') }}" class="block py-2 px-8 hover:bg-gray-600">Pengumuman</a>
            </div>
        </div>
        
        <!-- Tentang Dropdown -->
        <div class="group">
            <button class="w-full text-left py-3 px-6 flex justify-between items-center hover:bg-gray-700">
                Tentang <i class="fas fa-angle-down"></i>
            </button>
            <div class="hidden group-hover:block bg-gray-700">
                <a href="{{ route('admin.genbi_point.index') }}" class="block py-2 px-8 hover:bg-gray-600">GenBI Point</a>
                <a href="{{ route('admin.tentang_genbi.index') }}" class="block py-2 px-8 hover:bg-gray-600">Tentang GenBI</a>
                <a href="{{ route('admin.struktur_organisasi.index') }}" class="block py-2 px-8 hover:bg-gray-600">Struktur Organisasi</a>
            </div>
        </div>
        
        <a href="{{ route('admin.download') }}" class="block py-3 px-6 hover:bg-gray-700">Download</a>
    </nav>
</aside>

<!-- Toggle Button for Mobile -->
<button id="sidebar-toggle" class="fixed top-4 left-4 z-50 md:hidden bg-gray-800 text-white p-2 rounded-md">
    <i class="fas fa-bars"></i>
</button>

<script>
    document.getElementById('sidebar-toggle').addEventListener('click', function () {
        document.getElementById('admin-sidebar').classList.toggle('-translate-x-full');
    });
</script>
