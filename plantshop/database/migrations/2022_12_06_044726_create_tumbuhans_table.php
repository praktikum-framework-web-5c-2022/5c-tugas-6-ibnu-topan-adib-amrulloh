<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tumbuhans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama_ilmiah');
            $table->integer('stok');
            $table->integer('harga');
            $table->text('deskripsi');
            $table->foreignId('category_id')->unique();
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
        Schema::dropIfExists('tumbuhans');
    }
};
