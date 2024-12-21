@extends('_layouts.admin.master')
@section('title', 'Danh sách người dùng')
@section('content-body')
    <div class="container my-4">
        @if (session('message'))
        <div class="alert alert-success"style="font-weight: bold;">
            {{ session('message') }}
        </div>
        @endif
        <div class="row mb-3">
            <h1>Danh sách người dùng</h1>
        </div>
        <a href="{{route('nqtadmin.nqtCreateAdmin')}}"><button class="btn btn-success 10px mb-3">Thêm mới</button></a>
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
                            <td>{{$item->nqtTrangThai==1?"Hiển thị":"Ẩn"}}</td>

                            <td class="text-center">
                                <a href="/nqt-admin/nqt-admin-view/{{$item->id}}" ><div class="btn btn-success"><i class="fa-solid fa-circle-info"></i></div></a>
                                <a href="/nqt-admin/nqt-admin/{{$item->id}}" ><div class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></div></a>
                                <form action="{{ route('nqtadmin.nqtdeleteadmin', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn chắc chắn muốn xoá loại sản phẩm này?')">
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
