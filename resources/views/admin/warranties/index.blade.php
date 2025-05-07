@extends('layouts.admin')

@section('title', 'Quản lý bảo hành')

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý bảo hành</h1>
        <a href="{{ route('admin.warranties.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Thêm bảo hành mới
        </a>
    </div>

    <!-- Filter and Search -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.warranties.index') }}" method="GET" class="row g-3">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Tìm theo khách hàng, sản phẩm, số serial" value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-select">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Đang hiệu lực</option>
                        <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Đã hết hạn</option>
                        <option value="voided" {{ request('status') == 'voided' ? 'selected' : '' }}>Đã hủy</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" name="start_date" class="form-control" placeholder="Từ ngày" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-2">
                    <input type="date" name="end_date" class="form-control" placeholder="Đến ngày" value="{{ request('end_date') }}">
                </div>
                <div class="col-md-1">
                    <a href="{{ route('admin.warranties.index') }}" class="btn btn-outline-secondary w-100" title="Xóa bộ lọc">
                        <i class="bi bi-x-lg"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Warranty List Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sản phẩm</th>
                            <th>Số Serial</th>
                            <th>Khách hàng</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Loại bảo hành</th>
                            <th>Trạng thái</th>
                            <th style="width: 150px">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($warranties as $warranty)
                            <tr>
                                <td>{{ $warranty->id }}</td>
                                <td>{{ $warranty->product->name ?? 'N/A' }}</td>
                                <td>{{ $warranty->productSerial->serial_number ?? 'N/A' }}</td>
                                <td>{{ $warranty->customer->name ?? 'N/A' }}</td>
                                <td>{{ $warranty->start_date->format('d/m/Y') }}</td>
                                <td>{{ $warranty->end_date->format('d/m/Y') }}</td>
                                <td>{{ $warranty->warranty_type }}</td>
                                <td>
                                    @if($warranty->status == 'active')
                                        <span class="badge bg-success">Đang hiệu lực</span>
                                    @elseif($warranty->status == 'expired')
                                        <span class="badge bg-danger">Đã hết hạn</span>
                                    @else
                                        <span class="badge bg-secondary">Đã hủy</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('admin.warranties.edit', $warranty) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{ route('admin.warranties.show', $warranty) }}" class="btn btn-sm btn-outline-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.warranties.destroy', $warranty) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bảo hành này?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4">Chưa có bảo hành nào</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $warranties->links() }}
            </div>
        </div>
    </div>
@endsection