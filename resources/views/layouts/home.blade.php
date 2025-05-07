@extends('layouts.app')

@section('content')
    <!-- Navigation Header -->
    <header class="bg-white shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light container py-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Z-Plus KIOT" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('features') ? 'active' : '' }}" href="{{ route('features') }}">Tính năng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('faq') ? 'active' : '' }}" href="{{ route('faq') }}">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Liên hệ</a>
                        </li>
                        <li class="nav-item ms-lg-3">
                            @guest
                                <a class="btn btn-primary" href="{{ route('login') }}">Đăng nhập</a>
                            @else
                                @if(auth()->user()->hasRole(['Admin', 'Manager']))
                                    <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Quản lý</a>
                                @else
                                    <a class="btn btn-primary" href="{{ route('pos.index') }}">Bán hàng</a>
                                @endif
                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('main-content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Z-Plus KIOT</h5>
                    <p class="text-muted">Hệ thống quản lý bán hàng thông minh dành cho các cửa hàng kinh doanh thiết bị điện tử và dịch vụ bảo hành.</p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4 mb-md-0">
                    <h6>Liên kết</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-muted">Trang chủ</a></li>
                        <li><a href="{{ route('features') }}" class="text-muted">Tính năng</a></li>
                        <li><a href="{{ route('about') }}" class="text-muted">Giới thiệu</a></li>
                        <li><a href="{{ route('faq') }}" class="text-muted">FAQ</a></li>
                        <li><a href="{{ route('contact') }}" class="text-muted">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <h6>Hỗ trợ</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-muted">Hướng dẫn sử dụng</a></li>
                        <li><a href="#" class="text-muted">Chính sách bảo mật</a></li>
                        <li><a href="#" class="text-muted">Điều khoản sử dụng</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Liên hệ</h6>
                    <ul class="list-unstyled text-muted">
                        <li><i class="bi bi-geo-alt me-2"></i> 123 Đường ABC, Quận XYZ, TP. HCM</li>
                        <li><i class="bi bi-telephone me-2"></i> (028) 1234 5678</li>
                        <li><i class="bi bi-envelope me-2"></i> contact@zpluskiot.com</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-muted">&copy; {{ date('Y') }} Z-Plus KIOT. Tất cả quyền được bảo lưu.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <img src="{{ asset('images/payment-methods.png') }}" alt="Payment Methods" height="30">
                </div>
            </div>
        </div>
    </footer>
@endsection