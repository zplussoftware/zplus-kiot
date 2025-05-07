@extends('layouts.admin')

@section('title', 'Chi tiết vai trò')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết vai trò: {{ $role->name }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-default btn-sm">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                        @can('edit_roles')
                        <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Chỉnh sửa
                        </a>
                        @endcan
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên vai trò:</label>
                                <p class="form-control-static">{{ $role->name }}</p>
                            </div>
                            <div class="form-group">
                                <label>Số người dùng có vai trò này:</label>
                                <p class="form-control-static">{{ $role->users->count() }}</p>
                            </div>
                            <div class="form-group">
                                <label>Số quyền được gán:</label>
                                <p class="form-control-static">{{ $role->permissions->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>Danh sách quyền</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tên quyền</th>
                                            <th>Mô tả</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($role->permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->description ?? 'Không có mô tả' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            <!-- Users with this role -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Người dùng có vai trò này</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usersWithRole as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->active)
                                    <span class="badge badge-success">Hoạt động</span>
                                    @else
                                    <span class="badge badge-danger">Không hoạt động</span>
                                    @endif
                                </td>
                                <td>
                                    @can('view_users')
                                    <a href="{{ route('admin.users.show', $user) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Không có người dùng nào có vai trò này</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $usersWithRole->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection