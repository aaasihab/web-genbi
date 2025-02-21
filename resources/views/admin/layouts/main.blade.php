<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel GenBI Unuja</title>
    <link rel="shortcut icon" href="{{ asset('templates/img/genbi.png') }}" type="image/x-icon">
    @include('admin.layouts.styles')

    @yield('this-page-style')
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-navbar-fixed layout-fixed">
    <div class="wrapper">
        {{-- untuk header --}}
        @include('admin.layouts.header')

        {{-- Sidebar --}}
        @include('admin.layouts.sidebar')

        {{-- Konten utama --}}
        @yield('content')
    </div>
    {{-- footer --}}
    @include('admin.layouts.footer')

    @include('admin.layouts.scripts')
    {{-- untuk scripts khusus halaman tertentu --}}
    @yield('this-page-scripts')

</body>

</html>
