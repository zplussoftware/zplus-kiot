@extends('layouts.home')

@section('title', 'Trang chủ')

@section('main-content')
    <!-- Hero Section -->
    <section class="bg-primary text-white py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Hệ thống quản lý bán hàng thông minh</h1>
                    <p class="lead mb-4">Z-Plus KIOT - Giải pháp quản lý toàn diện cho cửa hàng điện tử, điện thoại và dịch vụ bảo hành. Tối ưu hóa quy trình bán hàng, quản lý kho và chăm sóc khách hàng.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('login') }}" class="btn btn-light btn-lg px-4">Đăng nhập</a>
                        <a href="{{ route('features') }}" class="btn btn-outline-light btn-lg px-4">Tìm hiểu thêm</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <img src="{{ asset('images/hero-image.png') }}" alt="Z-Plus KIOT Dashboard" class="img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Tính năng nổi bật</h2>
                <p class="text-muted">Những công cụ mạnh mẽ giúp vận hành cửa hàng của bạn hiệu quả hơn</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-4">
                                <i class="bi bi-cart3 text-primary fs-1"></i>
                            </div>
                            <h4>Bán hàng POS</h4>
                            <p class="text-muted">Hệ thống bán hàng trực tiếp với giao diện thân thiện, dễ sử dụng. Xử lý đơn hàng nhanh chóng với nhiều hình thức thanh toán.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-4">
                                <i class="bi bi-box-seam text-primary fs-1"></i>
                            </div>
                            <h4>Quản lý kho hàng</h4>
                            <p class="text-muted">Theo dõi số lượng tồn kho theo thời gian thực, quản lý nhập xuất kho và cảnh báo hàng sắp hết.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-4">
                                <i class="bi bi-shield-check text-primary fs-1"></i>
                            </div>
                            <h4>Quản lý bảo hành</h4>
                            <p class="text-muted">Theo dõi thông tin bảo hành sản phẩm, tạo phiếu bảo hành và quản lý toàn bộ quy trình bảo hành.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('features') }}" class="btn btn-primary px-4 py-2">Xem tất cả tính năng</a>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('images/benefits-image.png') }}" alt="Z-Plus KIOT Benefits" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <h2 class="fw-bold mb-4">Lợi ích khi sử dụng Z-Plus KIOT</h2>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-start mb-4">
                            <div class="bg-primary rounded-circle p-2 me-3 mt-1">
                                <i class="bi bi-check2 text-white"></i>
                            </div>
                            <div>
                                <h5>Tăng hiệu quả bán hàng</h5>
                                <p class="text-muted">Giảm thời gian xử lý đơn hàng, tăng trải nghiệm khách hàng và tối ưu quy trình bán hàng.</p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start mb-4">
                            <div class="bg-primary rounded-circle p-2 me-3 mt-1">
                                <i class="bi bi-check2 text-white"></i>
                            </div>
                            <div>
                                <h5>Kiểm soát kho hàng hiệu quả</h5>
                                <p class="text-muted">Giảm thiểu tình trạng hết hàng hoặc tồn kho quá mức, tối ưu vốn lưu động.</p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start mb-4">
                            <div class="bg-primary rounded-circle p-2 me-3 mt-1">
                                <i class="bi bi-check2 text-white"></i>
                            </div>
                            <div>
                                <h5>Dữ liệu kinh doanh chính xác</h5>
                                <p class="text-muted">Các báo cáo và thống kê giúp đưa ra quyết định kinh doanh dựa trên dữ liệu thực tế.</p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start">
                            <div class="bg-primary rounded-circle p-2 me-3 mt-1">
                                <i class="bi bi-check2 text-white"></i>
                            </div>
                            <div>
                                <h5>Chăm sóc khách hàng tốt hơn</h5>
                                <p class="text-muted">Lưu trữ lịch sử mua hàng, thông tin bảo hành và tích điểm khách hàng thân thiết.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Khách hàng nói gì về chúng tôi</h2>
                <p class="text-muted">Những đánh giá từ khách hàng đã sử dụng Z-Plus KIOT</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex mb-4">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-4">"Z-Plus KIOT đã giúp cửa hàng của tôi tăng doanh số bán hàng lên 30% sau 3 tháng sử dụng. Hệ thống dễ sử dụng và đội ngũ hỗ trợ rất nhiệt tình."</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/testimonial-1.jpg') }}" class="rounded-circle me-3" width="50" height="50" alt="Testimonial">
                                <div>
                                    <h6 class="mb-0">Nguyễn Văn A</h6>
                                    <small class="text-muted">Chủ cửa hàng điện thoại MobileWorld</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex mb-4">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-4">"Hệ thống quản lý bảo hành của Z-Plus KIOT giúp chúng tôi tiết kiệm rất nhiều thời gian và giảm sai sót. Khách hàng rất hài lòng với quy trình bảo hành chuyên nghiệp."</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/testimonial-2.jpg') }}" class="rounded-circle me-3" width="50" height="50" alt="Testimonial">
                                <div>
                                    <h6 class="mb-0">Trần Thị B</h6>
                                    <small class="text-muted">Quản lý TechCenter</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex mb-4">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-half text-warning"></i>
                            </div>
                            <p class="mb-4">"Báo cáo thống kê chi tiết giúp tôi có cái nhìn tổng quan về tình hình kinh doanh. Hệ thống quản lý kho hàng giúp tôi tiết kiệm được nhiều chi phí tồn kho."</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/testimonial-3.jpg') }}" class="rounded-circle me-3" width="50" height="50" alt="Testimonial">
                                <div>
                                    <h6 class="mb-0">Lê Văn C</h6>
                                    <small class="text-muted">Giám đốc Gadget Store</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container py-5 text-center">
            <h2 class="fw-bold mb-4">Bắt đầu sử dụng Z-Plus KIOT ngay hôm nay</h2>
            <p class="lead mb-4">Trải nghiệm hệ thống quản lý bán hàng thông minh và toàn diện cho cửa hàng của bạn</p>
            <a href="{{ route('login') }}" class="btn btn-light btn-lg px-5">Dùng thử miễn phí</a>
        </div>
    </section>
@endsection