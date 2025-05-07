<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\PermissionMiddleware;

Route::get('/', function () {
    return view('home.index');
});

// Home routes
Route::get('/about', function () {
    return view('home.about');
})->name('about');

Route::get('/features', function () {
    return view('home.features');
})->name('features');

Route::get('/faq', function () {
    return view('home.faq');
})->name('faq');

Route::get('/contact', function () {
    return view('home.contact');
})->name('contact');

Route::post('/contact/send', function () {
    // This will be implemented later with proper controller
    return redirect()->route('contact')->with('success', 'Cảm ơn bạn! Tin nhắn của bạn đã được gửi thành công.');
})->name('contact.send');

// Demo route
Route::get('/demo', function () {
    return view('home.demo');
})->name('demo');

// Demo request submission
Route::post('/demo/request', function () {
    // Validate form data
    request()->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'company' => 'required|string|max:255',
        'business_type' => 'required|string',
        'store_count' => 'required|string',
        'demo_type' => 'required|string',
        'note' => 'nullable|string',
        'privacy_policy' => 'required',
    ]);

    // In a real application, this would save to database and/or send email
    // For now, just redirect with success message
    return redirect()->route('demo')->with('success', 'Đăng ký demo thành công! Chúng tôi sẽ liên hệ với bạn trong vòng 24 giờ làm việc.');
})->name('demo.request');

// Authentication routes
Auth::routes();

// Home route - Không yêu cầu đăng nhập
Route::get('/home', function () {
    return view('home.index');
})->name('home');

// Admin routes - require admin or manager role
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:Admin|manager'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // User and Role Management
    Route::middleware(['permission:view_users'])->group(function () {
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
        
        // Direct User Permissions Management
        Route::get('users/{user}/permissions', [App\Http\Controllers\Admin\UserPermissionController::class, 'edit'])
            ->name('users.permissions.edit')
            ->middleware('permission:assign_permissions');
        Route::put('users/{user}/permissions', [App\Http\Controllers\Admin\UserPermissionController::class, 'update'])
            ->name('users.permissions.update')
            ->middleware('permission:assign_permissions');
            
        // User Status Toggle
        Route::put('users/{user}/toggle-status', [App\Http\Controllers\Admin\UserStatusController::class, 'update'])
            ->name('users.toggle-status')
            ->middleware('permission:edit_users');
    });
    
    Route::middleware(['permission:view_roles'])->group(function () {
        Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    });
    
    // Categories Management
    Route::middleware(['permission:view_products'])->group(function () {
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    });
    
    // Customers Management
    Route::middleware(['permission:view_customers'])->group(function () {
        Route::resource('customers', App\Http\Controllers\Admin\CustomerController::class);
    });
    
    // Suppliers Management
    Route::middleware(['permission:view_inventory'])->group(function () {
        Route::resource('suppliers', App\Http\Controllers\Admin\SupplierController::class);
    });
    
    // Warehouses Management
    Route::middleware(['permission:view_inventory'])->group(function () {
        Route::resource('warehouses', App\Http\Controllers\Admin\WarehouseController::class);
    });
    
    // Warranties Management
    Route::middleware(['permission:view_warranties'])->group(function () {
        Route::resource('warranties', App\Http\Controllers\Admin\WarrantyController::class);
    });
    
    // Reports
    Route::middleware(['permission:view_reports'])->group(function () {
        Route::get('/reports/sales', [App\Http\Controllers\Admin\ReportsController::class, 'sales'])->name('reports.sales');
        Route::get('/reports/inventory', [App\Http\Controllers\Admin\ReportsController::class, 'inventory'])->name('reports.inventory');
    });
    
    // Admin products routes - require admin role or product management permission
    Route::middleware(['permission:view_products'])->group(function () {
        Route::get('/products', function () {
            // Placeholder for products index
            return "Products Index";
        })->name('products.index');
        
        Route::get('/products/stock', function () {
            // Placeholder for products stock
            return "Products Stock";
        })->name('products.stock');
    });
    
    // Admin orders routes - require admin role or order management permission
    Route::middleware(['permission:view_orders'])->group(function () {
        Route::get('/orders', function () {
            // Placeholder for orders index
            return "Orders Index";
        })->name('orders.index');
    });
});

// POS routes - require cashier, admin or manager role
Route::prefix('pos')->name('pos.')->middleware(['auth', 'role:admin|manager|cashier'])->group(function () {
    Route::get('/', function () {
        return view('pos.index');
    })->name('index');
});
