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
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('ticket_id');
            $table->foreign("ticket_id")->references("id")->on("tickets")->OnDelete('cascade');;
            $table->unsignedBigInteger('hotel_id');
            $table->foreign("hotel_id")->references("id")->on("hotels")->OnDelete('cascade');;
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
};
