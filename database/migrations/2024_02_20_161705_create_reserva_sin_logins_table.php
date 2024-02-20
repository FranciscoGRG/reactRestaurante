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
        Schema::create('reserva_sin_logins', function (Blueprint $table) {
            $table->id();
            $table->integer("idEvent");
            $table->string('nombre');
            $table->string('email');
            $table->string('card-owner');
            $table->string('card-number');
            $table->string('card-expired');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_sin_logins');
    }
};
