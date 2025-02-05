<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('divisi', function (Blueprint $table) {
            // Tambah kolom organisasi_id setelah id
            $table->unsignedBigInteger('organisasi_id')->after('id');

            // Tambah foreign key dengan reference ke tabel struktur_organisasi
            $table->foreign('organisasi_id')->references('id')->on('organisasi')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::table('divisi', function (Blueprint $table) {
            // Hapus foreign key dan kolom
            $table->dropForeign(['organisasi_id']);
            $table->dropColumn('organisasi_id');
        });
    }
};
