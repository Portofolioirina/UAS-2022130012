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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade'); // Mengaitkan dengan tabel seats
            $table->dateTime('payment_date'); // Tanggal dan waktu pembayaran
            $table->decimal('amount', 10, 2); // Jumlah yang dibayar
            $table->string('payment_method', 50); // Metode pembayaran
            $table->string('payment_status', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
