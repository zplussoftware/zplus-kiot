@extends('layouts.admin')

@section('title', 'Báo cáo doanh thu')

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Báo cáo doanh thu</h1>
        <div>
            <a href="#" class="btn btn-outline-primary me-2" id="btn-export-excel">
                <i class="bi bi-file-excel me-1"></i> Xuất Excel
            </a>
            <a href="#" class="btn btn-outline-danger" id="btn-export-pdf">
                <i class="bi bi-file-pdf me-1"></i> Xuất PDF
            </a>
        </div>
    </div>

    <!-- Filter Form -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.reports.sales') }}" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label for="start_date" class="form-label">Từ ngày</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $startDate->format('Y-m-d') }}">
                </div>
                <div class="col-md-3">
                    <label for="end_date" class="form-label">Đến ngày</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $endDate->format('Y-m-d') }}">
                </div>
                <div class="col-md-3">
                    <label for="category" class="form-label">Danh mục</label>
                    <select class="form-select" id="category" name="category">
                        <option value="">Tất cả danh mục</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="product" class="form-label">Sản phẩm</label>
                    <select class="form-select" id="product" name="product">
                        <option value="">Tất cả sản phẩm</option>
                        @foreach($products as $prod)
                            <option value="{{ $prod->id }}" {{ request('product') == $prod->id ? 'selected' : '' }}>
                                {{ $prod->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="warehouse" class="form-label">Kho hàng</label>
                    <select class="form-select" id="warehouse" name="warehouse">
                        <option value="">Tất cả kho hàng</option>
                        @foreach($warehouses as $wh)
                            <option value="{{ $wh->id }}" {{ request('warehouse') == $wh->id ? 'selected' : '' }}>
                                {{ $wh->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="user" class="form-label">Nhân viên</label>
                    <select class="form-select" id="user" name="user">
                        <option value="">Tất cả nhân viên</option>
                        @foreach($users as $u)
                            <option value="{{ $u->id }}" {{ request('user') == $u->id ? 'selected' : '' }}>
                                {{ $u->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="group_by" class="form-label">Nhóm theo</label>
                    <select class="form-select" id="group_by" name="group_by">
                        <option value="day" {{ $groupBy == 'day' ? 'selected' : '' }}>Theo ngày</option>
                        <option value="week" {{ $groupBy == 'week' ? 'selected' : '' }}>Theo tuần</option>
                        <option value="month" {{ $groupBy == 'month' ? 'selected' : '' }}>Theo tháng</option>
                        <option value="hour" {{ $groupBy == 'hour' ? 'selected' : '' }}>Theo giờ</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="bi bi-filter me-1"></i> Lọc
                    </button>
                    <a href="{{ route('admin.reports.sales') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle me-1"></i> Xóa bộ lọc
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                        <i class="bi bi-cart3 text-primary fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Tổng đơn hàng</h6>
                        <h2 class="mb-0">{{ number_format($totalOrders) }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                        <i class="bi bi-cash-stack text-success fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Doanh thu</h6>
                        <h2 class="mb-0">{{ number_format($totalRevenue, 0, ',', '.') }} đ</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-info bg-opacity-10 p-3 me-3">
                        <i class="bi bi-graph-up-arrow text-info fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Lợi nhuận</h6>
                        <h2 class="mb-0">{{ number_format($totalProfit, 0, ',', '.') }} đ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Chart -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0">Biểu đồ doanh thu</h5>
        </div>
        <div class="card-body">
            <div style="height: 350px;">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Top Products and Customers -->
    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Sản phẩm bán chạy</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>SKU</th>
                                    <th>Số lượng</th>
                                    <th>Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topProducts as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ number_format($product->quantity) }}</td>
                                        <td>{{ number_format($product->revenue, 0, ',', '.') }} đ</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Khách hàng hàng đầu</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Đơn hàng</th>
                                    <th>Tổng chi tiêu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topCustomers as $customer)
                                    <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ number_format($customer->order_count) }}</td>
                                        <td>{{ number_format($customer->total_spent, 0, ',', '.') }} đ</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Parse sales data from PHP
    const salesData = @json($salesData);
    
    // Prepare data for chart
    const periods = salesData.map(item => item.period);
    const revenues = salesData.map(item => item.revenue);
    const orderCounts = salesData.map(item => item.order_count);
    
    // Create sales chart
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: periods,
            datasets: [
                {
                    label: 'Doanh thu (đ)',
                    data: revenues,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    yAxisID: 'y'
                },
                {
                    label: 'Số đơn hàng',
                    data: orderCounts,
                    type: 'line',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Doanh thu (đ)'
                    },
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('vi-VN').format(value);
                        }
                    }
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Số đơn hàng'
                    },
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    });
    
    // Export to Excel button handler
    document.getElementById('btn-export-excel').addEventListener('click', function(e) {
        e.preventDefault();
        alert('Tính năng xuất Excel sẽ được triển khai trong phiên bản tiếp theo.');
    });
    
    // Export to PDF button handler
    document.getElementById('btn-export-pdf').addEventListener('click', function(e) {
        e.preventDefault();
        alert('Tính năng xuất PDF sẽ được triển khai trong phiên bản tiếp theo.');
    });
});
</script>
@endpush