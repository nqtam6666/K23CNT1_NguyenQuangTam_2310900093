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
        Schema::create('NQT_KHACH_HANG', function (Blueprint $table) {
            $table->id();
            $table->string('nqtMaKhachHang',255)->unique();
            $table->string('nqtHoTenKhachHang',255);
            $table->string('nqtEmail',255)->unique();
            $table->string('nqtMatKhau',255);
            $table->string('nqtDienThoai',10)->unique();
            $table->string('nqtDiaChi',255);
            $table->dateTime('nqtNgayDangKy');
            $table->tinyInteger('nqtTrangThai');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NQT_KHACH_HANG');
    }
};
