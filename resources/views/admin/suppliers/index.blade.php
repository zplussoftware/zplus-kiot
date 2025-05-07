@extends('layouts.admin')

@section('title', 'Quản lý nhà cung cấp')

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý nhà cung cấp</h1>
        <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Thêm nhà cung cấp mới
        </a>
    </div>

    <!-- Filter and Search -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.suppliers.index') }}" method="GET" class="row g-3">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Tìm theo tên, mã, người liên hệ, số điện thoại" value="{{ request('search') }}">
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
                    <a href="{{ route('admin.suppliers.index') }}" class="btn btn-outline-secondary w-100">Xóa bộ lọc</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Supplier List Card -->
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
                            <th>Mã</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Người liên hệ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Công nợ hiện tại</th>
                            <th>Trạng thái</th>
                            <th style="width: 150px">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->code ?? 'N/A' }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->contact_person ?? 'N/A' }}</td>
                                <td>{{ $supplier->contact_phone ?? ($supplier->phone ?? 'N/A') }}</td>
                                <td>{{ $supplier->email ?? 'N/A' }}</td>
                                <td>{{ number_format($supplier->current_debt, 0, ',', '.') }} đ</td>
                                <td>
                                    @if($supplier->is_active)
                                        <span class="badge bg-success">Đang hoạt động</span>
                                    @else
                                        <span class="badge bg-danger">Ngừng hoạt động</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('admin.suppliers.edit', $supplier) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{ route('admin.suppliers.show', $supplier) }}" class="btn btn-sm btn-outline-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.suppliers.destroy', $supplier) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa nhà cung cấp này?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">Chưa có nhà cung cấp nào</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $suppliers->links() }}
            </div>
        </div>
    </div>
@endsection