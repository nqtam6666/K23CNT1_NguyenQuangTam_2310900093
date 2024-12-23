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
        <form action="{{ route('nqtadmin.nqtsearchSanPham') }}" method="GET">
            <div class="row justify-content-end mb-3">
                <div class="col-md-3 col-8 position-relative">
                    <input type="text" class="form-control" id="searchInput" name="nqt-search-sp" placeholder="Tìm kiếm loại sản phẩm..." value="{{ request()->query('nqt-search-sp') }}">
                    <button type="button" id="clearSearch" class="btn btn-light position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%); border: none; font-size: 1.3rem; color: rgb(46, 26, 26); cursor: pointer;">
                        &times;
                    </button>
                </div>
                <div class="col-md-2 col-4">
                    <button class="btn btn-primary w-100" type="submit">Tìm kiếm</button>
                </div>
            </div>
        </form>
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
                            <td class="text-center">{{ $loop->iteration }}</td>
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
                                <!-- View Button -->
                                <button class="btn btn-success rounded-circle me-1" onclick="window.location.href='/nqt-admin/nqt-chi-tiet-san-pham/{{$item->id}}'" title="Xem chi tiết">
                                    <i class="fa-solid fa-circle-info"></i>
                                </button>

                                <!-- Edit Button -->
                                <button class="btn btn-primary rounded-circle me-1" onclick="window.location.href='/nqt-admin/nqt-chinh-sua-san-pham/{{$item->id}}'" title="Chỉnh sửa">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button -->
                                <form action="{{ route('nqtadmin.nqtdeletesp', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn chắc chắn muốn xoá loại sản phẩm này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-circle" title="Xoá">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Không có loại sản phẩm nào.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Phân trang -->
        <div class="d-flex justify-content-center">
            {{ $nqtSanPhams->appends(request()->query())->links() }}
        </div>

    </div>
    <script>
        document.getElementById('clearSearch').addEventListener('click', function () {
        document.getElementById('searchInput').value = ''; // Xóa nội dung ô tìm kiếm
        document.querySelector('form').submit(); // Gửi form để hiển thị danh sách đầy đủ
    });

    </script>
@endsection
