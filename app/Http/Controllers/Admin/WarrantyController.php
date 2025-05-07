<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warranty;
use App\Models\Product;
use App\Models\Customer;
use App\Models\WarrantyClaim;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the warranties.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Warranty::with(['product', 'customer', 'productSerial']);
        
        // Apply search filter
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->whereHas('customer', function($query) use ($searchTerm) {
                    $query->where('name', 'like', "%{$searchTerm}%")
                          ->orWhere('phone', 'like', "%{$searchTerm}%");
                })
                ->orWhereHas('product', function($query) use ($searchTerm) {
                    $query->where('name', 'like', "%{$searchTerm}%")
                          ->orWhere('sku', 'like', "%{$searchTerm}%");
                })
                ->orWhereHas('productSerial', function($query) use ($searchTerm) {
                    $query->where('serial_number', 'like', "%{$searchTerm}%");
                });
            });
        }
        
        // Apply status filter
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }
        
        // Apply date filters
        if ($request->has('start_date') && !empty($request->start_date)) {
            $query->whereDate('start_date', '>=', $request->start_date);
        }
        
        if ($request->has('end_date') && !empty($request->end_date)) {
            $query->whereDate('end_date', '<=', $request->end_date);
        }
        
        $warranties = $query->orderBy('end_date', 'asc')
                          ->paginate(15)
                          ->withQueryString();
            
        return view('admin.warranties.index', compact('warranties'));
    }

    /**
     * Show the form for creating a new warranty.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('name', 'asc')->get();
        $customers = Customer::orderBy('name', 'asc')->get();
        
        return view('admin.warranties.create', compact('products', 'customers'));
    }

    /**
     * Store a newly created warranty in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'nullable|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'product_serial_id' => 'nullable|exists:product_serials,id',
            'customer_id' => 'required|exists:customers,id',
            'start_date' => 'required|date',
            'warranty_period' => 'required|integer|min:1',
            'warranty_type' => 'required|string',
            'note' => 'nullable|string',
        ]);
        
        // Calculate end date based on warranty period (in months)
        $startDate = new \DateTime($validated['start_date']);
        $endDate = clone $startDate;
        $endDate->modify('+' . $validated['warranty_period'] . ' months');
        
        $validated['end_date'] = $endDate->format('Y-m-d');
        $validated['status'] = 'active';
        
        Warranty::create($validated);
        
        return redirect()->route('admin.warranties.index')
            ->with('success', 'Bảo hành đã được tạo thành công.');
    }

    /**
     * Display the specified warranty.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function show(Warranty $warranty)
    {
        $warranty->load(['product', 'customer', 'productSerial', 'order', 'claims']);
        
        return view('admin.warranties.show', compact('warranty'));
    }

    /**
     * Show the form for editing the specified warranty.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function edit(Warranty $warranty)
    {
        $products = Product::orderBy('name', 'asc')->get();
        $customers = Customer::orderBy('name', 'asc')->get();
        
        return view('admin.warranties.edit', compact('warranty', 'products', 'customers'));
    }

    /**
     * Update the specified warranty in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warranty $warranty)
    {
        $validated = $request->validate([
            'order_id' => 'nullable|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'product_serial_id' => 'nullable|exists:product_serials,id',
            'customer_id' => 'required|exists:customers,id',
            'start_date' => 'required|date',
            'warranty_period' => 'required|integer|min:1',
            'warranty_type' => 'required|string',
            'status' => 'required|in:active,expired,voided',
            'note' => 'nullable|string',
        ]);
        
        // Calculate end date based on warranty period (in months)
        $startDate = new \DateTime($validated['start_date']);
        $endDate = clone $startDate;
        $endDate->modify('+' . $validated['warranty_period'] . ' months');
        
        $validated['end_date'] = $endDate->format('Y-m-d');
        
        $warranty->update($validated);
        
        return redirect()->route('admin.warranties.index')
            ->with('success', 'Bảo hành đã được cập nhật thành công.');
    }

    /**
     * Remove the specified warranty from storage.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warranty $warranty)
    {
        // Check if warranty has claims
        if ($warranty->claims()->count() > 0) {
            return back()->with('error', 'Không thể xóa bảo hành này vì có liên quan đến các yêu cầu bảo hành.');
        }
        
        $warranty->delete();
        
        return redirect()->route('admin.warranties.index')
            ->with('success', 'Bảo hành đã được xóa thành công.');
    }
}
