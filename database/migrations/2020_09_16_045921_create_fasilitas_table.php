<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_pc');
            $table->integer('jumlah_hp');
            $table->integer('jumlah_wifi');
            $table->integer('jumlah_berita');
            $table->string('bukti_berita');
            $table->string('foto_smartphone');
            $table->string('foto_wifi');
            $table->string('foto_komputer');
            $table->string('bukti_pjj');
            $table->string('link_youtube');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasilitas');
    }
}
