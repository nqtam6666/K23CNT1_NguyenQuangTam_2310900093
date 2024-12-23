@extends('_layouts.admin.master')
@section('title', 'Danh sách tài khoản quản trị')
@section('content-body')
    <div class="container my-4">
        @if (session('message'))
        <div class="alert alert-success"style="font-weight: bold;">
            {{ session('message') }}
        </div>
        @endif
        <div class="row mb-3">
            <h1>Danh sách tài khoản quản trị</h1>
        </div>
        <a href="{{route('nqtadmin.nqtCreateAdmin')}}"><button class="btn btn-success 10px mb-3"> <i class="fa-solid fa-plus"></i> Thêm mới</button></a>
        <div class="row text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nqtALLAdmin as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{$item->nqtTaiKhoan}}</td>
                            <td>{{$item->nqtMatKhau}}</td>
                            <td>{{$item->nqtTrangThai==1?"Hoạt động":"Khoá"}}</td>

                            <td class="text-center">
                                <!-- View Button -->
                                <button class="btn btn-success me-1 rounded-circle" onclick="window.location.href='/nqt-admin/nqt-admin-view/{{$item->id}}'" title="Xem chi tiết">
                                    <i class="fa-solid fa-circle-info"></i>
                                </button>

                                <!-- Edit Button -->
                                <button class="btn btn-primary me-1 rounded-circle" onclick="window.location.href='/nqt-admin/nqt-admin/{{$item->id}}'" title="Chỉnh sửa">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button -->
                                <form action="{{ route('nqtadmin.nqtdeleteadmin', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn chắc chắn muốn xoá loại sản phẩm này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger me-1 rounded-circle" title="Xoá">
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
