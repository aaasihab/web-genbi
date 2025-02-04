@extends('layouts.main')

@section('this-page-style')
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="relative h-screen flex items-center justify-center text-white -mt-12">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center opacity-50 hidden md:block"
            style="background-image: url('{{ asset('templates/img/visi-misi.jpg') }}');"></div>
        <div class="absolute inset-0 bg-center bg-no-repeat opacity-70 block md:hidden"
            style="background-image: url('../../img/genbi.jpg'); background-size: contain; background-position: 50% 60%;">
        </div>

        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-b to-transparent from-blue-800"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50"></div>

        <!-- Content -->
        <div class="relative z-10 text-center space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold">Daftar Kegiatan</h1>
        </div>
    </section>

    <!-- Kegiatan -->
    <section id="kegiatan-genbi" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Button & Title -->
            <div class="flex justify-center pb-3 animate-hidden">
                <a href="#kegiatan-genbi"
                    class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition">
                    Kegiatan
                </a>
            </div>
            <h2 class="text-center text-4xl font-bold mb-8 text-gray-800 animate-hidden">Kegiatan GenBI UNUJA</h2>
            <!-- Search & Filter -->
            <div class="flex flex-wrap justify-center items-center gap-4 mb-8 animate-hidden">
                <input type="text" placeholder="Cari kegiatan..."
                    class="w-full sm:w-[60%] md:w-[40%] px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-600 transition">
                    Search
                </button>
                <button id="filter-btn"
                    class="bg-gray-200 text-gray-800 px-6 py-2 rounded-md shadow-md hover:bg-gray-300 transition">
                    Filter
                </button>
            </div>

            <!-- Cards -->
            <div id="card-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($kegiatan as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden animate-hidden animate-from-bottom">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Foto Kegiatan"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d F Y') }}
                            </p>
                            <h3 class="text-lg font-semibold text-gray-800 mt-2">{{ $item->nama }}</h3>
                            <p class="text-gray-600 mt-2">
                                {{ Str::limit($item->deskripsi, 100, '...') }}
                            </p>
                            <a href="#detail-kegiatan" class="text-blue-500 hover:underline mt-4 block">Selengkapnya</a>
                        </div>
                    </div>
                @endforeach

            </div>


            <!-- Tampilkan Lebih Banyak -->
            <div class="flex justify-center mt-8">
                <button id="load-more-btn"
                    class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition">
                    Tampilkan Lebih Banyak
                </button>
            </div>
        </div>
    </section>
@endsection

@section('this-page-scripts')
    <script>
        // script kegiatan

        // Filter Pop-Up
        const filterBtn = document.getElementById('filter-btn');
        filterBtn.addEventListener('click', () => {
            Swal.fire({
                title: 'Filter Kegiatan',
                input: 'select',
                inputOptions: {
                    'terbaru': 'Terbaru',
                    'terlama': 'Terlama',
                },
                inputPlaceholder: 'Pilih filter',
                showCancelButton: true,
                confirmButtonText: 'Terapkan',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(`Filter applied: ${result.value}`);
                }
            });
        });

        // memunculkan elemen
        document.addEventListener("DOMContentLoaded", function() {
            const cardContainer = document.getElementById("card-container");
            const loadMoreBtn = document.getElementById("load-more-btn");
            const cards = cardContainer.children;
            const initialCardsToShow = 6;
            const cardsToShowPerClick = 3;
            let currentlyVisibleCards = initialCardsToShow;

            // Initialize by showing the first `initialCardsToShow` cards
            Array.from(cards).forEach((card, index) => {
                card.style.display = index < initialCardsToShow ? "block" : "none";
            });

            loadMoreBtn.addEventListener("click", function() {
                const hiddenCards = Array.from(cards).filter(
                    (card) => card.style.display === "none"
                );

                hiddenCards.slice(0, cardsToShowPerClick).forEach((card) => {
                    card.style.display = "block";
                });

                currentlyVisibleCards += cardsToShowPerClick;

                // Hide the button if all cards are visible
                if (currentlyVisibleCards >= cards.length) {
                    loadMoreBtn.style.display = "none";
                }
            });
        });

        // akhir script kegiatan

        // Tampilkan SweetAlert untuk pesan sukses
        @if (session('success'))
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        // Tampilkan SweetAlert untuk pesan error
        @if (session('error'))
            Swal.fire({
                title: "Gagal!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "OK",
            });
        @endif
    </script>
@endsection
