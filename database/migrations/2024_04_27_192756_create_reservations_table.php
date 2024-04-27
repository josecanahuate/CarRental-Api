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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            //datos cliente
            $table->string('client_name');
            $table->string('dni', 15)->unique();
            $table->string('phone', 20);
            $table->string('email')->unique();
            //datos del vehiculo
            $table->string('brand');
            $table->string('model');
            $table->string('year');
            $table->string('capacity');
            $table->string('price');
            //datos de la reserva
            $table->date('pickup_date');
            $table->date('return_date');
            $table->string('pickup_location');
            $table->string('return_location');
            $table->enum('status', ['accepted', 'pending', 'rejected']); //(estado de la reserva: pendiente, confirmada, cancelada)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
