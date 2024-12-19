<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nqtAdminDashboardController extends Controller
{
    // Hiển thị trang dashboard admin
    public function index()
    {
        // Lấy tổng số người dùng, bài viết, và bình luận
        // $totalUsers = User::count();
        // $totalPosts = Post::count();
        // $totalComments = Comment::count();

        // Trả về view dashboard và truyền dữ liệu vào view
        return view('admin.dashboard', compact('totalUsers', 'totalPosts', 'totalComments'));
    }
}
