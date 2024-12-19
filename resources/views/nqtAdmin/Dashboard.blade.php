<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container my-4">
        <!-- Thông báo thành công -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Tiêu đề Dashboard -->
        <h1 class="my-4">Dashboard Admin</h1>

        <!-- Thông tin tổng quan -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tổng người dùng</h4>
                        <p class="card-text">Số lượng người dùng hiện tại: {}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bài viết</h4>
                        <p class="card-text">Số bài viết hiện có: {}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bình luận</h4>
                        <p class="card-text">Số bình luận hiện có: {}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Các liên kết quản lý -->
        <div class="row mt-4">
            <div class="col-md-4">
                <a href="" class="btn btn-primary btn-block">Quản lý người dùng</a>
            </div>
            <div class="col-md-4">
                <a href="" class="btn btn-primary btn-block">Quản lý bài viết</a>
            </div>
            <div class="col-md-4">
                <a href="" class="btn btn-primary btn-block">Quản lý bình luận</a>
            </div>
        </div>
    </div>

</body>
</html>
