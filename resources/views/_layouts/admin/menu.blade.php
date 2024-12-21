<style>
    .rounded-corners {
        border-radius: 15px; /* Điều chỉnh góc bo tròn */
        display: block;
        margin: 20px auto; /* Căn giữa */
    }

    /* Tùy chỉnh các mục trong danh sách */
    .list-group-item {
        border: 1px solid gray;
        border-radius: 10px;
        margin: 5px 0;
        transition: background-color 0.3s ease, transform 0.3s ease;
        overflow: hidden;
        background-color: #f8f9fa; /* Màu nền mặc định */
    }

    /* Toàn bộ nút trở thành clickable */
    .list-group-item a {
        text-decoration: none;
        color: #333;
        display: block;
        width: 100%;
        height: 100%;
        padding: 10px 15px;
        font-size: 1rem;
    }

    /* Hiệu ứng khi hover */
    .list-group-item:hover {
        background-color: rgb(63, 158, 170);
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .list-group-item a:hover {
        color: white; /* Đổi màu chữ khi hover */
    }

    /* Nút ảnh */
    .img-button {
        display: inline-block;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .img-button:hover {
        transform: scale(1.05);
    }
</style>


<a href="{{route('nqtadmin.getSession1')}}" class="img-button">
    <img src="{{ asset('img/meo1.png') }}" alt="Mô tả ảnh" class="rounded-corners w-100 mb-3">
</a>
<ul class="list-group">
    {{-- <li style="color: red; text-align:center;margin-bottom:10px; font-weight:bolder">Chào mừng, {{ $nqtUserAdmin }}</li> --}}

    <li class="list-group-item">
        <a href="{{route('nqtadmin.getSession1')}}">Dashboard</a>
    </li>
    <li class="list-group-item">
        <a href="{{route('nqtadmin.nqtloaisanpham')}}">Danh sách loại sản phẩm</a>
    </li>
    <li class="list-group-item">
        <a href="{{route('nqtadmin.nqtSanPhams')}}">Danh sách sản phẩm</a>
    </li>
    <li class="list-group-item">
        <a href="{{route('nqtadmin.nqtListUser')}}">Danh sách người dùng</a>
    </li>
    <li class="list-group-item">
        <a href="{{route('nqtadmin.nqtListAdmin')}}">Danh sách admin</a>
    </li>
</ul>
