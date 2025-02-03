<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GenBI UNUJA</title>
    @include('layouts.styles')

    @yield('this-page-style')
</head>

<body class="bg-gray-50 text-gray-800">
    {{-- untuk header --}}
    @include('layouts.header')

    {{-- Konten utama --}}
    @yield('content')

    {{-- footer --}}
    @include('layouts.footer')

    @include('layouts.scripts')
    {{-- untuk scripts khusus halaman tertentu --}}
    @yield('this-page-scripts')

</body>

</html>
