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
            $table->enum('jabatan', ['Ketua', 'Sekretaris', 'Bendahara', 'PJ_Komisariat'])->change();
        });
    }

    public function down()
    {
        Schema::table('pengurus_harian', function (Blueprint $table) {
            $table->enum('jabatan', ['Ketua', 'Sekretaris', 'Bendahara'])->change();
        });
    }
};
