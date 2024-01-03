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
        Schema::table('rates', function (Blueprint $table) {
            $table->unsignedBigInteger("hotel_id");
            $table->foreign("hotel_id")->references("id")->on("hotels")->OnDelete('cascade');
            $table->longText('comment');
            $table->integer('stare');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rates', function (Blueprint $table) {
            //
        });
    }
};
