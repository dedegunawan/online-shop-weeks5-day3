<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_produk')->nullable();
            $table->integer('kategori_id')->nullable();
            $table->string('foto_produk')->nullable();
            $table->enum('status_produk',
                array('published', 'drafted', 'deleted')
            )->default('drafted')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('stok')->nullable();
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
        Schema::dropIfExists('products');
    }
}
