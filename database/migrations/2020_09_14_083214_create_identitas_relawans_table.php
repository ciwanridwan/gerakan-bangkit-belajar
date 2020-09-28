<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentitasRelawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas_relawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_teknisi');
            $table->string('nomor_teknisi');
            $table->string('email_teknisi');
            $table->string('jenis_teknisi');
            $table->string('nama_aktivis');
            $table->string('nomor_aktivis');
            $table->string('email_aktivis');
            $table->string('jenis_aktivis');
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
        Schema::dropIfExists('identitas_relawans');
    }
}
