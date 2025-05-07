<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerGroup;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Customer::with('customerGroup', 'orders');
        
        // Apply search filter
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('phone', 'like', "%{$searchTerm}%")
                  ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }
        
        // Apply customer group filter
        if ($request->has('customer_group') && !empty($request->customer_group)) {
            $query->where('customer_group_id', $request->customer_group);
        }
        
        $customers = $query->orderBy('name', 'asc')->paginate(15);
            
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customerGroups = CustomerGroup::orderBy('name', 'asc')->get();
            
        return view('admin.customers.create', compact('customerGroups'));
    }

    /**
     * Store a newly created customer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'customer_group_id' => 'nullable|exists:customer_groups,id',
            'tax_code' => 'nullable|string|max:20',
        ]);
        
        Customer::create($validated);
        
        return redirect()->route('admin.customers.index')
            ->with('success', 'Khách hàng đã được tạo thành công.');
    }

    /**
     * Display the specified customer.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer->load('customerGroup', 'orders', 'warranties');
        
        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified customer.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customerGroups = CustomerGroup::orderBy('name', 'asc')->get();
            
        return view('admin.customers.edit', compact('customer', 'customerGroups'));
    }

    /**
     * Update the specified customer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'customer_group_id' => 'nullable|exists:customer_groups,id',
            'tax_code' => 'nullable|string|max:20',
        ]);
        
        $customer->update($validated);
        
        return redirect()->route('admin.customers.index')
            ->with('success', 'Khách hàng đã được cập nhật thành công.');
    }

    /**
     * Remove the specified customer from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        // Check if customer has orders or warranties
        if ($customer->orders()->count() > 0) {
            return back()->with('error', 'Không thể xóa khách hàng này vì họ có đơn hàng liên quan.');
        }
        
        if ($customer->warranties()->count() > 0) {
            return back()->with('error', 'Không thể xóa khách hàng này vì họ có bảo hành liên quan.');
        }
        
        $customer->delete();
        
        return redirect()->route('admin.customers.index')
            ->with('success', 'Khách hàng đã được xóa thành công.');
    }
}
