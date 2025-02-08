@extends('home.layouts.main')

@section('this-page-style')
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="relative h-screen flex items-center justify-center text-white md:-mt-12">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center opacity-50 hidden md:block"
            style="background-image: url('{{ asset('templates/img/visi-misi.jpg') }}');">
        </div>
        <div class="absolute inset-0 bg-center bg-no-repeat opacity-50 block md:hidden"
            style="background-image: url('{{ asset('templates/img/genbi.jpg') }}'); background-size: contain; background-position: 50% 60%;">
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
    <section id="kegiatan-genbi" class="pt-10 pb-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Button & Title -->
            <div class="flex justify-center pb-3 animate-hidden">
                <a href="#kegiatan-genbi"
                    class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition">
                    Kegiatan
                </a>
            </div>
            <h2 class="text-center text-4xl font-bold mb-8 text-gray-800 animate-hidden">Kegiatan GenBI UNUJA</h2>

            <!-- Cards -->
            <div id="card-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($kegiatan as $index => $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden animate-hidden animate-from-bottom {{ $index >= 6 ? 'hidden' : '' }}">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Foto Kegiatan"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <p class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d F Y') }}
                            </p>
                            <h3 class="text-lg font-semibold text-gray-800 mt-2">{{ $item->nama }}</h3>
                            <p class="text-gray-600 mt-2">
                                {{ Str::limit($item->deskripsi, 100, '...') }}
                            </p>
                            <a href="{{ route('home.detailKegiatan', $item->id) }}"
                                class="text-blue-500 hover:underline mt-4 block">Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Tampilkan Lebih Banyak -->
            @if ($kegiatan->count() > 6)
                <div class="flex justify-center mt-8">
                    <button id="load-more-btn"
                        class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition">
                        Tampilkan Lebih Banyak
                    </button>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('this-page-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cardContainer = document.getElementById("card-container");
            const loadMoreBtn = document.getElementById("load-more-btn");
            const cards = Array.from(cardContainer.children);
            const initialCardsToShow = 6;
            const cardsToShowPerClick = 3;
            let currentlyVisibleCards = initialCardsToShow;

            // Sembunyikan semua yang lebih dari 6 saat awal
            cards.forEach((card, index) => {
                if (index >= initialCardsToShow) {
                    card.classList.add("hidden"); // Gunakan Tailwind untuk menyembunyikan
                }
            });

            if (loadMoreBtn) {
                loadMoreBtn.addEventListener("click", function() {
                    let hiddenCards = cards.filter(card => card.classList.contains("hidden"));

                    hiddenCards.slice(0, cardsToShowPerClick).forEach(card => {
                        card.classList.remove("hidden"); // Tampilkan elemen
                    });

                    currentlyVisibleCards += cardsToShowPerClick;

                    // Jika semua elemen sudah ditampilkan, sembunyikan tombol
                    if (currentlyVisibleCards >= cards.length) {
                        loadMoreBtn.classList.add("hidden");
                    }
                });
            }
        });
    </script>
@endsection

@extends('home.layouts.main')

@section('this-page-style')
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="relative h-screen flex items-center justify-center text-white md:-mt-12">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center opacity-50 hidden md:block"
            style="background-image: url('{{ asset('templates/img/visi-misi.jpg') }}');">
        </div>
        <div class="absolute inset-0 bg-center bg-no-repeat opacity-50 block md:hidden"
            style="background-image: url('{{ asset('templates/img/genbi.jpg') }}'); background-size: contain; background-position: 50% 60%;">
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
    <section id="kegiatan-genbi" class="pt-10 pb-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Button & Title -->
            <div class="flex justify-center pb-3 animate-hidden">
                <a href="#kegiatan-genbi"
                    class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition">
                    Kegiatan
                </a>
            </div>
            <h2 class="text-center text-4xl font-bold mb-8 text-gray-800 animate-hidden">Kegiatan GenBI UNUJA</h2>

            <!-- Cards -->
            <div id="card-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($kegiatan as $index => $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden animate-hidden animate-from-bottom {{ $index >= 6 ? 'hidden' : '' }}">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Foto Kegiatan"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <p class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d F Y') }}
                            </p>
                            <h3 class="text-lg font-semibold text-gray-800 mt-2">{{ $item->nama }}</h3>
                            <p class="text-gray-600 mt-2">
                                {{ Str::limit($item->deskripsi, 100, '...') }}
                            </p>
                            <a href="{{ route('home.detailKegiatan', $item->id) }}"
                                class="text-blue-500 hover:underline mt-4 block">Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Tampilkan Lebih Banyak -->
            @if ($kegiatan->count() > 6)
                <div class="flex justify-center mt-8">
                    <button id="load-more-btn"
                        class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition">
                        Tampilkan Lebih Banyak
                    </button>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('this-page-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cardContainer = document.getElementById("card-container");
            const loadMoreBtn = document.getElementById("load-more-btn");
            const cards = Array.from(cardContainer.children);
            const initialCardsToShow = 6;
            const cardsToShowPerClick = 3;
            let currentlyVisibleCards = initialCardsToShow;

            // Sembunyikan semua yang lebih dari 6 saat awal
            cards.forEach((card, index) => {
                if (index >= initialCardsToShow) {
                    card.classList.add("hidden"); // Gunakan Tailwind untuk menyembunyikan
                }
            });

            if (loadMoreBtn) {
                loadMoreBtn.addEventListener("click", function() {
                    let hiddenCards = cards.filter(card => card.classList.contains("hidden"));

                    hiddenCards.slice(0, cardsToShowPerClick).forEach(card => {
                        card.classList.remove("hidden"); // Tampilkan elemen
                    });

                    currentlyVisibleCards += cardsToShowPerClick;

                    // Jika semua elemen sudah ditampilkan, sembunyikan tombol
                    if (currentlyVisibleCards >= cards.length) {
                        loadMoreBtn.classList.add("hidden");
                    }
                });
            }
        });
    </script>
@endsection
