@extends('layouts.admin')

@section('title', 'Dashboard')

@section('admin-content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div>
            <span class="me-2">{{ now()->format('d/m/Y') }}</span>
            <button class="btn btn-sm btn-outline-secondary" id="refresh-data">
                <i class="bi bi-arrow-clockwise me-1"></i> Làm mới
            </button>
        </div>
    </div>

    <!-- Overview Stats -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-primary">
                            <i class="bi bi-cart3 fs-1"></i>
                        </div>
                        <div class="bg-primary bg-opacity-10 rounded-pill px-3 py-1 small">Hôm nay</div>
                    </div>
                    <h5 class="card-title mb-1">Doanh số hôm nay</h5>
                    <h3 class="mb-0 fw-bold">4,589,000đ</h3>
                    <div class="mt-2 small text-success">
                        <i class="bi bi-arrow-up"></i> 12.5% so với hôm qua
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-success">
                            <i class="bi bi-receipt fs-1"></i>
                        </div>
                        <div class="bg-success bg-opacity-10 rounded-pill px-3 py-1 small">Hôm nay</div>
                    </div>
                    <h5 class="card-title mb-1">Tổng đơn hàng</h5>
                    <h3 class="mb-0 fw-bold">24</h3>
                    <div class="mt-2 small text-success">
                        <i class="bi bi-arrow-up"></i> 8.3% so với hôm qua
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-info">
                            <i class="bi bi-people fs-1"></i>
                        </div>
                        <div class="bg-info bg-opacity-10 rounded-pill px-3 py-1 small">Tháng này</div>
                    </div>
                    <h5 class="card-title mb-1">Khách hàng mới</h5>
                    <h3 class="mb-0 fw-bold">58</h3>
                    <div class="mt-2 small text-success">
                        <i class="bi bi-arrow-up"></i> 15.2% so với tháng trước
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-warning">
                            <i class="bi bi-shield-check fs-1"></i>
                        </div>
                        <div class="bg-warning bg-opacity-10 rounded-pill px-3 py-1 small">Tuần này</div>
                    </div>
                    <h5 class="card-title mb-1">Bảo hành mới</h5>
                    <h3 class="mb-0 fw-bold">12</h3>
                    <div class="mt-2 small text-danger">
                        <i class="bi bi-arrow-down"></i> 5.2% so với tuần trước
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Chart & Product Stats -->
    <div class="row g-4 mb-4">
        <div class="col-xl-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Biểu đồ doanh thu</h5>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-outline-secondary active">7 ngày</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">30 ngày</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Năm</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div style="height: 350px;">
                        <!-- Sales chart placeholder - would be populated with actual chart library in real implementation -->
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <p class="text-muted">Biểu đồ doanh thu sẽ được hiển thị tại đây</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Sản phẩm bán chạy</h5>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-primary">Xem tất cả</a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/products/phone-1.jpg') }}" alt="Product" class="rounded" width="50" height="50">
                                <div class="ms-3">
                                    <h6 class="mb-0">iPhone 14 Pro Max</h6>
                                    <small class="text-muted">SKU: IP14PM-256-BLACK</small>
                                </div>
                            </div>
                            <span class="badge bg-success">124 đã bán</span>
                        </li>
                        <li class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/products/laptop-1.jpg') }}" alt="Product" class="rounded" width="50" height="50">
                                <div class="ms-3">
                                    <h6 class="mb-0">MacBook Pro M2</h6>
                                    <small class="text-muted">SKU: MBP-M2-512-SILVER</small>
                                </div>
                            </div>
                            <span class="badge bg-success">87 đã bán</span>
                        </li>
                        <li class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/products/earbuds-1.jpg') }}" alt="Product" class="rounded" width="50" height="50">
                                <div class="ms-3">
                                    <h6 class="mb-0">AirPods Pro 2</h6>
                                    <small class="text-muted">SKU: APP2-WHITE</small>
                                </div>
                            </div>
                            <span class="badge bg-success">65 đã bán</span>
                        </li>
                        <li class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/products/watch-1.jpg') }}" alt="Product" class="rounded" width="50" height="50">
                                <div class="ms-3">
                                    <h6 class="mb-0">Apple Watch Series 8</h6>
                                    <small class="text-muted">SKU: AWS8-45-BLACK</small>
                                </div>
                            </div>
                            <span class="badge bg-success">42 đã bán</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders & Low Stock -->
    <div class="row g-4">
        <div class="col-xl-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Đơn hàng gần đây</h5>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary">Xem tất cả</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Mã đơn</th>
                                    <th>Khách hàng</th>
                                    <th>Ngày tạo</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ORD-2023-1245</td>
                                    <td>Nguyễn Văn A</td>
                                    <td>07/05/2025 10:23</td>
                                    <td>1,290,000đ</td>
                                    <td><span class="badge bg-success">Hoàn thành</span></td>
                                    <td><a href="#" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>#ORD-2023-1244</td>
                                    <td>Trần Thị B</td>
                                    <td>07/05/2025 09:45</td>
                                    <td>24,590,000đ</td>
                                    <td><span class="badge bg-warning text-dark">Đang xử lý</span></td>
                                    <td><a href="#" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>#ORD-2023-1243</td>
                                    <td>Lê Văn C</td>
                                    <td>06/05/2025 16:30</td>
                                    <td>2,790,000đ</td>
                                    <td><span class="badge bg-info">Đang giao</span></td>
                                    <td><a href="#" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>#ORD-2023-1242</td>
                                    <td>Phạm Thị D</td>
                                    <td>06/05/2025 14:15</td>
                                    <td>790,000đ</td>
                                    <td><span class="badge bg-success">Hoàn thành</span></td>
                                    <td><a href="#" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>#ORD-2023-1241</td>
                                    <td>Hoàng Văn E</td>
                                    <td>06/05/2025 11:05</td>
                                    <td>31,490,000đ</td>
                                    <td><span class="badge bg-danger">Đã hủy</span></td>
                                    <td><a href="#" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Sản phẩm sắp hết hàng</h5>
                        <a href="{{ route('admin.products.stock') }}" class="btn btn-sm btn-outline-primary">Xem tất cả</a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/products/phone-2.jpg') }}" alt="Product" class="rounded" width="50" height="50">
                                <div class="ms-3">
                                    <h6 class="mb-0">Samsung Galaxy S23</h6>
                                    <small class="text-muted">SKU: SGS23-256-BLACK</small>
                                </div>
                            </div>
                            <span class="badge bg-danger">2 còn lại</span>
                        </li>
                        <li class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/products/tablet-1.jpg') }}" alt="Product" class="rounded" width="50" height="50">
                                <div class="ms-3">
                                    <h6 class="mb-0">iPad Air 5</h6>
                                    <small class="text-muted">SKU: IPA5-64-BLUE</small>
                                </div>
                            </div>
                            <span class="badge bg-danger">3 còn lại</span>
                        </li>
                        <li class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/products/adapter-1.jpg') }}" alt="Product" class="rounded" width="50" height="50">
                                <div class="ms-3">
                                    <h6 class="mb-0">Sạc Apple 20W</h6>
                                    <small class="text-muted">SKU: AC-20W-WHITE</small>
                                </div>
                            </div>
                            <span class="badge bg-warning text-dark">5 còn lại</span>
                        </li>
                        <li class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/products/cable-1.jpg') }}" alt="Product" class="rounded" width="50" height="50">
                                <div class="ms-3">
                                    <h6 class="mb-0">Cáp USB-C to Lightning</h6>
                                    <small class="text-muted">SKU: CB-USBC-LIGHT-1M</small>
                                </div>
                            </div>
                            <span class="badge bg-warning text-dark">8 còn lại</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Refresh dashboard data
            document.getElementById('refresh-data').addEventListener('click', function() {
                // In a real application, this would make AJAX calls to refresh the data
                alert('Đang cập nhật dữ liệu dashboard...');
            });
        });
    </script>
    @endpush
@endsection