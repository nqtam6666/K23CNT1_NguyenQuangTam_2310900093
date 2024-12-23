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






        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 1000;
            }

            .sidebar-collapse .sidebar {
                transform: translateX(-100%);
            }
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
        </section>
    </section>

    <!-- JS Dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.0.5/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function() {
            // Xử lý sự kiện click nút pushmenu
            $('[data-widget="pushmenu"]').on('click', function(e) {
                e.preventDefault();
                $('#main-container').toggleClass('sidebar-collapse');

                // Lưu trạng thái vào localStorage
                const isSidebarCollapsed = $('#main-container').hasClass('sidebar-collapse');
                localStorage.setItem('sidebarCollapsed', isSidebarCollapsed);
            });

            // Khôi phục trạng thái từ localStorage khi tải trang
            const savedState = localStorage.getItem('sidebarCollapsed');
            if (savedState === 'true') {
                $('#main-container').addClass('sidebar-collapse');
            }

            // Xử lý responsive
            $(window).on('resize', function() {
                if ($(window).width() <= 768) {
                    $('#main-container').addClass('sidebar-collapse');
                }
            });
        });
    </script>

    <script>
        // Get the pushmenu button and the navbar-left-section
        const pushMenuButton = document.querySelector('[data-widget="pushmenu"]');
        const navbarLeftSection = document.querySelector('.navbar-left-section');

        // Add an event listener for the button click
        pushMenuButton.addEventListener('click', function () {
            // Toggle the 'active' class to move the navbar-left-section
            navbarLeftSection.classList.toggle('active');
        });

    </script>
    {{-- <script>
        // Hàm để lấy giá trị của cookie
        function getCookie(cookieName) {
            const cookies = document.cookie.split("; ");
            for (let cookie of cookies) {
                const [name, value] = cookie.split("=");
                if (name === cookieName) {
                    return value;
                }
            }
            return null;
        }

        // Hàm tính toán thời gian còn lại
        function calculateRemainingTime(expiryTime) {
            const currentTime = Date.now();
            return Math.floor((expiryTime - currentTime) / 1000); // Thời gian còn lại (giây)
        }

        // Hàm hiển thị thời gian còn lại
        function displayRemainingTime(cookieName, elementId, maxAgeSeconds) {
            const expiryKey = `${cookieName}_expiry`;
            const cookieValueKey = `${cookieName}_value`;

            // Lấy giá trị cookie hiện tại
            const currentCookieValue = getCookie(cookieName);

            // Kiểm tra cookie mới hay cũ
            let expiryTime = localStorage.getItem(expiryKey);
            let savedCookieValue = localStorage.getItem(cookieValueKey);

            if (!expiryTime || currentCookieValue !== savedCookieValue) {
                // Nếu cookie mới hoặc chưa lưu, thiết lập lại thời gian hết hạn
                expiryTime = Date.now() + maxAgeSeconds * 1000; // Thời gian hết hạn (millisecond)
                localStorage.setItem(expiryKey, expiryTime);
                localStorage.setItem(cookieValueKey, currentCookieValue);
            } else {
                expiryTime = parseInt(expiryTime, 10); // Lấy giá trị từ localStorage
            }

            // Cập nhật thời gian mỗi giây
            const interval = setInterval(() => {
                const remainingTime = calculateRemainingTime(expiryTime);

                if (remainingTime <= 0) {
                    document.getElementById(elementId).innerText = "Cookie đã hết hạn!";
                    clearInterval(interval);
                    localStorage.removeItem(expiryKey);
                    localStorage.removeItem(cookieValueKey);
                } else {
                    document.getElementById(elementId).innerText = `Còn lại: ${remainingTime} giây`;
                }
            }, 1000);
        }

        // Gọi hàm theo dõi cookie khi trang load
        document.addEventListener("DOMContentLoaded", () => {
            // Đặt Max-Age cho cookie bạn muốn theo dõi
            // const maxAgeForSessionCookie = 2592000; // Ví dụ: 30 ngày = 2592000 giây
            displayRemainingTime("laravel_session", "cookie-timer", '');
        });
    </script> --}}
</body>
</html>
