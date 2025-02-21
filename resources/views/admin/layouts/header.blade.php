<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-fixed navbar-lightblue navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav flex-row">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('beranda') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right-side Header Section -->
    <ul class="navbar-nav ms-auto flex-row username-text">
        <li class="nav-item">
            <span class="nav-link text-white px-0">
                Hai, {{ Auth::user()->name }} <!-- Display user name -->
            </span>
        </li>

        <!-- Dropdown for Settings and Logout -->
        <li class="nav-item dropdown">
            <a href="" class="nav-link text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-user-circle"></i> <!-- Icon user circle -->
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow">
                <!-- Logout Button -->
                <button type="button" class="dropdown-item text-danger" onclick="confirmLogout()">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </button>

                <!-- Logout Form -->
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
