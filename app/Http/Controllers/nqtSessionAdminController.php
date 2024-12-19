<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nqtSessionAdminController extends Controller
{
    public function getSessionData(Request $request)
    {
        // Debug the full session array
        // var_dump($request->session()->all());

        // Check if the 'admin' key exists and contains the 'id'
        if ($request->session()->has('admin.id')) {
            return view('nqtAdmin.Dashboard');
        } else {
            echo "<h2> Không có dữ liệu trong session </h2>";
        }
    }

    #Lưu dữ liệu vào session
    public function storeSessionData(Request $request)
    {
        $request->session()->put('name','nqtam');
        echo "<h2> Dữ liệu đã được lưu và session </h2>";
    }

    #Xóa dữ liệu trong session
    public function deleteSessionData(Request $request)
    {
        // Xóa session với khóa 'admin.id'
        $request->session()->forget('admin');

        // Thông báo dữ liệu đã được xóa khỏi session
        echo "<h2> Dữ liệu đã được xóa khỏi session </h2>";

        // Chuyển hướng về trang login
        return redirect('/admin');
    }

}
