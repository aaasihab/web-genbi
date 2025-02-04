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
        Schema::table('kegiatan', function (Blueprint $table) {
            // Pastikan kolom 'tanggal' sudah ada sebelum diubah
            if (Schema::hasColumn('kegiatan', 'tanggal')) {
                // Ubah nama kolom 'tanggal' menjadi 'tanggal_kegiatan'
                $table->renameColumn('tanggal', 'tanggal_kegiatan');
            }

            // Ubah 'tanggal_kegiatan' agar nullable setelah diubah namanya
            if (Schema::hasColumn('kegiatan', 'tanggal_kegiatan')) {
                $table->date('tanggal_kegiatan')->nullable()->change();
            }

            // Tambahkan kolom 'status' setelah 'gambar' jika belum ada
            if (!Schema::hasColumn('kegiatan', 'status')) {
                $table->enum('status', ['published', 'nonaktif'])->default('published')->after('gambar');
            }
        });
    }

    public function down()
    {
        Schema::table('kegiatan', function (Blueprint $table) {
            // Jika rollback, kembalikan nama kolom
            if (Schema::hasColumn('kegiatan', 'tanggal_kegiatan')) {
                $table->renameColumn('tanggal_kegiatan', 'tanggal');
            }

            // Hapus kolom 'status' jika ada
            if (Schema::hasColumn('kegiatan', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
