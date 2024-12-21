<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="container my-4">
        <div class="card">
            <div class="card-header text-center">
                Đăng nhập tài khoản quản trị
            </div>
            <div class="card-body">
                <!-- Display Success Message -->
                @if(session('nqt-success'))
                    <div class="alert alert-success"style="font-weight: bold;">
                        {{ session('nqt-success') }}
                    </div>
                @endif
                <!-- Display Error Message -->
                @if(session('nqt-error'))
                    <div class="alert alert-danger">
                        {{ session('nqt-error') }}
                    </div>
                @endif
                <form action="{{route('admin.nqtLoginSubmit')}}" method="POST">
                    @csrf <!-- Include CSRF token -->
                    <div class="mb-3">
                        <label for="nqtusername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="nqtusername" name="nqtusername" value="nguyenquangtam179@gmail.com">
                        @error('nqtusername')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nqtpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="nqtpassword" name="nqtpassword" value="123456@">
                        @error('nqtpassword')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
