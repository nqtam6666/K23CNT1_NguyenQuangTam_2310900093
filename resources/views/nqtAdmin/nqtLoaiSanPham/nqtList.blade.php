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
        <form action="{{ route('nqtadmin.nqtsearchLoaisp') }}" method="GET">
            <div class="row justify-content-end mb-3">
                <div class="col-md-3 col-8 position-relative">
                    <input type="text" class="form-control" id="searchInput" name="search" placeholder="Tìm kiếm loại sản phẩm..." value="{{ request()->query('search') }}">
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
                        <th>Mã Loại</th>
                        <th>Tên Loại</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nqtloaisp as $item)
                        <tr>
                            <td class="text-center">
                                @if ($item instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{ $item->firstItem() + $loop->index }}
                                @else
                                    {{ $loop->index + 1 }}
                                @endif
                            </td>
                            <td>{{$item->nqtMaLoai}}</td>
                            <td>{{$item->nqtTenLoai}}</td>
                            <td>{{$item->nqtTrangThai == 1 ? "Hiển thị" : "Ẩn"}}</td>
                            <td class="text-center">
                                <!-- View Button -->
                                <button class="btn btn-success rounded-circle me-1" onclick="window.location.href='/nqt-admin/nqt-chi-tiet-loai-san-pham/{{$item->id}}'" title="Xem chi tiết">
                                    <i class="fa-solid fa-circle-info"></i>
                                </button>

                                <!-- Edit Button -->
                                <button class="btn btn-primary rounded-circle me-1" onclick="window.location.href='/nqt-admin/nqt-chinh-sua-loai-san-pham/{{$item->id}}'" title="Chỉnh sửa">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button -->
                                <form action="{{ route('nqtadmin.nqtdeleteloaisp', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn chắc chắn muốn xoá loại sản phẩm này?')">
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
    <script>
        document.getElementById('clearSearch').addEventListener('click', function () {
            document.getElementById('searchInput').value = ''; // Xóa nội dung ô tìm kiếm
        });
    </script>


@endsection
