@extends('home.layouts.main')

@section('this-page-style')
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="relative h-screen flex items-center justify-center text-white -mt-12">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center opacity-70 block"
            style="background-image: url('{{ asset('storage/' . $kegiatan->gambar) }}');"></div>

        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-b to-transparent from-blue-800"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-50"></div>

        <!-- Content -->
        <div class="relative z-10 text-center space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold">Detail kegiatan</h1>
        </div>
    </section>

    <!-- Detail Kegiatan -->
    <section id="detail-kegiatan" class="pt-10 pb-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="bg-white rounded-xl shadow-lg p-8 animate-hidden animate-from-bottom">
                <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">{{ $kegiatan->nama }}</h2>
                <div class="w-full overflow-hidden rounded-xl mb-6 relative">
                    <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="Foto Kegiatan"
                        class="w-full h-auto rounded-xl">
                    <p
                        class="text-xs sm:text-sm text-black absolute bottom-2 left-2 bg-white bg-opacity-75 px-2 py-1 rounded-md">
                        {{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->format('d F Y') }}
                    </p>
                </div>
                <p class="text-gray-700 leading-relaxed text-md d:text-lg text-justify">{{ $kegiatan->deskripsi }}</p>
            </div>

            <!-- Tombol Kembali -->
            <div class="flex justify-center mt-10">
                <a href="{{ route('home.kegiatan') }}"
                    class="bg-blue-600 text-white px-8 py-3 sm:text-lg rounded-xl shadow-lg hover:bg-blue-700 transition-all duration-300 text-lg font-semibold">
                    ← Kembali ke Kegiatan
                </a>
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
    </script>
@endsection
