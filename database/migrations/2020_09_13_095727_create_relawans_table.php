<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenjang');
            $table->string('follow_ig');
            $table->string('subscribe_youtube');
            $table->foreignId('province_id');
            $table->foreignId('city_id');
            $table->foreignId('district_id');
            $table->string('kelurahan');
            $table->string('jumlah_sanggar');
            $table->string('jumlah_pelajar');
            $table->string('zona_covid');
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
        Schema::dropIfExists('relawans');
    }
}
