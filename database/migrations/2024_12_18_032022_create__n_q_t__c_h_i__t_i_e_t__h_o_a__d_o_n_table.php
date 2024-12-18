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
        Schema::create('NQT_CHI_TIET_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->integer('nqtHoaDonID')->reference('id')->on('NQT_HOA_DON');
            $table->integer('nqtSanPhamID')->reference('id')->on('NQT_SAN_PHAM');
            $table->integer('nqtSoLuongMua');
            $table->float('nqtDonGiaMua');
            $table->float('nqtThanhTien');
            $table->tinyInteger('nqtTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NQT_CHI_TIET_HOA_DON');
    }
};
