@extends('home.layouts.main')

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
            <h1 class="text-4xl md:text-5xl font-bold">Tentang GenBI UNUJA</h1>
        </div>
    </section>

    <!-- Content Tentang GenBI -->
    <section id="tentang-genbi" class="relative bg-gray-50 py-12 mt-14">
        <!-- Hero Image -->
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 md:px-12">
            <!-- Text Content -->
            <div class="md:w-1/2 space-y-6">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 animate-hidden animate-from-left">Tentang GenBI</h2>
                <p class="text-gray-600 text-lg leading-relaxed text-justify animate-hidden animate-from-left">
                    Generasi Baru Indonesia (GenBI) adalah komunitas mahasiswa penerima beasiswa Bank Indonesia yang dibentuk pada 11 November 2011. Sebagai wadah bagi mahasiswa terbaik di Indonesia, GenBI berperan dalam mengembangkan potensi, kepemimpinan, dan wawasan anggotanya agar siap menghadapi tantangan masa depan.  
                    <br>
                    Sebagai fronliner Bank Indonesia, GenBI berkontribusi dalam edukasi, sosialisasi kebijakan, serta inovasi bagi masyarakat. Selain itu, GenBI aktif dalam program strategis bersama Bank Indonesia untuk menangani isu sosial, menghubungkan mahasiswa dengan masyarakat, serta menumbuhkan kepekaan sosial dan jiwa pengabdian.
                </p>
                <ul class="space-y-2 text-gray-700 animate-hidden animate-from-left pb-14">
                    <li><i class="fas fa-check-circle text-blue-500"></i> Menjadi komunitas muda inspiratif</li>
                    <li><i class="fas fa-check-circle text-blue-500"></i> Berperan aktif dalam pengembangan masyarakat</li>
                    <li><i class="fas fa-check-circle text-blue-500"></i> Membangun generasi berdaya saing global</li>
                </ul>
                <a href="#hubungi-kami"
                    class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition animate-hidden">
                    About Us
                </a>
            </div>
            <!-- Image -->
            <div class="md:w-1/3 mt-5 md:mt-0 flex justify-center animate-hidden">
                <img src="{{ asset('templates/img/genbi.jpg') }}" alt="Tentang GenBI"
                    class="rounded-lg shadow-lg w-[500px]">
            </div>
        </div>
    </section>

    <!-- Content Visi dan Misi -->
    <section id="visi-misi" class="relative h-max bg-fixed bg-center bg-cover mt-28"
        style="background-image: url({{ asset('templates/img/visi-misi.jpg') }});">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center items-center text-center h-full pt-14">
            <button
                class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-lg mb-6 hover:bg-blue-600 transition duration-300 ease-in-out animate-hidden">
                Visi dan Misi
            </button>

            <div
                class="relative z-10 flex flex-col md:flex-row items-center justify-center h-full px-4 md:px-16 gap-12 pt-10">
                <!-- Visi -->
                <div class="text-white max-w-lg space-y-6 text-center md:text-left self-start">
                    <h2 class="text-3xl font-bold text-center animate-hidden animate-from-left">Visi</h2>
                    <p class="text-lg leading-relaxed text-justify animate-hidden animate-from-left">
                        Menjadikan kaum muda Indonesia sebagai generasi yang kompeten dalam berbagai bidang keilmuan serta dapat membawa perubahan positif dan menjadi inspirasi bagi bangsa dan negara.
                    </p>
                </div>

                <!-- Misi -->
                <div class="text-white max-w-lg space-y-6 text-center md:text-left self-start pb-24">
                    <h2 class="text-3xl font-bold text-center animate-hidden animate-from-right">Misi</h2>
                    <p class="text-lg leading-relaxed text-justify animate-hidden animate-from-right">
                        1. Menggagas berbagai kegiatan pemberdayaan masyarakat untuk Indonesia yang lebih baik (INITIATE).<br>
                        2. Menjadi garda terdepan dalam melakukan aksi nyata untuk pembangunan (ACT)<br>
                        3. Peduli dan berkontribusi nyata untuk pemberdayaan masyarakat(SHARE)<br>
                        4. Berbagi inspirasi dan motivasi untuk menjadi energi bagi negeri (INSPIRE)
                    </p>
                </div>
            </div>
    </section>

    <!-- Content Tujuan GenBI -->
    <section id="tujuan-genbi" class="py-24 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="flex justify-center pb-3">
                <a href="#hubungi-kami"
                    class="bg-blue-500 text-white text-center px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition animate-hidden">
                    Tujuan
                </a>
            </div>
            <h2 class="text-center text-4xl font-bold mb-8 text-gray-800 animate-hidden">Tujuan GenBI</h2>
            <div class="flex flex-wrap justify-center gap-8">
                <!-- Card 1: Frontliners -->
                <div class="w-full sm:w-1/3 md:w-[30%] p-4 animate-hidden animate-from-bottom">
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 h-[270px]">
                        <div class="text-center mb-4">
                            <i class="fas fa-users-cog text-blue-600 text-4xl"></i>
                        </div>
                        <h3 class="text-center text-xl font-semibold text-gray-800">Frontliners</h3>
                        <p class="text-center text-gray-600 mt-4">mengkomunikasikan kelembagaan dan berbagai kebijakan Bank Indonesia kepada sesama mahasiswa dan masyarakat umum.</p>
                    </div>
                </div>

                <!-- Card 2: Change Agent -->
                <div class="w-full sm:w-1/3 md:w-[30%] p-4 animate-hidden animate-from-bottom">
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 h-[270px]">
                        <div class="text-center mb-4">
                            <i class="fas fa-exchange-alt text-blue-600 text-4xl"></i>
                        </div>
                        <h3 class="text-center text-xl font-semibold text-gray-800">Change Agent</h3>
                        <p class="text-center text-gray-600 mt-4">menjadi agen perubahan dan role model dikalangan pelajar, mahasiswa, dan masyarakat.</p>
                    </div>
                </div>

                <!-- Card 3: Future Leaders -->
                <div class="w-full sm:w-1/3 md:w-[30%] p-4 animate-hidden animate-from-bottom">
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 h-[270px]">
                        <div class="text-center mb-4">
                            <i class="fas fa-chalkboard-teacher text-blue-600 text-4xl"></i>
                        </div>
                        <h3 class="text-center text-xl font-semibold text-gray-800">Future Leaders</h3>
                        <p class="text-center text-gray-600 mt-4">menjadi pemimpin masa depan di berbagai bidang dan tingkatan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divisi GenBI -->
    <section id="divisi-genbi" class="py-10 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="pb-5 px-10">
                <a href="#hubungi-kami"
                    class="bg-blue-500 text-white text-center px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition animate-hidden">
                    Divisi
                </a>
            </div>
            <h2 class="text-4xl px-10 font-bold mb-8 text-gray-800 animate-hidden">Divisi GenBI UNUJA</h2>
            <div class="flex flex-wrap justify-center">
                <!-- Card 1: Media Kreatif -->
                <div class="w-full sm:w-1/3 md:w-[20%] p-4 animate-hidden animate-from-bottom">
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 h-[150px]">
                        <div class="text-center mb-4">
                            <i class="fas fa-tv text-blue-600 text-4xl"></i>
                        </div>
                        <h3 class="text-center text-[1.1rem] text-gray-800">Media Kreatif</h3>
                    </div>
                </div>

                <!-- Card 2: Pendidikan -->
                <div class="w-full sm:w-1/3 md:w-[20%] p-4 animate-hidden animate-from-bottom">
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 h-[150px]">
                        <div class="text-center mb-4">
                            <i class="fas fa-book-reader text-blue-600 text-4xl"></i>
                        </div>
                        <h3 class="text-center text-[1.1rem] text-gray-800">Pendidikan</h3>
                    </div>
                </div>

                <!-- Card 3: Kewirausahaan -->
                <div class="w-full sm:w-1/3 md:w-[20%] p-4 animate-hidden animate-from-bottom">
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 h-[150px]">
                        <div class="text-center mb-4">
                            <i class="fas fa-lightbulb text-blue-600 text-4xl"></i>
                        </div>
                        <h3 class="text-center text-[1.1rem] text-gray-800">Kewirausahaan</h3>
                    </div>
                </div>

                <!-- Card 4: Lingkungan Hidup -->
                <div class="w-full sm:w-1/3 md:w-[20%] p-4 animate-hidden animate-from-bottom">
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 h-[150px]">
                        <div class="text-center mb-4">
                            <i class="fas fa-leaf text-blue-600 text-4xl"></i>
                        </div>
                        <h3 class="text-center text-[1.1rem] text-gray-800">Lingkungan Hidup</h3>
                    </div>
                </div>

                <!-- Card 5: Pengabdian Masyarakat -->
                <div class="w-full sm:w-1/3 md:w-[20%] p-4 animate-hidden animate-from-bottom">
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 h-[150px]">
                        <div class="text-center mb-4">
                            <i class="fas fa-hands-helping text-blue-600 text-4xl"></i>
                        </div>
                        <h3 class="text-center text-[1.1rem] text-gray-800">Pengabdian Masyarakat</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('this-page-scripts')
@endsection
