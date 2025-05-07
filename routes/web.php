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
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin|manager'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Admin products routes - require admin role or product management permission
    Route::middleware(['permission:manage products'])->group(function () {
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
    Route::middleware(['permission:manage orders'])->group(function () {
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
