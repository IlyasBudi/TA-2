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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('image');
            $table->integer('price');
            $table->string('status');
            // $table->boolean('is_ready')->default(0);
            // $table->enum('is_ready', ['0', '1']);
            $table->foreignId('kantor_cabang_id');
            $table->foreign('kantor_cabang_id')->references('id')->on('kantor_cabangs')->onDelete('cascade');
            $table->foreignId('category_bus_id');
            $table->foreign('category_bus_id')->references('id')->on('category_buses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
