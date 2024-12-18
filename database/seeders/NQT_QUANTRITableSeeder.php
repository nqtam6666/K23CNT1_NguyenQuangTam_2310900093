<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NQT_QUANTRITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('NQT_QUAN_TRI')->insert([
            'nqtTaiKhoan'=>'nguyenquangtam179@gmail.com',
            'nqtMatKHau'=>md5('123456@'),
            'nqtTrangThai'=>'0'
            
        ]);
        DB::table('NQT_QUAN_TRI')->insert([
            'nqtTaiKhoan'=>'0961138440',
            'nqtMatKHau'=>md5('123456@'),
            'nqtTrangThai'=>'0'
        ]);
        
    }
}
