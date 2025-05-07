<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\WarrantyClaim;
use App\Models\ProductStock;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get today's data
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $thisWeek = Carbon::now()->startOfWeek();
        $lastWeek = Carbon::now()->subWeek()->startOfWeek();
        $thisMonth = Carbon::now()->startOfMonth();
        $lastMonth = Carbon::now()->subMonth()->startOfMonth();

        // Today's sales and comparison with yesterday
        $todaySales = Order::whereDate('created_at', $today)->sum('total_amount');
        $yesterdaySales = Order::whereDate('created_at', $yesterday)->sum('total_amount');
        $salesGrowth = $yesterdaySales > 0 ? (($todaySales - $yesterdaySales) / $yesterdaySales) * 100 : 100;

        // Today's orders and comparison with yesterday
        $todayOrders = Order::whereDate('created_at', $today)->count();
        $yesterdayOrders = Order::whereDate('created_at', $yesterday)->count();
        $ordersGrowth = $yesterdayOrders > 0 ? (($todayOrders - $yesterdayOrders) / $yesterdayOrders) * 100 : 100;

        // New customers this month and comparison with last month
        $newCustomers = Customer::whereDate('created_at', '>=', $thisMonth)->count();
        $lastMonthCustomers = Customer::whereDate('created_at', '>=', $lastMonth)
            ->whereDate('created_at', '<', $thisMonth)->count();
        $customersGrowth = $lastMonthCustomers > 0 ? (($newCustomers - $lastMonthCustomers) / $lastMonthCustomers) * 100 : 100;

        // New warranty claims this week and comparison with last week
        $newWarranties = WarrantyClaim::whereDate('created_at', '>=', $thisWeek)->count();
        $lastWeekWarranties = WarrantyClaim::whereDate('created_at', '>=', $lastWeek)
            ->whereDate('created_at', '<', $thisWeek)->count();
        $warrantiesGrowth = $lastWeekWarranties > 0 ? (($newWarranties - $lastWeekWarranties) / $lastWeekWarranties) * 100 : 100;

        // Get sales data for chart (last 7 days)
        $salesChart = $this->getSalesChartData('7days');

        // Get best selling products
        $bestSellingProducts = $this->getBestSellingProducts();

        // Get recent orders
        $recentOrders = Order::with('customer')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Get low stock products
        $lowStockProducts = $this->getLowStockProducts();

        return view('admin.dashboard', compact(
            'todaySales', 'salesGrowth',
            'todayOrders', 'ordersGrowth',
            'newCustomers', 'customersGrowth',
            'newWarranties', 'warrantiesGrowth',
            'salesChart', 'bestSellingProducts',
            'recentOrders', 'lowStockProducts'
        ));
    }

    private function getSalesChartData($period = '7days')
    {
        $data = [];
        $labels = [];
        
        if ($period === '7days') {
            // Get sales data for last 7 days
            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i);
                $labels[] = $date->format('d/m');
                $data[] = Order::whereDate('created_at', $date->toDateString())->sum('total_amount');
            }
        } elseif ($period === '30days') {
            // Get sales data for last 30 days (grouped by 3-day periods)
            for ($i = 0; $i < 10; $i++) {
                $startDate = Carbon::now()->subDays(30)->addDays($i * 3);
                $endDate = (clone $startDate)->addDays(2);
                $labels[] = $startDate->format('d/m') . '-' . $endDate->format('d/m');
                $data[] = Order::whereBetween('created_at', [$startDate->startOfDay(), $endDate->endOfDay()])->sum('total_amount');
            }
        } elseif ($period === 'year') {
            // Get sales data for current year (by month)
            $currentYear = Carbon::now()->year;
            for ($i = 1; $i <= 12; $i++) {
                $month = Carbon::createFromDate($currentYear, $i, 1);
                $labels[] = $month->format('M');
                $data[] = Order::whereYear('created_at', $currentYear)
                    ->whereMonth('created_at', $i)
                    ->sum('total_amount');
            }
        }
        
        return [
            'labels' => $labels,
            'data' => $data
        ];
    }

    private function getBestSellingProducts()
    {
        return Product::select('products.*', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('products.id')
            ->orderBy('total_sold', 'desc')
            ->take(4)
            ->get();
    }

    private function getLowStockProducts()
    {
        return Product::select('products.*', DB::raw('SUM(product_stocks.quantity) as total_stock'))
            ->join('product_stocks', 'products.id', '=', 'product_stocks.product_id')
            ->groupBy('products.id')
            ->having('total_stock', '<=', 10)
            ->orderBy('total_stock', 'asc')
            ->take(4)
            ->get();
    }
}
