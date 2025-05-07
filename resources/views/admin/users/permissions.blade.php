@extends('layouts.admin')

@section('title', 'Quản lý quyền trực tiếp cho người dùng')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quản lý quyền trực tiếp: {{ $user->name }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-default btn-sm">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.users.permissions.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Quyền trực tiếp sẽ được áp dụng kèm theo các quyền mà người dùng có thông qua vai trò của họ.
                        </div>

                        <div class="form-group">
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
                                                                {{ in_array($permission->id, old('permissions', $directPermissions)) ? 'checked' : '' }}>
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
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật quyền</button>
                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-default">Hủy</a>
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