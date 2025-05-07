<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\User;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the warehouses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Warehouse::query();
        
        // Apply search filter
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('location', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }
        
        // Apply status filter
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }
        
        $warehouses = $query->orderBy('name', 'asc')
                          ->paginate(15)
                          ->withQueryString();
            
        return view('admin.warehouses.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new warehouse.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name', 'asc')->get();
        return view('admin.warehouses.create', compact('users'));
    }

    /**
     * Store a newly created warehouse in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'users' => 'nullable|array',
            'users.*' => 'exists:users,id',
        ]);
        
        $warehouse = Warehouse::create([
            'name' => $validated['name'],
            'location' => $validated['location'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'],
        ]);
        
        // Sync warehouse users if any are selected
        if (isset($validated['users'])) {
            $warehouse->users()->sync($validated['users']);
        }
        
        return redirect()->route('admin.warehouses.index')
            ->with('success', 'Kho hàng đã được tạo thành công.');
    }

    /**
     * Display the specified warehouse.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        $warehouse->load('users', 'productStocks.product', 'incomingTransfers', 'outgoingTransfers');
        
        return view('admin.warehouses.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified warehouse.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        $users = User::orderBy('name', 'asc')->get();
        $warehouse->load('users');
        
        return view('admin.warehouses.edit', compact('warehouse', 'users'));
    }

    /**
     * Update the specified warehouse in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'users' => 'nullable|array',
            'users.*' => 'exists:users,id',
        ]);
        
        $warehouse->update([
            'name' => $validated['name'],
            'location' => $validated['location'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'],
        ]);
        
        // Sync warehouse users if any are selected
        if (isset($validated['users'])) {
            $warehouse->users()->sync($validated['users']);
        } else {
            $warehouse->users()->detach();
        }
        
        return redirect()->route('admin.warehouses.index')
            ->with('success', 'Kho hàng đã được cập nhật thành công.');
    }

    /**
     * Remove the specified warehouse from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        // Check if warehouse has product stocks
        if ($warehouse->productStocks()->count() > 0) {
            return back()->with('error', 'Không thể xóa kho hàng này vì có sản phẩm tồn kho.');
        }
        
        // Check if warehouse has product serials
        if ($warehouse->productSerials()->count() > 0) {
            return back()->with('error', 'Không thể xóa kho hàng này vì có sản phẩm serial tồn kho.');
        }
        
        // Check if warehouse has stock imports
        if ($warehouse->stockImports()->count() > 0) {
            return back()->with('error', 'Không thể xóa kho hàng này vì có liên quan đến phiếu nhập kho.');
        }
        
        // Check if warehouse has orders
        if ($warehouse->orders()->count() > 0) {
            return back()->with('error', 'Không thể xóa kho hàng này vì có liên quan đến đơn hàng.');
        }
        
        // Check if warehouse has transfers
        if ($warehouse->incomingTransfers()->count() > 0 || $warehouse->outgoingTransfers()->count() > 0) {
            return back()->with('error', 'Không thể xóa kho hàng này vì có liên quan đến phiếu chuyển kho.');
        }
        
        // Detach all users
        $warehouse->users()->detach();
        
        // Delete the warehouse
        $warehouse->delete();
        
        return redirect()->route('admin.warehouses.index')
            ->with('success', 'Kho hàng đã được xóa thành công.');
    }
}
