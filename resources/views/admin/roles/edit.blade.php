@extends('layouts.admin')

@section('title', 'Chỉnh sửa vai trò')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa vai trò: {{ $role->name }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-default btn-sm">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên vai trò</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $role->name) }}" {{ $role->name === 'Admin' ? 'readonly' : '' }} required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            @if($role->name === 'Admin')
                                <small class="text-muted">Vai trò Admin không thể sửa tên</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Phân quyền</label>
                            <div class="card card-primary card-outline card-tabs">
                                <div class="card-header p-0 pt-1 border-bottom-0">
                                    <ul class="nav nav-tabs" id="permission-tabs" role="tablist">
                                        @foreach($permissions as $group => $groupPermissions)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $group }}-tab" data-toggle="pill" href="#{{ $group }}" role="tab" aria-controls="{{ $group }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                {{ ucfirst($group) }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="permission-tabsContent">
                                        @foreach($permissions as $group => $groupPermissions)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $group }}" role="tabpanel" aria-labelledby="{{ $group }}-tab">
                                            <div class="row">
                                                @foreach($groupPermissions as $permission)
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" 
                                                                {{ in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray())) ? 'checked' : '' }}
                                                                {{ $role->name === 'Admin' ? 'checked disabled' : '' }}>
                                                            <label class="custom-control-label" for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @error('permissions')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                            @if($role->name === 'Admin')
                                <small class="text-muted">Vai trò Admin luôn có tất cả các quyền</small>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" {{ $role->name === 'Admin' ? 'disabled' : '' }}>Cập nhật</button>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-default">Hủy</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        // Tab initialization
        $('#permission-tabs a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
</script>
@endpush