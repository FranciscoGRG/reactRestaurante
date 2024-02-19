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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('name');
            $table->string('email');
            $table->string('message');
            $table->integer('menu');
            $table->string('telefono');
            $table->string('alergias')->nullable();
            $table->string("card-number");
            $table->string("card-owner");
            $table->string("expiration");
            $table->integer('comensales');

            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->unsignedBigInteger('table_id')->unique();

            $table->timestamps();


            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('table_id')
                ->references('id')
                ->on('tables')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
