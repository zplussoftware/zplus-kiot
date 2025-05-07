# Cấu trúc thư mục và routes cho Z-Plus KIOT

## Cấu trúc thư mục controllers

```
app/
  Http/
    Controllers/
      HomeController.php           # Xử lý trang home và trang giới thiệu
      Auth/                        # Xử lý xác thực và phân quyền
        LoginController.php
        ForgotPasswordController.php
      Admin/                       # Luồng Admin
        DashboardController.php
        UserController.php
        RoleController.php
        PermissionController.php
        CategoryController.php
        UnitController.php
        ProductController.php
        ProductAttributeController.php
        ProductImageController.php
        ProductBundleController.php
        WarehouseController.php
        StockImportController.php
        WarehouseTransferController.php
        CustomerGroupController.php
        CustomerController.php
        SupplierController.php
        SupplierDebtController.php
        OrderController.php
        OrderPaymentController.php
        OrderStatusHistoryController.php
        WarrantyController.php
        WarrantyClaimController.php
        ReportController.php
        SettingsController.php
      POS/                         # Luồng POS
        POSController.php
        ShiftController.php
        POSProductController.php
        POSCartController.php
        POSPaymentController.php
        POSOrderController.php
        POSInvoiceController.php
      API/                         # API endpoints nếu cần
        ProductAPIController.php
        OrderAPIController.php
        CustomerAPIController.php
```

## Cấu trúc routes

```php
// routes/web.php

// 1. Luồng Home (Public)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/features', [HomeController::class, 'features'])->name('features');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

// Xác thực (sử dụng Breeze/Jetstream nhưng tắt đăng ký)
// Route::middleware('guest')->group(function() {
//    // Auth routes here
// });

// 2. Luồng Admin
Route::prefix('admin')->middleware(['auth', 'role:admin|manager'])->name('admin.')->group(function() {
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Quản lý người dùng và phân quyền
    Route::resource('users', Admin\UserController::class);
    Route::resource('roles', Admin\RoleController::class);
    Route::resource('permissions', Admin\PermissionController::class);
    
    // Quản lý danh mục và sản phẩm
    Route::resource('categories', Admin\CategoryController::class);
    Route::resource('units', Admin\UnitController::class);
    Route::resource('products', Admin\ProductController::class);
    Route::resource('product-attributes', Admin\ProductAttributeController::class);
    Route::post('products/{product}/images', [Admin\ProductImageController::class, 'store'])->name('products.images.store');
    Route::resource('product-bundles', Admin\ProductBundleController::class);
    
    // Quản lý kho hàng
    Route::resource('warehouses', Admin\WarehouseController::class);
    Route::resource('stock-imports', Admin\StockImportController::class);
    Route::resource('warehouse-transfers', Admin\WarehouseTransferController::class);
    
    // Quản lý khách hàng và nhà cung cấp
    Route::resource('customer-groups', Admin\CustomerGroupController::class);
    Route::resource('customers', Admin\CustomerController::class);
    Route::resource('suppliers', Admin\SupplierController::class);
    Route::resource('supplier-debts', Admin\SupplierDebtController::class);
    
    // Quản lý đơn hàng
    Route::resource('orders', Admin\OrderController::class);
    Route::resource('order-payments', Admin\OrderPaymentController::class);
    
    // Quản lý bảo hành
    Route::resource('warranties', Admin\WarrantyController::class);
    Route::resource('warranty-claims', Admin\WarrantyClaimController::class);
    
    // Báo cáo
    Route::prefix('reports')->name('reports.')->group(function() {
        Route::get('/sales', [Admin\ReportController::class, 'sales'])->name('sales');
        Route::get('/profit', [Admin\ReportController::class, 'profit'])->name('profit');
        Route::get('/inventory', [Admin\ReportController::class, 'inventory'])->name('inventory');
        Route::get('/bestselling', [Admin\ReportController::class, 'bestSelling'])->name('bestselling');
        Route::get('/debts', [Admin\ReportController::class, 'debts'])->name('debts');
    });
    
    // Cài đặt hệ thống
    Route::prefix('settings')->name('settings.')->group(function() {
        Route::get('/store', [Admin\SettingsController::class, 'storeSettings'])->name('store');
        Route::post('/store', [Admin\SettingsController::class, 'updateStoreSettings']);
        Route::get('/email', [Admin\SettingsController::class, 'emailSettings'])->name('email');
        Route::post('/email', [Admin\SettingsController::class, 'updateEmailSettings']);
        Route::get('/backup', [Admin\SettingsController::class, 'backupSettings'])->name('backup');
        Route::post('/backup', [Admin\SettingsController::class, 'updateBackupSettings']);
        Route::get('/invoice', [Admin\SettingsController::class, 'invoiceSettings'])->name('invoice');
        Route::post('/invoice', [Admin\SettingsController::class, 'updateInvoiceSettings']);
    });
});

// 3. Luồng POS
Route::prefix('pos')->middleware(['auth', 'role:admin|manager|sales'])->name('pos.')->group(function() {
    Route::get('/', [POS\POSController::class, 'index'])->name('index');
    
    // Quản lý ca làm việc
    Route::get('/shifts/open', [POS\ShiftController::class, 'openShift'])->name('shifts.open');
    Route::post('/shifts/open', [POS\ShiftController::class, 'storeOpenShift']);
    Route::get('/shifts/close', [POS\ShiftController::class, 'closeShift'])->name('shifts.close');
    Route::post('/shifts/close', [POS\ShiftController::class, 'storeCloseShift']);
    Route::get('/shifts/report', [POS\ShiftController::class, 'shiftReport'])->name('shifts.report');
    
    // Sản phẩm và giỏ hàng
    Route::get('/products', [POS\POSProductController::class, 'index'])->name('products.index');
    Route::get('/products/search', [POS\POSProductController::class, 'search'])->name('products.search');
    Route::get('/products/category/{category}', [POS\POSProductController::class, 'byCategory'])->name('products.category');
    
    Route::post('/cart/add', [POS\POSCartController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/update/{id}', [POS\POSCartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [POS\POSCartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/discount', [POS\POSCartController::class, 'applyDiscount'])->name('cart.discount');
    Route::post('/cart/customer', [POS\POSCartController::class, 'setCustomer'])->name('cart.customer');
    Route::get('/cart/hold', [POS\POSCartController::class, 'holdCart'])->name('cart.hold');
    Route::get('/cart/recall/{id}', [POS\POSCartController::class, 'recallCart'])->name('cart.recall');
    
    // Thanh toán và hóa đơn
    Route::get('/payment', [POS\POSPaymentController::class, 'showPayment'])->name('payment');
    Route::post('/payment/process', [POS\POSPaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment/complete/{order}', [POS\POSPaymentController::class, 'completePayment'])->name('payment.complete');
    
    Route::get('/invoice/{order}', [POS\POSInvoiceController::class, 'show'])->name('invoice.show');
    Route::get('/invoice/{order}/print', [POS\POSInvoiceController::class, 'print'])->name('invoice.print');
    Route::get('/warranty/{order}/print', [POS\POSInvoiceController::class, 'printWarranty'])->name('warranty.print');
    
    // Quản lý đơn hàng
    Route::get('/orders', [POS\POSOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [POS\POSOrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{order}/reprint', [POS\POSOrderController::class, 'reprint'])->name('orders.reprint');
    Route::post('/orders/{order}/cancel', [POS\POSOrderController::class, 'cancel'])->name('orders.cancel');
    Route::post('/orders/{order}/refund', [POS\POSOrderController::class, 'refund'])->name('orders.refund');
});

// API Routes nếu cần
// Route::prefix('api')->middleware('auth:sanctum')->group(function() {
//    // API endpoints here
// });
```

## Cấu trúc thư mục views

```
resources/
  views/
    layouts/
      app.blade.php             # Layout chung
      home.blade.php            # Layout cho trang home
      admin.blade.php           # Layout cho trang admin
      pos.blade.php             # Layout cho trang POS
    
    home/                       # Luồng Home (Public)
      index.blade.php
      about.blade.php
      contact.blade.php
      features.blade.php
      faq.blade.php
    
    auth/                       # Xác thực
      login.blade.php
      forgot-password.blade.php
      reset-password.blade.php
    
    admin/                      # Luồng Admin
      dashboard/
        index.blade.php
      users/
        index.blade.php
        create.blade.php
        edit.blade.php
        show.blade.php
      roles/
        ...
      permissions/
        ...
      categories/
        ...
      products/
        ...
      (các module khác tương tự)
    
    pos/                        # Luồng POS
      index.blade.php
      shifts/
        open.blade.php
        close.blade.php
        report.blade.php
      products/
        index.blade.php
      cart/
        index.blade.php
      payment/
        index.blade.php
        complete.blade.php
      orders/
        index.blade.php
        show.blade.php
      invoice/
        print.blade.php
      warranty/
        print.blade.php
```