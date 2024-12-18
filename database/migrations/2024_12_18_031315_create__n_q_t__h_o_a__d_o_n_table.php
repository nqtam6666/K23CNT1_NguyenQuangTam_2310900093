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
        Schema::create('NQT_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->string('nqtMaHoaDon', 255)->unique();
            $table->integer('nqtMaKhachHang')->reference('id')->on('nqtKhachHang');
            $table->dateTime('nqtNgayHoaDon');
            $table->dateTime('nqtNgayNhan');
            $table->string('nqtHoTenKhachHang', 255);
            $table->string('nqtEmail', 255);
            $table->string('nqtDienThoai', 255);
            $table->string('nqtDiaChi', 255);
            $table->float('nqtTongTriGia');
            $table->tinyInteger('nqtTrangThai' );
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NQT_HOA_DON');
    }
};
