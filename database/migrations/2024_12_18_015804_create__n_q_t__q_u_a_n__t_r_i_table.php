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
        Schema::create('NQT_QUAN_TRI', function (Blueprint $table) {
            $table->id();
            $table->string('nqtTaiKhoan',255)->unique();
            $table->string('nqtMatKhau',255);
            $table->tinyInteger('nqtTrangThai');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NQT_QUAN_TRI');
    }
};
