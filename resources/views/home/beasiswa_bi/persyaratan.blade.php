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
            <h1 class="text-4xl md:text-5xl font-bold">Persyaratan</h1>
        </div>
    </section>

    <!-- Persyaratan -->
    <section id="persyaratan-beasiswa" class="bg-gray-50 pt-10 pb-16">
        <div class="container mx-auto px-6 md:px-12 lg:px-20">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <button
                    class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-lg mb-6 hover:bg-blue-600 transition duration-300 ease-in-out animate-hidden">
                    Beasiswa
                </button>
                <h1 class="text-4xl font-bold text-gray-800 animate-hidden">Persyaratan Beasiswa</h1>
            </div>

            <!-- Main Section with Flex -->
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Dokumen Administratif -->
                <div class="flex-1 bg-white rounded-lg shadow-lg p-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 animate-hidden animate-from-left">Dokumen Administratif</h2>
                    <ul class="list-disc list-inside text-gray-600 leading-relaxed space-y-2 animate-hidden animate-from-left">
                        <li>Kartu Tanda Mahasiswa (KTM).</li>
                        <li>Kartu Tanda Penduduk (KTP).</li>
                        <li>Pas foto ukuran 4x3 berlatar biru atau merah.</li>
                        <li>Kartu Keluarga (KK).</li>
                        <li>
                            Profil terdaftar aktif di <a href="https://pddikti.kemdikbud.go.id"
                                class="text-blue-600 hover:underline">https://pddikti.kemdikbud.go.id</a>.
                        </li>
                        <li>Transkrip nilai terbaru yang dicap dan ditandatangani oleh pihak fakultas.</li>
                        <li>Resume pribadi dalam bahasa Indonesia.</li>
                        <li>Motivation letter dalam bahasa Indonesia.</li>
                        <li>Form. A.1 BI (terlampir pada link pendaftaran).</li>
                        <li>
                            Surat pernyataan tidak sedang menerima beasiswa atau bantuan jenis lainnya serta siap menjadi
                            bagian dari GenBI (terlampir pada link pendaftaran).
                        </li>
                        <li>Surat rekomendasi dari satu tokoh akademik/non-akademik (terlampir pada link pendaftaran).</li>
                        <li>Surat Keterangan Tidak Mampu (SKTM) dari desa/kelurahan setempat.</li>
                    </ul>
                </div>

                <!-- Kriteria -->
                <div class="flex-1 bg-white rounded-lg shadow-lg p-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 animate-hidden animate-from-right ">Kriteria</h2>
                    <ul class="list-disc list-inside text-gray-600 leading-relaxed space-y-2 animate-hidden animate-from-right">
                        <li>Minimal semester 3 (tiga) dan telah menyelesaikan sekurang-kurangnya 40 (empat puluh) SKS.</li>
                        <li>Maksimal berusia 23 tahun pada bulan November 2025.</li>
                        <li>
                            Tidak sedang menerima beasiswa atau bantuan lainnya, serta tidak berada dalam status ikatan
                            dinas dari lembaga/instansi lain.
                        </li>
                        <li>Memiliki pengalaman menjalankan aktivitas sosial yang membawa dampak positif bagi masyarakat.
                        </li>
                        <li>
                            Bersedia berperan aktif dalam mengelola dan mengembangkan Generasi Baru Indonesia (GenBI) serta
                            berpartisipasi dalam kegiatan yang diselenggarakan oleh Bank Indonesia dan Universitas
                            Majalengka.
                        </li>
                        <li>Memiliki IPK minimal 3.25 (skala 4).</li>
                        <li>
                            Prioritas diberikan kepada mahasiswa dari latar belakang ekonomi keluarga kurang mampu, tetapi
                            memiliki prestasi akademik/non-akademik yang baik.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Studi and Timeline -->
    <section class="bg-gray-50 py-16 px-5">
        <div class="container mx-auto px-4">
            <!-- Program Studi Prioritas -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 animate-hidden">Program Studi Prioritas</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6 animate-hidden animate-from-bottom">
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-600">Ekonomi</h3>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-600">Ekonomi Syariah</h3>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-600">Perbankan Syariah</h3>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-600">Hukum</h3>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-600">Teknik Informatika</h3>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-600">Teknologi Informasi</h3>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-600">Pendidikan Matematika</h3>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-600">Komunikasi dan Penyiaran Islam</h3>
                </div>
            </div>

            <!-- Timeline Pendaftaran -->
            <section id="timeline" class="bg-gray-50 py-24">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12 animate-hidden">Timeline Kegiatan</h2>
                    <div class="relative">
                        <!-- Garis Tengah -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-1 bg-blue-500 h-full"></div>

                        <!-- Item Timeline -->
                        <div class="space-y-12">
                            <!-- Tahap 1 -->
                            <div class="relative flex items-center">
                                <div class="w-1/2 pr-8 text-right animate-hidden animate-from-bottom" data-aos="fade-right">
                                    <h3 class="text-xl font-semibold text-gray-800">Pendaftaran Dibuka</h3>
                                    <p class="text-gray-600">1 - 15 Februari 2024</p>
                                </div>
                                <div
                                    class="w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full absolute left-1/2 transform -translate-x-1/2">
                                    <i class="fa-solid fa-file-alt"></i>
                                </div>
                                <div class="w-1/2"></div>
                            </div>

                            <!-- Tahap 2 -->
                            <div class="relative flex items-center">
                                <div class="w-1/2"></div>
                                <div
                                    class="w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full absolute left-1/2 transform -translate-x-1/2">
                                    <i class="fa-solid fa-user-check"></i>
                                </div>
                                <div class="w-1/2 pl-8 animate-hidden animate-from-bottom" data-aos="fade-left">
                                    <h3 class="text-xl font-semibold text-gray-800">Seleksi Administrasi</h3>
                                    <p class="text-gray-600">16 - 22 Februari 2024</p>
                                </div>
                            </div>

                            <!-- Tahap 3 -->
                            <div class="relative flex items-center">
                                <div class="w-1/2 pr-8 text-right animate-hidden animate-from-bottom" data-aos="fade-right">
                                    <h3 class="text-xl font-semibold text-gray-800">Wawancara</h3>
                                    <p class="text-gray-600">25 Februari 2024</p>
                                </div>
                                <div
                                    class="w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full absolute left-1/2 transform -translate-x-1/2">
                                    <i class="fa-solid fa-comments"></i>
                                </div>
                                <div class="w-1/2"></div>
                            </div>

                            <!-- Tahap 4 -->
                            <div class="relative flex items-center">
                                <div class="w-1/2"></div>
                                <div
                                    class="w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full absolute left-1/2 transform -translate-x-1/2">
                                    <i class="fa-solid fa-bullhorn"></i>
                                </div>
                                <div class="w-1/2 pl-8 animate-hidden animate-from-bottom" data-aos="fade-left">
                                    <h3 class="text-xl font-semibold text-gray-800">Pengumuman</h3>
                                    <p class="text-gray-600">28 Februari 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>
@endsection

@section('this-page-scripts')
@endsection
