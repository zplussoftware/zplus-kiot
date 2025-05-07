<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::withCount('users', 'permissions')->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all()->groupBy(function($permission) {
            // Group permissions by their prefix (before the underscore)
            $parts = explode('_', $permission->name);
            return $parts[0];
        });
        
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'permissions' => 'nullable|array',
        ]);

        DB::beginTransaction();

        try {
            $role = Role::create([
                'name' => $request->name,
                'guard_name' => 'web',
            ]);

            // Assign permissions
            if ($request->has('permissions')) {
                $role->syncPermissions($request->permissions);
            }

            DB::commit();

            return redirect()->route('admin.roles.index')
                ->with('success', 'Vai trò đã được tạo thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $role->load('permissions');
        $usersWithRole = $role->users()->paginate(10);
        
        return view('admin.roles.show', compact('role', 'usersWithRole'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all()->groupBy(function($permission) {
            // Group permissions by their prefix (before the underscore)
            $parts = explode('_', $permission->name);
            return $parts[0];
        });
        
        $role->load('permissions');
        
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
        ]);

        // Prevent editing the admin role name
        if ($role->name === 'Admin' && $request->name !== 'Admin') {
            return back()->with('error', 'Không thể thay đổi tên của vai trò Admin.');
        }

        DB::beginTransaction();

        try {
            $role->update([
                'name' => $request->name,
            ]);

            // Sync permissions
            if ($request->has('permissions')) {
                $role->syncPermissions($request->permissions);
            } else {
                $role->permissions()->detach();
            }

            DB::commit();

            return redirect()->route('admin.roles.index')
                ->with('success', 'Vai trò đã được cập nhật thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // Prevent deleting the admin role
        if ($role->name === 'Admin') {
            return back()->with('error', 'Không thể xóa vai trò Admin.');
        }

        // Check if users are assigned to this role
        if ($role->users()->count() > 0) {
            return back()->with('error', 'Không thể xóa vai trò đang được sử dụng bởi người dùng.');
        }

        try {
            $role->delete();
            return redirect()->route('admin.roles.index')
                ->with('success', 'Vai trò đã được xóa thành công.');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
