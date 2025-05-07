<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::with('roles');
        
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }
        
        // Filter by role
        if ($request->has('role') && !empty($request->role)) {
            $query->whereHas('roles', function($q) use ($request) {
                $q->where('id', $request->role);
            });
        }
        
        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('active', $request->status);
        }
        
        $users = $query->paginate(10)->withQueryString();
        $roles = Role::all();
        
        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $warehouses = Warehouse::all();
        return view('admin.users.create', compact('roles', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
            'roles' => 'required|array',
            'warehouses' => 'nullable|array',
            'active' => 'boolean',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => $request->has('active') ? 1 : 0,
            ]);

            // Assign roles
            if ($request->has('roles')) {
                $user->syncRoles($request->roles);
            }

            // Assign warehouses
            if ($request->has('warehouses')) {
                $user->warehouses()->sync($request->warehouses);
            }

            DB::commit();

            return redirect()->route('admin.users.index')
                ->with('success', 'Người dùng đã được tạo thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('roles', 'warehouses');
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $warehouses = Warehouse::all();
        $user->load('roles', 'warehouses');
        
        return view('admin.users.edit', compact('user', 'roles', 'warehouses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'roles' => 'required|array',
            'warehouses' => 'nullable|array',
            'active' => 'boolean',
        ]);

        DB::beginTransaction();

        try {
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'active' => $request->has('active') ? 1 : 0,
            ];

            // Only update password if provided
            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $user->update($userData);

            // Sync roles
            if ($request->has('roles')) {
                $user->syncRoles($request->roles);
            }

            // Sync warehouses
            if ($request->has('warehouses')) {
                $user->warehouses()->sync($request->warehouses);
            } else {
                $user->warehouses()->detach();
            }

            DB::commit();

            return redirect()->route('admin.users.index')
                ->with('success', 'Người dùng đã được cập nhật thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Prevent deleting yourself
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Bạn không thể xóa tài khoản của chính mình.');
        }

        try {
            $user->delete();
            return redirect()->route('admin.users.index')
                ->with('success', 'Người dùng đã được xóa thành công.');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
