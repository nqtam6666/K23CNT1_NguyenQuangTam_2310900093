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
        Schema::create('NQT_LOAI_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('nqtMaLoai', 255)->unique();
            $table->string('nqtTenLoai', 255);
            $table->tinyInteger('nqtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NQT_LOAI_SAN_PHAM');
    }
};
