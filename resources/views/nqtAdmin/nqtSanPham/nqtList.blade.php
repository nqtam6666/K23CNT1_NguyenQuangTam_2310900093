@extends('_layouts.admin.master')
@section('title', 'Danh sách Sản phẩm')
@section('content-body')
    <div class="container my-4">
        @if (session('success'))
        <div class="alert alert-success"style="font-weight: bold;">
            {{ session('success') }}
        </div>
        @endif
        <div class="row mb-3">
            <h1>Danh sách sản phẩm</h1>
        </div>
        <a href="{{route('nqtadmin.nqtCreateSP')}}"><button class="btn btn-success 10px mb-3">Thêm mới</button></a>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>số lượng</th>
                        <th>Đơn giá</th>
                        <th>Mã Loại</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nqtSanPhams as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$item->nqtMaSanPham}}</td>
                            <td>{{$item->nqtTenSanPham}}</td>
                            <td>
                                <img src="{{ asset($item->nqtHinhAnh) }}" alt="Hình ảnh sản phẩm" style="max-width: 300px; height: auto;">
                            </td>
                            <td>{{$item->nqtSoLuong}}</td>
                            <td>{{$item->nqtDonGia}}</td>
                            <td>{{$item->nqtMaLoai}}</td>
                            <td>{{$item->nqtTrangThai==1?"Hiển thị":"Ẩn"}}</td>

                            <td class="text-center">
                                <a href="/nqt-admin/nqt-chi-tiet-san-pham/{{$item->id}}" ><div class="btn btn-success"><i class="fa-solid fa-circle-info"></i></div></a>
                                <a href="/nqt-admin/nqt-chinh-sua-san-pham/{{$item->id}}" ><div class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></div></a>
                                <form action="{{ route('nqtadmin.nqtdeletesp', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn chắc chắn muốn xoá loại sản phẩm này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
