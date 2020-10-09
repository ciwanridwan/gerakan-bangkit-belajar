<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monevs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('anggota_id');
            $table->foreignId('relawan_id');
            $table->string('foto_gadget');
            $table->string('foto_komputer');
            $table->string('foto_wifi');
            $table->string('zona_covid');
            $table->string('jumlah_paud');
            $table->string('jumlah_sd');
            $table->string('jumlah_smp');
            $table->string('jumlah_sma');
            $table->string('jumlah_komputer');
            $table->string('jumlah_gadget');
            $table->string('jumlah_wifi');
            $table->string('jumlah_berita');
            $table->string('jumlah_link_youtube');
            $table->string('berkas');
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
        Schema::dropIfExists('monevs');
    }
}
