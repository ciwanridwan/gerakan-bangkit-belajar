<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanggarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanggars', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah_anggota');
            $table->string('jumlah_sanggar');
            $table->string('jumlah_perprovinsi');
            $table->string('zona_covid');
            $table->string('jumlah_pelajar');
            $table->string('jumlah_komputer');
            $table->string('jumlah_gadget');
            $table->string('jumlah_wifi');
            $table->string('jumlah_berita');
            $table->string('jumlah_link_youtube');
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
        Schema::dropIfExists('sanggars');
    }
}
