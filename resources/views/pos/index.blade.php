@extends('layouts.pos')

@section('title', 'POS - Bán hàng')

@section('pos-content')
    <div class="d-flex h-100">
        <!-- Product Grid Area (Left) -->
        <div class="flex-grow-1 bg-white p-3 overflow-auto" style="height: calc(100vh - 125px);">
            <!-- Product Categories -->
            <div class="mb-3">
                <div class="d-flex align-items-center mb-3">
                    <h5 class="mb-0">Danh mục</h5>
                    <div class="ms-auto">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-outline-secondary active">
                                <i class="bi bi-grid"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-primary">Tất cả</button>
                    <button class="btn btn-outline-secondary">Điện thoại</button>
                    <button class="btn btn-outline-secondary">Laptop</button>
                    <button class="btn btn-outline-secondary">Máy tính bảng</button>
                    <button class="btn btn-outline-secondary">Đồng hồ thông minh</button>
                    <button class="btn btn-outline-secondary">Phụ kiện</button>
                    <button class="btn btn-outline-secondary">Sạc & Cáp</button>
                    <button class="btn btn-outline-secondary">Ốp lưng</button>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="row g-3">
                <!-- Product 1 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 product-card border-0 shadow-sm" data-id="P001" data-name="iPhone 14 Pro Max" data-price="29990000">
                        <img src="{{ asset('images/products/phone-1.jpg') }}" class="card-img-top" alt="iPhone 14 Pro Max">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title mb-1">iPhone 14 Pro Max</h6>
                            <p class="small text-muted mb-2">256GB, Đen</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">29,990,000đ</span>
                                <span class="badge bg-success">Còn 15</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 product-card border-0 shadow-sm" data-id="P002" data-name="Samsung Galaxy S23" data-price="22990000">
                        <img src="{{ asset('images/products/phone-2.jpg') }}" class="card-img-top" alt="Samsung Galaxy S23">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title mb-1">Samsung Galaxy S23</h6>
                            <p class="small text-muted mb-2">256GB, Xanh</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">22,990,000đ</span>
                                <span class="badge bg-success">Còn 8</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 product-card border-0 shadow-sm" data-id="P003" data-name="MacBook Pro M2" data-price="39990000">
                        <img src="{{ asset('images/products/laptop-1.jpg') }}" class="card-img-top" alt="MacBook Pro M2">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title mb-1">MacBook Pro M2</h6>
                            <p class="small text-muted mb-2">512GB, Bạc</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">39,990,000đ</span>
                                <span class="badge bg-success">Còn 5</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 product-card border-0 shadow-sm" data-id="P004" data-name="iPad Air 5" data-price="16990000">
                        <img src="{{ asset('images/products/tablet-1.jpg') }}" class="card-img-top" alt="iPad Air 5">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title mb-1">iPad Air 5</h6>
                            <p class="small text-muted mb-2">64GB, Xanh dương</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">16,990,000đ</span>
                                <span class="badge bg-danger">Còn 3</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 5 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 product-card border-0 shadow-sm" data-id="P005" data-name="Apple Watch Series 8" data-price="10990000">
                        <img src="{{ asset('images/products/watch-1.jpg') }}" class="card-img-top" alt="Apple Watch Series 8">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title mb-1">Apple Watch Series 8</h6>
                            <p class="small text-muted mb-2">GPS, 45mm, Đen</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">10,990,000đ</span>
                                <span class="badge bg-success">Còn 12</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 6 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 product-card border-0 shadow-sm" data-id="P006" data-name="AirPods Pro 2" data-price="6790000">
                        <img src="{{ asset('images/products/earbuds-1.jpg') }}" class="card-img-top" alt="AirPods Pro 2">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title mb-1">AirPods Pro 2</h6>
                            <p class="small text-muted mb-2">Trắng</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">6,790,000đ</span>
                                <span class="badge bg-success">Còn 20</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 7 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 product-card border-0 shadow-sm" data-id="P007" data-name="Sạc Apple 20W" data-price="590000">
                        <img src="{{ asset('images/products/adapter-1.jpg') }}" class="card-img-top" alt="Sạc Apple 20W">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title mb-1">Sạc Apple 20W</h6>
                            <p class="small text-muted mb-2">Type-C, Trắng</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">590,000đ</span>
                                <span class="badge bg-warning text-dark">Còn 5</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 8 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 product-card border-0 shadow-sm" data-id="P008" data-name="Cáp USB-C to Lightning" data-price="490000">
                        <img src="{{ asset('images/products/cable-1.jpg') }}" class="card-img-top" alt="Cáp USB-C to Lightning">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title mb-1">Cáp USB-C to Lightning</h6>
                            <p class="small text-muted mb-2">1m, Trắng</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">490,000đ</span>
                                <span class="badge bg-warning text-dark">Còn 8</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart Area (Right) -->
        <div class="bg-light border-start" style="width: 450px; height: calc(100vh - 125px); overflow-y: auto;">
            <div class="d-flex flex-column h-100">
                <!-- Customer Info -->
                <div class="p-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Thông tin khách hàng</h5>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-person-plus"></i> Thêm KH
                        </button>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Tìm khách hàng">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    <div class="d-flex justify-content-between small text-muted">
                        <span>Khách lẻ</span>
                        <button class="btn btn-link btn-sm p-0 text-decoration-none">Xóa</button>
                    </div>
                </div>

                <!-- Cart Items -->
                <div class="p-3 flex-grow-1 overflow-auto">
                    <h5 class="mb-3">Giỏ hàng <span class="badge bg-primary" id="cart-count">2</span></h5>
                    <div class="cart-items">
                        <!-- Cart Item 1 -->
                        <div class="card mb-2 border-0 shadow-sm cart-item" data-id="P001">
                            <div class="card-body p-2">
                                <div class="d-flex">
                                    <img src="{{ asset('images/products/phone-1.jpg') }}" alt="iPhone 14 Pro Max" class="rounded me-2" width="50" height="50">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h6 class="mb-0 cart-item-name">iPhone 14 Pro Max</h6>
                                            <button class="btn btn-sm text-danger p-0 cart-remove">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </div>
                                        <div class="small text-muted mb-2">256GB, Đen</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="input-group input-group-sm quantity-control" style="width: 100px;">
                                                <button class="btn btn-outline-secondary quantity-down" type="button">-</button>
                                                <input type="text" class="form-control text-center quantity" value="1">
                                                <button class="btn btn-outline-secondary quantity-up" type="button">+</button>
                                            </div>
                                            <span class="fw-bold text-primary cart-item-price">29,990,000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cart Item 2 -->
                        <div class="card mb-2 border-0 shadow-sm cart-item" data-id="P006">
                            <div class="card-body p-2">
                                <div class="d-flex">
                                    <img src="{{ asset('images/products/earbuds-1.jpg') }}" alt="AirPods Pro 2" class="rounded me-2" width="50" height="50">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h6 class="mb-0 cart-item-name">AirPods Pro 2</h6>
                                            <button class="btn btn-sm text-danger p-0 cart-remove">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </div>
                                        <div class="small text-muted mb-2">Trắng</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="input-group input-group-sm quantity-control" style="width: 100px;">
                                                <button class="btn btn-outline-secondary quantity-down" type="button">-</button>
                                                <input type="text" class="form-control text-center quantity" value="1">
                                                <button class="btn btn-outline-secondary quantity-up" type="button">+</button>
                                            </div>
                                            <span class="fw-bold text-primary cart-item-price">6,790,000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="p-3 border-top bg-white">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tạm tính:</span>
                        <span id="subtotal">36,780,000đ</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Giảm giá:</span>
                        <span id="discount">0đ</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-bold">Tổng tiền:</span>
                        <span class="fw-bold text-primary fs-5" id="total">36,780,000đ</span>
                    </div>
                    
                    <div class="row g-2 mb-3">
                        <div class="col">
                            <button class="btn btn-outline-primary w-100">
                                <i class="bi bi-tag"></i> Khuyến mãi
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-primary w-100">
                                <i class="bi bi-wallet2"></i> Thanh toán
                            </button>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary w-100 py-2">
                        <i class="bi bi-check-circle me-2"></i> Hoàn tất đơn hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add product to cart
            const productCards = document.querySelectorAll('.product-card');
            productCards.forEach(card => {
                card.addEventListener('click', function() {
                    alert('Đã thêm ' + this.dataset.name + ' vào giỏ hàng');
                });
            });
            
            // Quantity buttons
            const quantityUp = document.querySelectorAll('.quantity-up');
            const quantityDown = document.querySelectorAll('.quantity-down');
            
            quantityUp.forEach(btn => {
                btn.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('.quantity');
                    input.value = parseInt(input.value) + 1;
                });
            });
            
            quantityDown.forEach(btn => {
                btn.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('.quantity');
                    if (parseInt(input.value) > 1) {
                        input.value = parseInt(input.value) - 1;
                    }
                });
            });
            
            // Remove cart item
            const removeButtons = document.querySelectorAll('.cart-remove');
            removeButtons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (confirm('Bạn có chắc muốn xóa sản phẩm này?')) {
                        this.closest('.cart-item').remove();
                        // Update cart count
                        document.getElementById('cart-count').textContent = document.querySelectorAll('.cart-item').length;
                    }
                });
            });
        });
    </script>
    @endpush
@endsection