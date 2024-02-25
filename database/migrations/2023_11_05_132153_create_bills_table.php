<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * bill_date - saskaitos data
     * invoice_nr - serijos numeris
     * bank_acc_nr - banko saskaita
     * payment_purpose - mokejimo paskirtis
     */
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->date('bill_date');
            $table->string('invoice_nr')->nullable();
            $table->string('bank_acc_nr')->nullable();
            $table->string('payment_purpose')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
