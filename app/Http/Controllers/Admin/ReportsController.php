<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Warehouse;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * Display the sales report.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sales(Request $request)
    {
        // Set default date range to current month if not provided
        $startDate = $request->input('start_date') 
            ? Carbon::parse($request->input('start_date')) 
            : Carbon::now()->startOfMonth();
            
        $endDate = $request->input('end_date') 
            ? Carbon::parse($request->input('end_date'))->endOfDay() 
            : Carbon::now()->endOfDay();
            
        // Set filter parameters
        $category = $request->input('category');
        $product = $request->input('product');
        $user = $request->input('user');
        $warehouse = $request->input('warehouse');
        $groupBy = $request->input('group_by', 'day'); // Default group by day
        
        // Base query
        $query = Order::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'completed');
            
        // Apply filters
        if ($user) {
            $query->where('user_id', $user);
        }
        
        if ($warehouse) {
            $query->where('warehouse_id', $warehouse);
        }
        
        // For product and category filters, we need to join with order_items
        if ($product || $category) {
            $query->whereHas('items', function($q) use ($product, $category) {
                if ($product) {
                    $q->where('product_id', $product);
                }
                
                if ($category) {
                    $q->whereHas('product', function($pq) use ($category) {
                        $pq->where('category_id', $category);
                    });
                }
            });
        }
        
        // Get overall statistics
        $totalOrders = $query->count();
        $totalRevenue = $query->sum('total');
        $totalCost = $query->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->sum(DB::raw('order_items.quantity * order_items.cost_price'));
        $totalProfit = $totalRevenue - $totalCost;
        
        // Format time series data based on group by parameter
        $timeSeriesData = [];
        $format = '%Y-%m-%d';
        $step = '1 day';
        
        switch ($groupBy) {
            case 'month':
                $format = '%Y-%m';
                $step = '1 month';
                break;
            case 'week':
                $format = '%Y-%u'; // ISO week number
                $step = '1 week';
                break;
            case 'hour':
                $format = '%Y-%m-%d %H:00';
                $step = '1 hour';
                break;
            // Default is day
        }
        
        $salesData = DB::table('orders')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'completed')
            ->select(DB::raw("DATE_FORMAT(created_at, '{$format}') as period"))
            ->selectRaw('SUM(total) as revenue')
            ->selectRaw('COUNT(*) as order_count')
            ->groupBy('period')
            ->orderBy('period')
            ->get();
            
        // Get top selling products
        $topProducts = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->where('orders.status', 'completed')
            ->select('products.id', 'products.name', 'products.sku')
            ->selectRaw('SUM(order_items.quantity) as quantity')
            ->selectRaw('SUM(order_items.price * order_items.quantity) as revenue')
            ->groupBy('products.id', 'products.name', 'products.sku')
            ->orderByDesc('quantity')
            ->limit(10)
            ->get();
            
        // Get top customers
        $topCustomers = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->where('orders.status', 'completed')
            ->select('customers.id', 'customers.name', 'customers.phone')
            ->selectRaw('COUNT(orders.id) as order_count')
            ->selectRaw('SUM(orders.total) as total_spent')
            ->groupBy('customers.id', 'customers.name', 'customers.phone')
            ->orderByDesc('total_spent')
            ->limit(10)
            ->get();
            
        // Get form dropdown options
        $categories = Category::orderBy('name')->get();
        $products = Product::orderBy('name')->get();
        $users = User::orderBy('name')->get();
        $warehouses = Warehouse::orderBy('name')->get();
        
        return view('admin.reports.sales', compact(
            'startDate', 
            'endDate', 
            'totalOrders', 
            'totalRevenue', 
            'totalProfit',
            'salesData',
            'topProducts',
            'topCustomers',
            'categories',
            'products',
            'users',
            'warehouses',
            'groupBy'
        ));
    }
    
    /**
     * Display the inventory report.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inventory(Request $request)
    {
        $category = $request->input('category');
        $warehouse = $request->input('warehouse');
        $stockStatus = $request->input('stock_status');
        
        // Base query for products with stock information
        $query = Product::with(['category', 'productStocks']);
        
        // Apply filters
        if ($category) {
            $query->where('category_id', $category);
        }
        
        if ($stockStatus) {
            switch ($stockStatus) {
                case 'low':
                    $query->whereHas('productStocks', function($q) {
                        $q->whereRaw('quantity <= min_stock_level');
                    });
                    break;
                case 'out':
                    $query->whereHas('productStocks', function($q) {
                        $q->where('quantity', 0);
                    });
                    break;
                case 'overstock':
                    $query->whereHas('productStocks', function($q) {
                        $q->whereRaw('quantity > 2 * min_stock_level');
                    });
                    break;
            }
        }
        
        // Filter by warehouse if specified
        if ($warehouse) {
            $query->whereHas('productStocks', function($q) use ($warehouse) {
                $q->where('warehouse_id', $warehouse);
            });
        }
        
        $products = $query->orderBy('name')->paginate(15);
        
        // Get dropdown options
        $categories = Category::orderBy('name')->get();
        $warehouses = Warehouse::orderBy('name')->get();
        
        return view('admin.reports.inventory', compact(
            'products',
            'categories',
            'warehouses',
            'category',
            'warehouse',
            'stockStatus'
        ));
    }
}