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
        Schema::table('pengurus_harian', function (Blueprint $table) {
            $table->dropForeign(['struktur_organisasi_id']);
            $table->renameColumn('struktur_organisasi_id', 'organisasi_id');
            $table->foreign('organisasi_id')->references('id')->on('organisasi')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::table('pengurus_harian', function (Blueprint $table) {
            $table->dropForeign(['organisasi_id']);
            $table->renameColumn('organisasi_id', 'struktur_organisasi_id');
            $table->foreign('struktur_organisasi_id')->references('id')->on('organisasi')->onDelete('cascade');
        });
    }
};

