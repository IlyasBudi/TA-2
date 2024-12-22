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
        Schema::create('pencairans', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('staff_id');
            // $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->foreignId('kantor_cabang_id');
            $table->foreign('kantor_cabang_id')->references('id')->on('kantor_cabangs')->onDelete('cascade');
            $table->foreignId('rekening_id');
            $table->foreign('rekening_id')->references('id')->on('rekenings')->onDelete('cascade');
            $table->string('status');
            $table->string('image');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencairans');
    }
};
