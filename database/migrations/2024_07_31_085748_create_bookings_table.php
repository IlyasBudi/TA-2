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
            $table->string('code');
            // $table->string('destination');
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->time('pickup_time');
            $table->string('longitude');
            $table->string('latitude');
            $table->foreignId('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('kantor_cabang_id');
            $table->foreign('kantor_cabang_id')->references('id')->on('kantor_cabangs')->onDelete('cascade');
            $table->foreignId('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->foreignId('category_bus_id');
            $table->foreign('category_bus_id')->references('id')->on('category_buses')->onDelete('cascade');
            $table->foreignId('bus_id');
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
            $table->timestamps();
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
