<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NQT_SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of product data
        $products = [
            [
                'nqtMaSanPham' => 'VP001',
                'nqtTenSanPham' => 'Cây phú quý',
                'nqtHinhAnh' => 'images/san-pham/VP001.jpg',
                'nqtSoLuong' => 100,
                'nqtDonGia' => 699000,
                'nqtMaLoai' => 1,
                'nqtTrangThai' => 0,
            ],
            [
                'nqtMaSanPham' => 'VP002',
                'nqtTenSanPham' => 'Cây đại phú gia',
                'nqtHinhAnh' => 'images/san-pham/VP002.jpg',
                'nqtSoLuong' => 200,
                'nqtDonGia' => 550000,
                'nqtMaLoai' => 1,
                'nqtTrangThai' => 0,
            ],
            [
                'nqtMaSanPham' => 'VP003',
                'nqtTenSanPham' => 'Cây hạnh phúc',
                'nqtHinhAnh' => 'images/san-pham/VP003.jpg',
                'nqtSoLuong' => 150,
                'nqtDonGia' => 250000,
                'nqtMaLoai' => 1,
                'nqtTrangThai' => 0,
            ],
            [
                'nqtMaSanPham' => 'VP004',
                'nqtTenSanPham' => 'Cây vạn lộc',
                'nqtHinhAnh' => 'images/san-pham/VP004.jpg',
                'nqtSoLuong' => 300,
                'nqtDonGia' => 799000,
                'nqtMaLoai' => 1,
                'nqtTrangThai' => 0,
            ],
            [
                'nqtMaSanPham' => 'PT001',
                'nqtTenSanPham' => 'Cây thiết mộc lan',
                'nqtHinhAnh' => 'images/san-pham/PT001.jpg',
                'nqtSoLuong' => 150,
                'nqtDonGia' => 590000,
                'nqtMaLoai' => 3,
                'nqtTrangThai' => 0,
            ],
            [
                'nqtMaSanPham' => 'PT002',
                'nqtTenSanPham' => 'Cây trường sinh',
                'nqtHinhAnh' => 'images/san-pham/PT002.jpg',
                'nqtSoLuong' => 100,
                'nqtDonGia' => 150000,
                'nqtMaLoai' => 3,
                'nqtTrangThai' => 0,
            ],
            [
                'nqtMaSanPham' => 'PT003',
                'nqtTenSanPham' => 'Cây hạnh phúc',
                'nqtHinhAnh' => 'images/san-pham/PT003.jpg',
                'nqtSoLuong' => 200,
                'nqtDonGia' => 299000,
                'nqtMaLoai' => 3,
                'nqtTrangThai' => 0,
            ],
            [
                'nqtMaSanPham' => 'PT004',
                'nqtTenSanPham' => 'Cây hoa nhài (Lài ta)',
                'nqtHinhAnh' => 'images/san-pham/PT004.jpg',
                'nqtSoLuong' => 300,
                'nqtDonGia' => 199000,
                'nqtMaLoai' => 3,
                'nqtTrangThai' => 0,
            ],
        ];

        // Insert the data into the database
        DB::table('nqt_san_pham')->insert($products);
    }
}
