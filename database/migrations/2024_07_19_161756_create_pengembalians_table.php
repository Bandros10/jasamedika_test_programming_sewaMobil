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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('name');
            $table->text('alamat');
            $table->string('telepon');
            $table->string('mobil');
            $table->string('nomor_plat');
            $table->date('tanggal_keluar')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->string('tarif');
            $table->boolean('status_pengembalian')->nullable()->default(false);
            $table->timestamps();

            // $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
