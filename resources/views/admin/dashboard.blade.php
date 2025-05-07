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
                    <h3 class="mb-0 fw-bold">{{ number_format($todaySales, 0, ',', '.') }}đ</h3>
                    <div class="mt-2 small {{ $salesGrowth >= 0 ? 'text-success' : 'text-danger' }}">
                        <i class="bi {{ $salesGrowth >= 0 ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i> 
                        {{ number_format(abs($salesGrowth), 1) }}% so với hôm qua
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
                    <h3 class="mb-0 fw-bold">{{ $todayOrders }}</h3>
                    <div class="mt-2 small {{ $ordersGrowth >= 0 ? 'text-success' : 'text-danger' }}">
                        <i class="bi {{ $ordersGrowth >= 0 ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i> 
                        {{ number_format(abs($ordersGrowth), 1) }}% so với hôm qua
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
                    <h3 class="mb-0 fw-bold">{{ $newCustomers }}</h3>
                    <div class="mt-2 small {{ $customersGrowth >= 0 ? 'text-success' : 'text-danger' }}">
                        <i class="bi {{ $customersGrowth >= 0 ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i> 
                        {{ number_format(abs($customersGrowth), 1) }}% so với tháng trước
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
                    <h3 class="mb-0 fw-bold">{{ $newWarranties }}</h3>
                    <div class="mt-2 small {{ $warrantiesGrowth >= 0 ? 'text-success' : 'text-danger' }}">
                        <i class="bi {{ $warrantiesGrowth >= 0 ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i> 
                        {{ number_format(abs($warrantiesGrowth), 1) }}% so với tuần trước
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
                            <button type="button" class="btn btn-sm btn-outline-secondary active" data-period="7days">7 ngày</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-period="30days">30 ngày</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-period="year">Năm</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div style="height: 350px;">
                        <canvas id="salesChart"></canvas>
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
                        @forelse($bestSellingProducts as $product)
                            <li class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    @if($product->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $product->images->first()->path) }}" alt="{{ $product->name }}" class="rounded" width="50" height="50">
                                    @else
                                        <div class="rounded bg-light d-flex align-items-center justify-content-center" style="width: 50px; height: 50px">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="ms-3">
                                        <h6 class="mb-0">{{ $product->name }}</h6>
                                        <small class="text-muted">SKU: {{ $product->sku }}</small>
                                    </div>
                                </div>
                                <span class="badge bg-success">{{ $product->total_sold }} đã bán</span>
                            </li>
                        @empty
                            <li class="list-group-item px-0 py-3 text-center">
                                <p class="text-muted mb-0">Chưa có dữ liệu sản phẩm bán chạy</p>
                            </li>
                        @endforelse
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
                                @forelse($recentOrders as $order)
                                    <tr>
                                        <td>#{{ $order->order_number }}</td>
                                        <td>{{ $order->customer ? $order->customer->name : 'Khách lẻ' }}</td>
                                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ number_format($order->total_amount, 0, ',', '.') }}đ</td>
                                        <td>
                                            @if($order->status == 'completed')
                                                <span class="badge bg-success">Hoàn thành</span>
                                            @elseif($order->status == 'processing')
                                                <span class="badge bg-warning text-dark">Đang xử lý</span>
                                            @elseif($order->status == 'shipping')
                                                <span class="badge bg-info">Đang giao</span>
                                            @elseif($order->status == 'cancelled')
                                                <span class="badge bg-danger">Đã hủy</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                        <td><a href="#" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">Chưa có đơn hàng nào</td>
                                    </tr>
                                @endforelse
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
                        @forelse($lowStockProducts as $product)
                            <li class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    @if($product->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $product->images->first()->path) }}" alt="{{ $product->name }}" class="rounded" width="50" height="50">
                                    @else
                                        <div class="rounded bg-light d-flex align-items-center justify-content-center" style="width: 50px; height: 50px">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="ms-3">
                                        <h6 class="mb-0">{{ $product->name }}</h6>
                                        <small class="text-muted">SKU: {{ $product->sku }}</small>
                                    </div>
                                </div>
                                <span class="badge {{ $product->total_stock <= 5 ? 'bg-danger' : 'bg-warning text-dark' }}">
                                    {{ $product->total_stock }} còn lại
                                </span>
                            </li>
                        @empty
                            <li class="list-group-item px-0 py-3 text-center">
                                <p class="text-muted mb-0">Không có sản phẩm nào sắp hết hàng</p>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sales chart initialization
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($salesChart['labels']) !!},
                    datasets: [{
                        label: 'Doanh thu',
                        data: {!! json_encode($salesChart['data']) !!},
                        backgroundColor: 'rgba(78, 115, 223, 0.05)',
                        borderColor: 'rgba(78, 115, 223, 1)',
                        pointRadius: 3,
                        pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                        pointBorderColor: 'rgba(78, 115, 223, 1)',
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                        pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let value = context.raw;
                                    return 'Doanh thu: ' + new Intl.NumberFormat('vi-VN').format(value) + 'đ';
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            ticks: {
                                callback: function(value) {
                                    if (value >= 1000000) {
                                        return (value / 1000000).toFixed(1) + 'tr';
                                    }
                                    return new Intl.NumberFormat('vi-VN').format(value);
                                }
                            }
                        }
                    }
                }
            });

            // Period buttons for chart
            document.querySelectorAll('[data-period]').forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    document.querySelectorAll('[data-period]').forEach(btn => {
                        btn.classList.remove('active');
                    });
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Send AJAX request to get data for selected period
                    const period = this.getAttribute('data-period');
                    
                    // In a real application, you would fetch data from server via AJAX
                    // For now, we'll just display an alert
                    alert('Đang tải dữ liệu cho ' + period);
                    
                    // Here you would normally update the chart with new data
                    // salesChart.data.labels = newLabels;
                    // salesChart.data.datasets[0].data = newData;
                    // salesChart.update();
                });
            });

            // Refresh dashboard data
            document.getElementById('refresh-data').addEventListener('click', function() {
                // In a real application, this would make AJAX calls to refresh the data
                window.location.reload();
            });
        });
    </script>
    @endpush
@endsection