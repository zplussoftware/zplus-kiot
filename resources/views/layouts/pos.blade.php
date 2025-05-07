@extends('layouts.app')

@section('content')
    <div class="d-flex min-vh-100">
        <!-- Left Sidebar - Product Categories -->
        <div class="bg-dark text-white" style="width: 250px;">
            <div class="d-flex align-items-center p-3 border-bottom border-secondary">
                <img src="{{ asset('images/logo-white.png') }}" alt="Z-Plus KIOT" height="35">
                <span class="ms-2 fs-5">POS</span>
            </div>
            
            <!-- Shift Info Panel -->
            <div class="bg-secondary bg-opacity-25 p-3 border-bottom border-secondary">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-light">Ca hiện tại:</span>
                    <span class="badge bg-success">Đang mở</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-light">Nhân viên:</span>
                    <span class="text-white">{{ Auth::user()->name }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-light">Thời gian:</span>
                    <span class="text-white" id="currentTime">12:00:00</span>
                </div>
                <div class="d-grid gap-2 mt-3">
                    <a href="{{ route('pos.shifts.close') }}" class="btn btn-danger btn-sm">Đóng ca</a>
                </div>
            </div>
            
            <!-- Categories Navigation -->
            <div class="p-3">
                <h6 class="text-uppercase text-muted mb-3">Danh mục sản phẩm</h6>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('pos.products.index') }}" class="nav-link text-white active rounded py-2">
                            <i class="bi bi-grid me-2"></i> Tất cả sản phẩm
                        </a>
                    </li>
                    <!-- Dynamically generate categories -->
                    <li class="nav-item mb-2">
                        <a href="{{ route('pos.products.category', 1) }}" class="nav-link text-white rounded py-2">
                            <i class="bi bi-phone me-2"></i> Điện thoại
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('pos.products.category', 2) }}" class="nav-link text-white rounded py-2">
                            <i class="bi bi-laptop me-2"></i> Laptop
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('pos.products.category', 3) }}" class="nav-link text-white rounded py-2">
                            <i class="bi bi-headset me-2"></i> Phụ kiện
                        </a>
                    </li>
                </ul>
                
                <h6 class="text-uppercase text-muted mb-3 mt-4">Thao tác</h6>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('pos.orders.index') }}" class="nav-link text-white rounded py-2">
                            <i class="bi bi-receipt me-2"></i> Lịch sử hóa đơn
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('pos.shifts.report') }}" class="nav-link text-white rounded py-2">
                            <i class="bi bi-file-earmark-text me-2"></i> Báo cáo ca
                        </a>
                    </li>
                </ul>
                
                <div class="d-grid gap-2 mt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light w-100">
                            <i class="bi bi-box-arrow-left me-2"></i> Đăng xuất
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Main Content Area -->
        <div class="flex-grow-1 d-flex flex-column bg-light">
            <!-- Search Bar -->
            <div class="bg-white border-bottom p-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('pos.products.search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm, mã vạch..." name="q">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-secondary" type="button" id="holdOrderButton">
                                    <i class="bi bi-pause-circle"></i> Tạm dừng
                                </button>
                                <button class="btn btn-outline-secondary" type="button" id="recallOrderButton">
                                    <i class="bi bi-arrow-repeat"></i> Khôi phục
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="flex-grow-1">
                @yield('pos-content')
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Update current time every second
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString();
            document.getElementById('currentTime').textContent = timeString;
        }
        
        setInterval(updateTime, 1000);
        updateTime(); // Initial call
        
        // Hold order functionality
        document.getElementById('holdOrderButton')?.addEventListener('click', function() {
            // Implement hold order functionality here
            window.location.href = "{{ route('pos.cart.hold') }}";
        });
        
        // Recall order functionality
        document.getElementById('recallOrderButton')?.addEventListener('click', function() {
            // Show modal with held orders
            // To be implemented
        });
    </script>
    @endpush
@endsection