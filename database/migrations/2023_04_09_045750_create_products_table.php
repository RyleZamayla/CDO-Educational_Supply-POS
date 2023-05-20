<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('picture'); // Update column definition to use binary method for BLOB
            $table->string('title');
            $table->double('price');
            $table->integer('quantity');
            $table->boolean('status')->default(true);
            $table->longText('description');
            $table->timestamps();
            $table->string('barcode');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
