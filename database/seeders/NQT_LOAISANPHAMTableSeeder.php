<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NQT_LOAISANPHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("NQT_LOAI_SAN_PHAM")->insert([
            'nqtMaLoai'=>'L001',
            'nqtTenLoai'=>'Cây cảnh văn phòng',
            'nqtTrangThai'=> '0',
        ]);
        DB::table("NQT_LOAI_SAN_PHAM")->insert([
            'nqtMaLoai'=>'L002',
            'nqtTenLoai'=>'Cây để bàn',
            'nqtTrangThai'=> '0',
        ]);
        DB::table("NQT_LOAI_SAN_PHAM")->insert([
            'nqtMaLoai'=>'L003',
            'nqtTenLoai'=>'Cây cảnh phong thuỷ',
            'nqtTrangThai'=> '0',
        ]);
        DB::table("NQT_LOAI_SAN_PHAM")->insert([
            'nqtMaLoai'=>'L004',
            'nqtTenLoai'=>'Cây thuỷ canh',
            'nqtTrangThai'=> '0',
        ]);
    }
}
