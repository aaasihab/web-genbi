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

                <!-- Kegiatan -->
                <li class="nav-item">
                    <a href="{{ route('admin.kegiatan.index') }}"
                        class="nav-link {{ request()->routeIs('admin.kegiatan.index') ? 'active' : '' }}"
                        onclick="{{ auth()->check() ? '' : 'return confirmLogin(event);' }}">
                        <i class="bi bi-calendar-event nav-icon"></i> <!-- Ikon kalender untuk kegiatan -->
                        <p>Kegiatan</p>
                    </a>
                </li>

                {{-- Beasiswa BI --}}
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('admin.pengumuman.index') ? 'active' : '' }}">
                        <i class="bi bi-mortarboard nav-icon"></i> <!-- Ikon topi wisuda untuk beasiswa -->
                        <p>
                            Beasiswa BI
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.pengumuman.index') }}"
                                class="nav-link {{ request()->routeIs('admin.pengumuman.index') ? 'active' : '' }}">
                                <i class="bi bi-megaphone nav-icon"></i> <!-- Ikon speaker untuk pengumuman -->
                                <p>Pengumuman</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Struktur Organisasi --}}
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('admin.pengurus_harian.index') || request()->routeIs('admin.divisi.index') || request()->routeIs('admin.pengurus_divisi.index') || request()->routeIs('admin.anggota.index') ? 'active' : '' }}">
                        <i class="bi bi-diagram-3 nav-icon"></i> <!-- Ikon struktur organisasi -->
                        <p>
                            Organisasi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.pengurus_harian.index') }}"
                                class="nav-link {{ request()->routeIs('admin.pengurus_harian.index') ? 'active' : '' }}">
                                <i class="bi bi-person-badge nav-icon"></i> <!-- Ikon untuk pengurus harian -->
                                <p>Pengurus Harian</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.divisi.index') }}"
                                class="nav-link {{ request()->routeIs('admin.divisi.index') ? 'active' : '' }}">
                                <i class="bi bi-diagram-3-fill nav-icon"></i> <!-- Ikon untuk divisi -->
                                <p>Divisi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.pengurus_divisi.index') }}"
                                class="nav-link {{ request()->routeIs('admin.pengurus_divisi.index') ? 'active' : '' }}">
                                <i class="bi bi-people nav-icon"></i> <!-- Ikon untuk pengurus divisi -->
                                <p>Pengurus Divisi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.anggota.index') }}"
                                class="nav-link {{ request()->routeIs('admin.anggota.index') ? 'active' : '' }}">
                                <i class="bi bi-person-lines-fill nav-icon"></i> <!-- Ikon untuk anggota -->
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
                        <i class="bi bi-award nav-icon"></i> <!-- Ikon untuk penghargaan GenBI Point -->
                        <p>GenBI Point</p>
                    </a>
                </li>

                <!-- Manajemen Download -->
                <li class="nav-item">
                    <a href="{{ route('admin.download.index') }}"
                        class="nav-link {{ request()->routeIs('admin.download.index') ? 'active' : '' }}">
                        <i class="bi bi-download nav-icon"></i> <!-- Ikon download -->
                        <p>Manajemen Download</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
