<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class UserPermissionController extends Controller
{
    /**
     * Show the form for editing direct permissions for the user.
     */
    public function edit(User $user)
    {
        // Group permissions by their prefix (before the underscore)
        $permissions = Permission::all()->groupBy(function($permission) {
            $parts = explode('_', $permission->name);
            return $parts[0];
        });
        
        // Get direct permissions for the user
        $directPermissions = $user->getDirectPermissions()->pluck('id')->toArray();
        
        return view('admin.users.permissions', compact('user', 'permissions', 'directPermissions'));
    }

    /**
     * Update the user's direct permissions.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'permissions' => 'nullable|array',
        ]);

        DB::beginTransaction();

        try {
            // Sync direct permissions
            $permissions = $request->has('permissions') ? $request->permissions : [];
            $user->syncPermissions($permissions);

            DB::commit();

            return redirect()->route('admin.users.show', $user)
                ->with('success', 'Quyền của người dùng đã được cập nhật thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
