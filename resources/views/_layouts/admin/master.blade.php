<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS Dependencies -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>@yield('title')</title>
    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
        }

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            overflow-x: hidden;
        }

        .container-fluid {
            display: flex;
            height: 100vh;
            padding: 0;
            margin: 0;
            max-width: none;
            transition: all 0.3s ease;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: rgb(30, 99, 156);
            height: 100%;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        /* Khi sidebar bị ẩn */
        .sidebar-collapse .sidebar {
            width: 0;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            max-width: 100%;
            transition: all 0.3s ease;
        }

        header {
            height: var(--header-height);
            background: white;
            width: 100%;
            padding: 0.5rem;
            border-bottom: 1px solid #dee2e6;
        }

        .content-body {
            flex: 1;
            padding: 1rem;
            background: #f4f6f9;
            overflow-y: auto;
            overflow-x: hidden;
        }

        footer {
            background-color: #f8f9fa;
            padding: 1rem;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 1000;
            }

            .sidebar-collapse .sidebar {
                transform: translateX(-100%);
            }
        }
        footer {
            background-color: #ffffff;
            padding: 10px; /* Điều chỉnh padding để thay đổi kích thước footer */
            text-align: center;
            border-top: 1px solid #9b9d9e;
            height: 10px; /* Hoặc bạn có thể sử dụng height nếu muốn chiều cao cố định */
        }


    </style>
</head>
<body class="hold-transition">
    <section class="container-fluid" id="main-container">
        <nav class="sidebar">
            @include('_layouts.admin.menu')
        </nav>
        <section class="wrapper">
            <header>
                @include('_layouts.admin.headerTitle')
            </header>
            <section class="content-body">
                @yield('content-body')
            </section>
            <!-- Add footer inside the wrapper section -->
            @include('_layouts.admin.footer')

        </section>
    </section>

    <!-- JS Dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.0.5/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function () {
        $('[data-widget="pushmenu"]').on('click', function (e) {
            e.preventDefault();
            $('#main-container').toggleClass('sidebar-collapse');

            // const isCollapsed = $('#main-container').hasClass('sidebar-collapse');
            // localStorage.setItem('sidebarCollapsed', isCollapsed);
        });

        // const savedState = localStorage.getItem('sidebarCollapsed');
        // if (savedState === 'true') {
        //     $('#main-container').addClass('sidebar-collapse');
        }
    });
    </script>

</body>
</html>
