<aside class="main-sidebar sidebar-dark-lightblue elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.kegiatan.index') }}" class="brand-link">
        <img src="{{ asset('templates/img/genbi.png') }}" alt="profil" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">GenBI Unuja Official</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column gap-1" data-widget="treeview" role="menu"
                data-accordion="false">

                <!-- Data Master Section -->
                <li class="nav-header user-panel">DATA MASTER</li>

                <!-- kegiatan -->
                <li class="nav-item">
                    <a href="{{ route('admin.kegiatan.index') }}"
                        class="nav-link {{ request()->routeIs('admin.kegiatan.index') ? 'active' : '' }}"
                        onclick="{{ auth()->check() ? '' : 'return confirmLogin(event);' }}">
                        <i class="bi bi-cart4 nav-icon"></i>
                        <p>Kegiatan</p>
                    </a>
                </li>

                {{-- Beasiswa BI --}}
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Beasiswa BI
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.pengumuman.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <i class="bi bi-cart4 nav-icon"></i>
                                <p>Pengumuman</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Struktur Organisasi --}}
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Organisasi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <i class="bi bi-cart4 nav-icon"></i>
                                <p>Pengurus Harian</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route("admin.divisi.index") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <i class="bi bi-cart4 nav-icon"></i>
                                <p>Divisi</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="../UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <i class="bi bi-cart4 nav-icon"></i>
                                <p>Pengurus Divisi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route("admin.anggota.index") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <i class="bi bi-cart4 nav-icon"></i>
                                <p>Anggota</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- GenBI Point -->
                <li class="nav-item">
                    <a href="{{ route('admin.genbi_point.index') }}"
                        class="nav-link {{ request()->routeIs('admin.genbi_point.index') ? 'active' : '' }}"
                        onclick="{{ auth()->check() ? '' : 'return confirmLogin(event);' }}">
                        <i class="bi bi-check-circle nav-icon"></i>
                        <p>GenBI Point</p>
                    </a>
                </li>

                <!-- Manajemen Download -->
                <li class="nav-item">
                    <a href="{{ route('admin.download.index') }}"
                        class="nav-link {{ request()->routeIs('admin.download.index') ? 'active' : '' }}">
                        <i class="bi bi-list-ul nav-icon"></i>
                        <p>Manajemen Download</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
