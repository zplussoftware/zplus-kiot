<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Supplier::query();
        
        // Apply search filter
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('code', 'like', "%{$searchTerm}%")
                  ->orWhere('contact_person', 'like', "%{$searchTerm}%")
                  ->orWhere('contact_phone', 'like', "%{$searchTerm}%")
                  ->orWhere('email', 'like', "%{$searchTerm}%")
                  ->orWhere('phone', 'like', "%{$searchTerm}%");
            });
        }
        
        // Apply active/inactive filter
        if ($request->has('status') && !empty($request->status)) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }
        
        $suppliers = $query->orderBy('name', 'asc')
                         ->paginate(15)
                         ->withQueryString();
            
        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created supplier in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'code' => 'nullable|max:50|unique:suppliers',
            'contact_person' => 'nullable|max:255',
            'contact_phone' => 'nullable|max:20',
            'address' => 'nullable|string',
            'tax_code' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|max:20',
            'bank_name' => 'nullable|string|max:255',
            'bank_account' => 'nullable|string|max:50',
            'bank_branch' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'is_active' => 'boolean',
        ]);
        
        $validated['is_active'] = $request->has('is_active');
        $validated['current_debt'] = 0;
        
        Supplier::create($validated);
        
        return redirect()->route('admin.suppliers.index')
            ->with('success', 'Nhà cung cấp đã được tạo thành công.');
    }

    /**
     * Display the specified supplier.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        $supplier->load('stockImports', 'debts');
        
        return view('admin.suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified supplier.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified supplier in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'code' => 'nullable|max:50|unique:suppliers,code,' . $supplier->id,
            'contact_person' => 'nullable|max:255',
            'contact_phone' => 'nullable|max:20',
            'address' => 'nullable|string',
            'tax_code' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|max:20',
            'bank_name' => 'nullable|string|max:255',
            'bank_account' => 'nullable|string|max:50',
            'bank_branch' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'is_active' => 'boolean',
        ]);
        
        $validated['is_active'] = $request->has('is_active');
        
        $supplier->update($validated);
        
        return redirect()->route('admin.suppliers.index')
            ->with('success', 'Nhà cung cấp đã được cập nhật thành công.');
    }

    /**
     * Remove the specified supplier from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        // Check if supplier has stock imports
        if ($supplier->stockImports()->count() > 0) {
            return back()->with('error', 'Không thể xóa nhà cung cấp này vì có liên quan đến phiếu nhập kho.');
        }
        
        // Check if supplier has debt records
        if ($supplier->debts()->count() > 0) {
            return back()->with('error', 'Không thể xóa nhà cung cấp này vì có liên quan đến công nợ.');
        }
        
        // Check if supplier has current debt
        if ($supplier->current_debt > 0) {
            return back()->with('error', 'Không thể xóa nhà cung cấp này vì còn công nợ chưa thanh toán.');
        }
        
        $supplier->delete();
        
        return redirect()->route('admin.suppliers.index')
            ->with('success', 'Nhà cung cấp đã được xóa thành công.');
    }
}
