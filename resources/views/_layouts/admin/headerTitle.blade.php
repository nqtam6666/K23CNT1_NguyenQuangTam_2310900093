


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


    <!-- Right Side -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dtopdown">
            <div href="#" class="nqtchaomung">Chào mừng, <span style="color: red">{{ $nqtUserAdmin }}</span></div>
        </li>
        <li class="nav-item dtopdown">
            <div>
                <div class="btn btn-danger"><a class="nav-link" href="{{route('nqtadmin.deleSession1')}}"><strong style="color:white">Đăng xuất</strong></a></div>
            </div>
        </li>
        <li class="nav-item dropdown mt-2">
            <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-end text-sm text-muted">
                                    <i class="fas fa-star"></i>
                                </span>
                            </h3>
                            <p class="text-sm">I got your message</p>
                            <p class="text-sm text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown mt-2">
            <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope me-2"></i> 4 new messages
                    <span class="float-end text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
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
    transition: margin-left 0.3s ease; /* Adds a smooth transition effect */
    margin-left: -250px !important;   /* Removes left margin */
    padding-left: 0 !important;  /* Removes left padding */
}

.navbar-left-section.active {
    margin-left: 0px !important; /* When 'active' class is added, move to the right */
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

</style>
