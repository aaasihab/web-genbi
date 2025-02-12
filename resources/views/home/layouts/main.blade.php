<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GenBI UNUJA</title>
    <link rel="shortcut icon" href="{{ asset('templates/img/genbi.png') }}" type="image/x-icon">
    @include('home.layouts.styles')

    @yield('this-page-style')
</head>

<body class="bg-gray-50 text-gray-800">
    {{-- untuk header --}}
    @include('home.layouts.header')

    {{-- Konten utama --}}
    @yield('content')

    {{-- footer --}}
    @include('home.layouts.footer')

    @include('home.layouts.scripts')
    {{-- untuk scripts khusus halaman tertentu --}}
    @yield('this-page-scripts')

</body>

</html>
