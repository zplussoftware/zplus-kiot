@extends('layouts.admin')

@section('title', 'Quản lý người dùng')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách người dùng</h3>
                    <div class="card-tools">
                        @can('create_users')
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Thêm người dùng
                        </a>
                        @endcan
                    </div>
                </div>
                <!-- /.card-header -->
                
                <!-- Search and Filter -->
                <div class="card-body border-bottom">
                    <form action="{{ route('admin.users.index') }}" method="GET" class="mb-0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Tìm theo tên hoặc email" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <select name="role" class="form-control" onchange="this.form.submit()">
                                    <option value="">-- Lọc theo vai trò --</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ request('role') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                <select name="status" class="form-control" onchange="this.form.submit()">
                                    <option value="">-- Lọc theo trạng thái --</option>
                                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Không hoạt động</option>
                                </select>
                            </div>
                            
                            <div class="col-md-2">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-default btn-block">Đặt lại</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                    <span class="badge badge-info">{{ $role->name }}</span>
                                    @endforeach
                                </td>
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
                                    
                                    @can('edit_users')
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    @if(auth()->id() !== $user->id)
                                    <form action="{{ route('admin.users.toggle-status', $user) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn {{ $user->active ? 'btn-warning' : 'btn-success' }} btn-sm" onclick="return confirm('Bạn có chắc chắn muốn {{ $user->active ? 'vô hiệu hóa' : 'kích hoạt' }} tài khoản này?')">
                                            <i class="fas {{ $user->active ? 'fa-ban' : 'fa-check' }}"></i>
                                        </button>
                                    </form>
                                    @endif
                                    @endcan
                                    
                                    @can('delete_users')
                                    @if(auth()->id() !== $user->id)
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $users->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection