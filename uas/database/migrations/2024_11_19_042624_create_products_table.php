<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama produk
            $table->text('description')->nullable(); // Deskripsi produk
            $table->string('image')->nullable(); // Nama file gambar
            $table->integer('stock'); // Stok produk
            $table->decimal('price', 10, 2); // Harga produk
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products'); // Hapus tabel jika rollback
    }
}
