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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_id');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->string('room_name');
            $table->string('room_number');
            $table->integer('adults');
            $table->integer('children');
            $table->decimal('price', 10, 2);
            $table->string('guest_name');
            $table->string('phone_number');
            $table->enum('status', ['checked_in', 'checked_out']);
            $table->string('email')->nullable()->unique();
            $table->string('notes')->nullable();
            $table->timestamps();

            $table->foreign('partner_id')->references('id')->on('partners');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
