@extends('_layouts.admin.master')
@section('title', 'Loại sản phẩm')
@section('content-body')
    <div class="container my-4">
        @if (session('message'))
        <div class="alert alert-success"style="font-weight: bold;">
            {{ session('message') }}
        </div>
        @endif
        <div class="row mb-3">
            <h1>Danh sách loại sản phẩm</h1>
        </div>
        <a href="/nqt-admin/nqt-loai-san-pham/nqt-create"><button class="btn btn-success 10px mb-3">Thêm mới</button></a>

        <!-- Form tìm kiếm -->
        <form action="{{ route('nqtadmin.mqtsearchLoaisp') }}" method="GET">
            <div class="row justify-content-end mb-3">
                <div class="col-md-3 col-8">
                    <input type="text" class="form-control" name="search" placeholder="Tìm kiếm loại sản phẩm..." value="{{ request()->query('search') }}">
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
                        <th>Mã Loại</th>
                        <th>Tên Loại</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nqtloaisp as $item)
                        <tr>
                            <td class="text-center">{{ $nqtloaisp->firstItem() + $loop->index }}</td>
                            <td>{{$item->nqtMaLoai}}</td>
                            <td>{{$item->nqtTenLoai}}</td>
                            <td>{{$item->nqtTrangThai == 1 ? "Hiển thị" : "Ẩn"}}</td>
                            <td class="text-center">
                                <a href="/nqt-admin/nqt-chi-tiet-loai-san-pham/{{$item->id}}">
                                    <div class="btn btn-success"><i class="fa-solid fa-circle-info"></i></div>
                                </a>
                                <a href="/nqt-admin/nqt-chinh-sua-loai-san-pham/{{$item->id}}">
                                    <div class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></div>
                                </a>
                                <form action="{{ route('nqtadmin.nqtdeleteloaisp', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn chắc chắn muốn xoá loại sản phẩm này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Không có loại sản phẩm nào.</td>
                        </tr>
                    @endforelse
                </tbody>


            </table>
        </div>

        <!-- Phân trang -->
        <div class="d-flex justify-content-center">
            {{ $nqtloaisp->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>

    </div>
@endsection
