<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
    {
        Schema::create('arsip', function (Blueprint $table) {
            $table->id();
            $table->string('kode_arsip')->unique();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->foreignId('kategori_arsip_id')->constrained('kategori_arsip')->onDelete('cascade');
            $table->string('file')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip');
    }
};
