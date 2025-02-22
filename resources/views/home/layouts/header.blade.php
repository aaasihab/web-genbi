<!-- Navbar -->
<header id="navbar" class="fixed top-0 w-full z-50 bg-transparent text-white md:pt-3">
    <div class="container mx-auto flex items-center justify-between p-4">
        <!-- Logo -->
        <div class="text-2xl font-bold">
            <a id="navbar-logo" href="{{ route('beranda') }}" class="text-white">GenBI UNUJA</a>
        </div>

        <!-- Navigation Links -->
        <nav class="hidden md:flex space-x-8 text-lg">
            <a href="{{ route('beranda') }}" class="hover:text-blue-500">Beranda</a>
            <a href="{{ route('home.kegiatan') }}" class="hover:text-blue-500">Kegiatan</a>

            <!-- Beasiswa BI Dropdown -->
            <div class="dropdown relative">
                <a href="{{ route('home.tentangBi') }}" class="hover:text-blue-500 flex items-center">
                    Beasiswa BI <i class="fas fa-angle-down ml-2"></i>
                </a>
                <div class="dropdown-card-dekstop">
                    <a href="{{ route('home.tentangBi') }}"><i class="fas fa-info-circle"></i>Tentang BI</a>
                    <a href="{{ route('home.persyaratan') }}"><i class="fas fa-file-alt"></i>Persyaratan</a>
                    <a href="{{ route('home.pengumuman') }}"><i class="fas fa-bullhorn"></i>Pengumuman</a>
                </div>
            </div>

            <!-- Tentang Dropdown -->
            <div class="dropdown relative">
                <a href="{{ route('home.tentangGenbi') }}" class="hover:text-blue-500 flex items-center">
                    Tentang <i class="fas fa-angle-down ml-2"></i>
                </a>
                <div class="dropdown-card-dekstop">
                    <a href="{{ route('home.genbi_point') }}"><i class="fas fa-star"></i>GenBI Point</a>
                    <a href="{{ route('home.tentangGenbi') }}"><i class="fas fa-users"></i>Tentang GenBI</a>
                    <a href="{{ route('home.strukturOrganisasi') }}"><i class="fas fa-sitemap"></i>Struktur
                        Organisasi</a>
                </div>
            </div>

            <a href="{{ route('home.download') }}" class="hover:text-blue-500">Download</a>
            @auth
                <div class="hidden md:block">
                    <a href="{{ route('admin.kegiatan.index') }}"
                        class="bg-blue-500 text-white text-sm px-4 py-3 rounded-lg shadow hover:bg-blue-600 transition-all">
                        <i class="fas fa-sign-in-alt text-gray-100"></i> Admin Panel
                    </a>
                </div>
            @endauth
        </nav>

        <!-- Mobile Menu Button -->
        <button id="menu-toggle" class="md:hidden toggle-icon focus:outline-none">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <!-- Mobile Menu -->
    <nav id="mobile-menu"
        class="hidden bg-white shadow-md p-4 absolute top-19 right-5 w-[250px] z-50 text-gray-800 flex-col rounded-md">
        <div class="menu-items flex flex-col">
            <!-- Menu Item -->
            <a href="{{ route('beranda') }}" class="py-2 hover:text-blue-500">Beranda</a>
            <a href="{{ route('home.kegiatan') }}" class="py-2 hover:text-blue-500">Kegiatan</a>

            <!-- Beasiswa Dropdown -->
            <div class="dropdown relative">
                <button class="py-2 flex items-center justify-between w-full hover:bg-gray-100">
                    Beasiswa BI <i class="fas fa-angle-down"></i>
                </button>
                <div class="dropdown-card-mobile hidden flex-col">
                    <a href="{{ route('home.tentangBi') }}" class="py-2 px-6 hover:bg-gray-100">Tentang BI</a>
                    <a href="{{ route('home.persyaratan') }}" class="py-2 px-6 hover:bg-gray-100">Persyaratan</a>
                    <a href="{{ route('home.pengumuman') }}" class="py-2 px-6 hover:bg-gray-100">Pengumuman</a>
                </div>
            </div>

            <!-- Tentang Dropdown -->
            <div class="dropdown relative">
                <button class="py-2 flex items-center justify-between w-full hover:bg-gray-100">
                    Tentang <i class="fas fa-angle-down"></i>
                </button>
                <div class="dropdown-card-mobile hidden flex-col">
                    <a href="{{ route('home.genbi_point') }}" class="py-2 px-6 hover:bg-gray-100">GenBI Point</a>
                    <a href="{{ route('home.tentangGenbi') }}" class="py-2 px-6 hover:bg-gray-100">Tentang GenBI</a>
                    <a href="{{ route('home.strukturOrganisasi') }}" class="py-2 px-6 hover:bg-gray-100">Struktur
                        Organisasi</a>
                </div>
            </div>

            <a href="{{ route('home.download') }}" class="py-2 pb-5 hover:text-blue-500">Download</a>
            @auth
                <a href="{{ route('admin.kegiatan.index') }}"
                    class="py-2 bg-blue-500 text-sm text-white rounded-lg shadow text-center hover:bg-blue-600">
                    <i class="fas fa-sign-in-alt text-gray-100"></i> Admin Panel
                </a>
            @endauth
        </div>
    </nav>

</header>
{{-- tambahan icon hubungi --}}
<div class="fixed bottom-5 right-5 z-50 group">
    <a href="https://wa.me/6285234662736?text=Halo%20saya%20ingin%20bertanya%20tentang%20..." target="_blank"
        class="relative block">
        <div
            class="bg-green-500 text-white w-16 h-16 flex items-center justify-center rounded-full shadow-xl hover:bg-green-600 transition duration-300 hover:scale-110 hover:shadow-2xl animate-pulse">
            <i class="fab fa-whatsapp text-4xl"></i>
        </div>
        <!-- Tooltip -->
        <span
            class="absolute right-20 top-1/2 transform -translate-y-1/2 bg-gray-900 text-white text-sm px-3 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
            Hubungi Kami di WhatsApp
        </span>
    </a>
</div>
