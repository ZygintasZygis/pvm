<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * bill_id - saskaitos id
     * name - prekes pavadinimas
     * amount - kiekis
     * price - vienos prekes kaina
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id');
            $table->string('name')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->float('price')->nullable();
            $table->timestamps();

            $table->foreign('bill_id')->references('id')->on('bills')
                ->onDelete('cascade');
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
