


<nav class="main-header navbar navbar-expand navbar-light d-flex justify-content-between">
    <!-- Left Side -->
    <div class="navbar-left-section px-0 ml-0">
        <!-- Nút pushmenu -->
        <a class="nav-link px-3" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i>
        </a>

        <!-- Search Form -->
        <form class="form-inline ml-3 mt-1 d-none d-md-flex" style="margin-left: 0;">
            <div class="input-group">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    {{-- <p id="cookie-timer"></p> --}}
    <!-- Right Side -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dtopdown">
            <div href="#" class="nqtchaomung">Chào mừng, <span style="color: red">{{ $nqtUserAdmin }}</span></div>
        </li>
        <li class="nav-item dtopdown">
            <div>
                <div class="logout-btn">
                    <a class="nav-link d-flex align-items-center" href="{{ route('nqtadmin.deleSession1') }}">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        <span>Đăng xuất</span>
                    </a>
                </div>
            </div>
        </li>
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown mt-2">
            <a class="nav-link position-relative" data-bs-toggle="dropdown" href="#">
                <i class="far fa-comments hover-icon"></i>
                <span class="badge badge-pulse badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end animate slideIn">
                <div class="dropdown-header d-flex justify-content-between align-items-center">
                    <span>Messages</span>
                    <span class="badge bg-danger rounded-pill">3 New</span>
                </div>
                <a href="#" class="dropdown-item hover-effect">
                    <div class="media p-2">
                        <div class="media-body">
                            <h3 class="dropdown-item-title mb-1">
                                John Pierce
                                <span class="float-end text-sm text-muted">
                                    <i class="fas fa-star text-warning"></i>
                                </span>
                            </h3>
                            <p class="text-sm mb-1">I got your message</p>
                            <p class="text-xs text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer hover-effect">See All Messages</a>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown mt-2">
            <a class="nav-link position-relative" data-bs-toggle="dropdown" href="#">
                <i class="far fa-bell hover-icon"></i>
                <span class="badge badge-pulse badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end animate slideIn">
                <div class="dropdown-header d-flex justify-content-between align-items-center">
                    <span>Notifications</span>
                    <span class="badge bg-warning rounded-pill">15 New</span>
                </div>
                <a href="#" class="dropdown-item hover-effect">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-envelope me-2 text-primary"></i>
                        <div>
                            <p class="text-sm mb-0">4 new messages</p>
                            <span class="text-xs text-muted">3 mins ago</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer hover-effect">See All Notifications</a>
            </div>
        </li>
    </ul>
</nav>

<style>
.main-header {
    top:-8px;
    /* left: -250px; */
    display: flex;
    padding: 0;
    margin: 0;
    border-bottom: 1px solid #dee2e6;
    background-color: #fff;
}

.navbar {
    padding: 0;
    min-height: 60px;
}

.navbar-left-section {
    display: flex;
    align-items: center;
    transition: margin-left 0.3s ease;
    margin-left: -250px !important;  /* Giữ nguyên vị trí ban đầu */
    padding-left: 0 !important;
}

/* Khi sidebar collapse */
.sidebar-collapse .navbar-left-section {
    margin-left: -10px !important;  /* Di chuyển sang phải 200px khi collapse */
}

.nav-link[data-widget="pushmenu"] {
    padding: 0.5rem 1rem;
    margin-left: 0.5rem;
}

.nav-link[data-widget="pushmenu"]:hover {
    background-color: rgba(0,0,0,0.1);
    border-radius: 4px;
}

.navbar-badge {
    position: absolute;
    top: 3px;
    right: 3px;
    font-size: .6rem;
    font-weight: 300;
    padding: 2px 4px;
    border-radius: 50%;
}

.dropdown-menu {
    padding: 0;
    border-radius: 0.25rem;
    width: 300px;
}

.dropdown-menu-lg {
    min-width: 280px;
    max-width: 300px;
}

.dropdown-item {
    padding: 0.5rem 1rem;
}

.dropdown-footer {
    background-color: #f8f9fa;
    border-bottom-left-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    text-align: center;
}
.nqtchaomung{
    text-decoration: none;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif ;
    font-weight: bolder;
    margin-top: 14px;
    margin-right: 5px
}
/* Dropdown styling */
.dropdown-menu {
    padding: 0;
    border-radius: 8px;
    border: none;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    overflow: hidden;
}

.dropdown-menu-lg {
    min-width: 300px;
}

.dropdown-header {
    background-color: #f8f9fa;
    padding: 0.75rem 1rem;
    font-weight: 600;
    border-bottom: 1px solid rgba(0,0,0,.05);
}

.dropdown-item {
    padding: 0.5rem 1rem;
    transition: all 0.2s ease;
}

.hover-effect:hover {
    background-color: #f8f9fa;
    transform: translateX(3px);
}

.dropdown-footer {
    background-color: #f8f9fa;
    text-align: center;
    font-weight: 500;
    padding: 0.75rem;
}

/* Badge styling */
.navbar-badge {
    font-size: 0.65rem;
    padding: 2px 4px;
    right: 3px;
    top: 3px;
    font-weight: 500;
}

.badge-pulse {
    animation: pulse 2s infinite;
}

/* Icon hover effect */
.hover-icon {
    transition: transform 0.2s ease;
}

.nav-link:hover .hover-icon {
    transform: scale(1.1);
}

/* Dropdown animation */
.animate {
    animation-duration: 0.3s;
    animation-fill-mode: both;
}

.slideIn {
    animation-name: slideIn;
}

@keyframes slideIn {
    0% {
        transform: translateY(1rem);
        opacity: 0;
    }
    100% {
        transform: translateY(0rem);
        opacity: 1;
    }
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.4);
    }
    70% {
        box-shadow: 0 0 0 6px rgba(220, 53, 69, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(220, 53, 69, 0);
    }
}

/* Đảm bảo text rõ ràng */
.text-sm {
    font-size: 0.875rem;
}

.text-xs {
    font-size: 0.75rem;
}

/* Media body spacing */
.media-body {
    padding: 0.25rem 0;
}
/* Styling cho nút đăng xuất */
.logout-btn {
    margin: 8px 15px;
    position: relative;
    overflow: hidden;
    background: linear-gradient(45deg, #dc3545, #ff4757);
    border-radius: 6px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(220, 53, 69, 0.2);
}

.logout-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
    background: linear-gradient(45deg, #ff4757, #dc3545);
}

.logout-btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 5px rgba(220, 53, 69, 0.2);
}

.logout-btn a {
    color: white !important;
    font-weight: 500;
    padding: 10px 20px;
    text-transform: uppercase;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
    text-decoration: none;
}

.logout-btn a i {
    transition: transform 0.3s ease;
}

.logout-btn:hover a i {
    transform: translateX(3px);
}

/* Hiệu ứng ripple khi click */
.logout-btn::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 5px;
    height: 5px;
    background: rgba(255, 255, 255, .5);
    opacity: 0;
    border-radius: 100%;
    transform: scale(1, 1) translate(-50%);
    transform-origin: 50% 50%;
}

.logout-btn:focus:not(:active)::after {
    animation: ripple 1s ease-out;
}

@keyframes ripple {
    0% {
        transform: scale(0, 0);
        opacity: 0.5;
    }
    20% {
        transform: scale(25, 25);
        opacity: 0.3;
    }
    100% {
        opacity: 0;
        transform: scale(40, 40);
    }
}
</style>
