@extends('layouts.app')

@section('content')
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white" style="width: 280px; min-height: 100vh;">
            <div class="d-flex align-items-center p-3 border-bottom border-secondary">
                <img src="{{ asset('images/logo-white.png') }}" alt="Z-Plus KIOT" height="40">
                <span class="ms-3 fs-5">Admin Panel</span>
            </div>
            <div class="p-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active bg-primary' : '' }}">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.products.index') }}" class="nav-link text-white {{ request()->routeIs('admin.products.*') ? 'active bg-primary' : '' }}">
                            <i class="bi bi-box me-2"></i> Sản phẩm
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link text-white {{ request()->routeIs('admin.categories.*') ? 'active bg-primary' : '' }}">
                            <i class="bi bi-tags me-2"></i> Danh mục
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.orders.index') }}" class="nav-link text-white {{ request()->routeIs('admin.orders.*') ? 'active bg-primary' : '' }}">
                            <i class="bi bi-cart3 me-2"></i> Đơn hàng
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.customers.index') }}" class="nav-link text-white {{ request()->routeIs('admin.customers.*') ? 'active bg-primary' : '' }}">
                            <i class="bi bi-people me-2"></i> Khách hàng
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.suppliers.index') }}" class="nav-link text-white {{ request()->routeIs('admin.suppliers.*') ? 'active bg-primary' : '' }}">
                            <i class="bi bi-truck me-2"></i> Nhà cung cấp
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.warehouses.index') }}" class="nav-link text-white {{ request()->routeIs('admin.warehouses.*') ? 'active bg-primary' : '' }}">
                            <i class="bi bi-building me-2"></i> Kho hàng
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.warranties.index') }}" class="nav-link text-white {{ request()->routeIs('admin.warranties.*') ? 'active bg-primary' : '' }}">
                            <i class="bi bi-shield-check me-2"></i> Bảo hành
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.reports.sales') }}" class="nav-link text-white {{ request()->routeIs('admin.reports.*') ? 'active bg-primary' : '' }}">
                            <i class="bi bi-graph-up me-2"></i> Báo cáo
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.users.index') }}" class="nav-link text-white {{ request()->routeIs('admin.users.*') ? 'active bg-primary' : '' }}">
                            <i class="bi bi-person me-2"></i> Người dùng
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.roles.index') }}" class="nav-link text-white {{ request()->routeIs('admin.roles.*') ? 'active bg-primary' : '' }}">
                            <i class="bi bi-person-badge me-2"></i> Vai trò
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="{{ route('admin.settings.store') }}" class="nav-link text-white {{ request()->routeIs('admin.settings.*') ? 'active bg-primary' : '' }}">
                            <i class="bi bi-gear me-2"></i> Cài đặt
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-grow-1">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-sm" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    
                    <div class="d-flex align-items-center ms-auto">
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/avatar-placeholder.png') }}" alt="Avatar" width="32" height="32" class="rounded-circle me-2">
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end text-small shadow" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                                <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                            Đăng xuất
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="container-fluid p-4">
                @yield('admin-content')
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar toggle functionality
            const sidebarToggle = document.getElementById('sidebarToggle');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    document.querySelector('.bg-dark').classList.toggle('collapsed');
                });
            }
        });
    </script>
    @endpush
@endsection