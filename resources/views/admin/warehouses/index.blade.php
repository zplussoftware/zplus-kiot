@extends('layouts.admin')

@section('title', 'Quản lý kho hàng')

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý kho hàng</h1>
        <a href="{{ route('admin.warehouses.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Thêm kho hàng mới
        </a>
    </div>

    <!-- Filter and Search -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.warehouses.index') }}" method="GET" class="row g-3">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên, địa điểm, mô tả" value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Đang hoạt động</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Ngừng hoạt động</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Lọc</button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('admin.warehouses.index') }}" class="btn btn-outline-secondary w-100">Xóa bộ lọc</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Warehouse List Card -->
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
                            <th>Tên kho hàng</th>
                            <th>Địa điểm</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Số lượng sản phẩm</th>
                            <th style="width: 150px">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($warehouses as $warehouse)
                            <tr>
                                <td>{{ $warehouse->id }}</td>
                                <td>{{ $warehouse->name }}</td>
                                <td>{{ $warehouse->location }}</td>
                                <td>{{ Str::limit($warehouse->description, 50) }}</td>
                                <td>
                                    @if($warehouse->status == 'active')
                                        <span class="badge bg-success">Đang hoạt động</span>
                                    @else
                                        <span class="badge bg-danger">Ngừng hoạt động</span>
                                    @endif
                                </td>
                                <td>{{ $warehouse->productStocks->sum('quantity') ?? 0 }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('admin.warehouses.edit', $warehouse) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{ route('admin.warehouses.show', $warehouse) }}" class="btn btn-sm btn-outline-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.warehouses.destroy', $warehouse) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa kho hàng này?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">Chưa có kho hàng nào</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $warehouses->links() }}
            </div>
        </div>
    </div>
@endsection