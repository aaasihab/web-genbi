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
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    {{-- untuk header --}}
    @include('home.layouts.header')

    {{-- Konten utama --}}
    @yield('content')

    {{-- footer --}}
    @include('home.layouts.footer')

    @include('home.layouts.scripts')
    {{-- untuk scripts khusus halaman tertentu --}}
    @yield('this-page-scripts')

    <script>
        // Menampilkan preloader saat halaman dimuat
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.getElementById("preloader").style.display = "flex";
            } else {
                document.getElementById("preloader").style.display = "none";
            }
        };
    </script>

</body>

</html>
