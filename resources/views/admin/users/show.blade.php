@extends('layouts.admin')

@section('title', 'Chi tiết người dùng')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết người dùng: {{ $user->name }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-default btn-sm">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                        @can('edit_users')
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Chỉnh sửa
                        </a>
                        @endcan
                        @can('assign_permissions')
                        <a href="{{ route('admin.users.permissions.edit', $user) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-key"></i> Phân quyền trực tiếp
                        </a>
                        @endcan
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên người dùng:</label>
                                <p class="form-control-static">{{ $user->name }}</p>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <p class="form-control-static">{{ $user->email }}</p>
                            </div>
                            <div class="form-group">
                                <label>Ngày tạo:</label>
                                <p class="form-control-static">{{ $user->created_at->format('d/m/Y H:i:s') }}</p>
                            </div>
                            <div class="form-group">
                                <label>Ngày cập nhật:</label>
                                <p class="form-control-static">{{ $user->updated_at->format('d/m/Y H:i:s') }}</p>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái:</label>
                                <p class="form-control-static">
                                    @if($user->active)
                                    <span class="badge badge-success">Hoạt động</span>
                                    @else
                                    <span class="badge badge-danger">Không hoạt động</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vai trò:</label>
                                <div>
                                    @forelse($user->roles as $role)
                                    <span class="badge badge-info">{{ $role->name }}</span>
                                    @empty
                                    <span class="text-muted">Không có vai trò</span>
                                    @endforelse
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kho làm việc:</label>
                                <div>
                                    @forelse($user->warehouses as $warehouse)
                                    <span class="badge badge-primary">{{ $warehouse->name }}</span>
                                    @empty
                                    <span class="text-muted">Không được phân công kho</span>
                                    @endforelse
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Quyền trực tiếp:</label>
                                <div>
                                    @forelse($user->getDirectPermissions() as $permission)
                                    <span class="badge badge-warning">{{ $permission->name }}</span>
                                    @empty
                                    <span class="text-muted">Không có quyền trực tiếp</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            <!-- Recent Activity -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hoạt động gần đây</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Tính năng này sẽ được phát triển trong tương lai.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection