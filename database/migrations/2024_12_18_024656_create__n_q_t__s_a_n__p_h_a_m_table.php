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
        Schema::create('NQT_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('nqtMaSanPham', 255)->unique();
            $table->string('nqtTenSanPham', 255);
            $table->string('nqtHinhAnh', 255);
            $table->integer('nqtSoLuong', );
            $table->float('nqtDonGia');
            $table->bigInteger('nqtMaLoai')->reference('id')->on('NQT_LOAI_SAN_PHAM');
            $table->tinyInteger('nqtTrangThai');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NQT_SAN_PHAM');
    }
};
