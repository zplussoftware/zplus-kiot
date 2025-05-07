@extends('layouts.home')

@section('title', 'Tính năng')

@section('main-content')
    <!-- Header Section -->
    <section class="bg-primary text-white py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="fw-bold mb-4">Tính năng của Z-Plus KIOT</h1>
                    <p class="lead">Khám phá các công cụ mạnh mẽ giúp vận hành cửa hàng của bạn trở nên hiệu quả hơn</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Overview -->
    <section class="py-5">
        <div class="container py-4">
            <!-- POS System Features -->
            <div class="row align-items-center mb-5 pb-5 border-bottom">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Hệ thống bán hàng POS</h2>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Giao diện trực quan, dễ sử dụng</h5>
                        <p class="text-muted">Thiết kế thân thiện, tối ưu cho màn hình cảm ứng và dễ dàng thao tác cho nhân viên bán hàng.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Xử lý đơn hàng nhanh chóng</h5>
                        <p class="text-muted">Tạo hóa đơn, áp dụng khuyến mãi và xử lý thanh toán chỉ trong vài thao tác đơn giản.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Đa dạng hình thức thanh toán</h5>
                        <p class="text-muted">Hỗ trợ nhiều phương thức thanh toán: tiền mặt, thẻ ngân hàng, ví điện tử và thanh toán kết hợp.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Quản lý ca làm việc</h5>
                        <p class="text-muted">Theo dõi doanh thu theo ca, kiểm soát thu chi và xuất báo cáo ca chi tiết.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/pos-feature.png') }}" alt="POS System" class="img-fluid rounded shadow-lg">
                </div>
            </div>

            <!-- Inventory Management Features -->
            <div class="row align-items-center mb-5 pb-5 border-bottom">
                <div class="col-lg-6 order-lg-2">
                    <h2 class="fw-bold mb-4">Quản lý kho hàng</h2>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Theo dõi hàng tồn thời gian thực</h5>
                        <p class="text-muted">Cập nhật số lượng sản phẩm tự động theo các hoạt động bán hàng và nhập kho.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Quản lý đa kho hàng</h5>
                        <p class="text-muted">Hỗ trợ nhiều kho hàng, chuyển kho và kiểm soát tồn kho tại từng địa điểm.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Theo dõi serial sản phẩm</h5>
                        <p class="text-muted">Quản lý chi tiết từng sản phẩm theo số serial, đặc biệt hữu ích cho thiết bị điện tử.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Cảnh báo tồn kho</h5>
                        <p class="text-muted">Thông báo khi sản phẩm sắp hết hàng hoặc tồn kho vượt ngưỡng cho phép.</p>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <img src="{{ asset('images/inventory-feature.png') }}" alt="Inventory Management" class="img-fluid rounded shadow-lg">
                </div>
            </div>

            <!-- Warranty Management Features -->
            <div class="row align-items-center mb-5 pb-5 border-bottom">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Quản lý bảo hành</h2>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Theo dõi thông tin bảo hành</h5>
                        <p class="text-muted">Lưu trữ thông tin bảo hành cho từng sản phẩm theo serial và thời hạn bảo hành.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Quản lý quy trình bảo hành</h5>
                        <p class="text-muted">Theo dõi trạng thái bảo hành từ lúc tiếp nhận đến khi hoàn thành và trả hàng cho khách.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> In phiếu bảo hành</h5>
                        <p class="text-muted">Tạo và in phiếu bảo hành chuyên nghiệp cho khách hàng khi mua sản phẩm.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Thông báo hết hạn bảo hành</h5>
                        <p class="text-muted">Cảnh báo khi sản phẩm sắp hết hạn bảo hành, tạo cơ hội bán gia hạn cho khách hàng.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/warranty-feature.png') }}" alt="Warranty Management" class="img-fluid rounded shadow-lg">
                </div>
            </div>

            <!-- Customer Management Features -->
            <div class="row align-items-center mb-5 pb-5 border-bottom">
                <div class="col-lg-6 order-lg-2">
                    <h2 class="fw-bold mb-4">Quản lý khách hàng</h2>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Hồ sơ khách hàng chi tiết</h5>
                        <p class="text-muted">Lưu trữ thông tin liên hệ, lịch sử mua hàng và thói quen mua sắm của khách hàng.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Phân nhóm khách hàng</h5>
                        <p class="text-muted">Phân loại khách hàng theo nhóm, áp dụng chính sách giá và ưu đãi riêng cho từng nhóm.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Tích điểm khách hàng thân thiết</h5>
                        <p class="text-muted">Hệ thống tích điểm và đổi quà tặng dành cho khách hàng trung thành.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Quản lý công nợ khách hàng</h5>
                        <p class="text-muted">Theo dõi công nợ và lịch sử thanh toán của khách hàng mua trả góp hoặc ghi nợ.</p>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <img src="{{ asset('images/customer-feature.png') }}" alt="Customer Management" class="img-fluid rounded shadow-lg">
                </div>
            </div>

            <!-- Reporting Features -->
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Báo cáo và thống kê</h2>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Báo cáo doanh thu</h5>
                        <p class="text-muted">Thống kê doanh thu theo ngày, tuần, tháng, năm và so sánh với các kỳ trước.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Báo cáo lợi nhuận</h5>
                        <p class="text-muted">Phân tích chi tiết lợi nhuận theo sản phẩm, danh mục và khoảng thời gian.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Báo cáo hàng tồn kho</h5>
                        <p class="text-muted">Theo dõi sản phẩm bán chạy, hàng tồn lâu ngày và giá trị tồn kho.</p>
                    </div>
                    <div class="mb-4">
                        <h5><i class="bi bi-check-circle-fill text-primary me-2"></i> Biểu đồ trực quan</h5>
                        <p class="text-muted">Dữ liệu được hiển thị dưới dạng biểu đồ trực quan, dễ dàng nắm bắt thông tin.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/report-feature.png') }}" alt="Reporting and Analytics" class="img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Comparison Table -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">So sánh các gói dịch vụ</h2>
                <p class="text-muted">Lựa chọn gói phù hợp với nhu cầu kinh doanh của bạn</p>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Tính năng</th>
                            <th class="text-center">Gói Cơ bản</th>
                            <th class="text-center">Gói Nâng cao</th>
                            <th class="text-center">Gói Doanh nghiệp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Số lượng người dùng</td>
                            <td class="text-center">2</td>
                            <td class="text-center">5</td>
                            <td class="text-center">Không giới hạn</td>
                        </tr>
                        <tr>
                            <td>Hệ thống bán hàng POS</td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Quản lý kho cơ bản</td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Quản lý khách hàng</td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Quản lý đa kho hàng</td>
                            <td class="text-center"><i class="bi bi-dash text-muted"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Quản lý bảo hành</td>
                            <td class="text-center"><i class="bi bi-dash text-muted"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Báo cáo chuyên sâu</td>
                            <td class="text-center"><i class="bi bi-dash text-muted"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Quản lý nhà cung cấp</td>
                            <td class="text-center"><i class="bi bi-dash text-muted"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Tích hợp API</td>
                            <td class="text-center"><i class="bi bi-dash text-muted"></i></td>
                            <td class="text-center"><i class="bi bi-dash text-muted"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Hỗ trợ 24/7</td>
                            <td class="text-center"><i class="bi bi-dash text-muted"></i></td>
                            <td class="text-center"><i class="bi bi-dash text-muted"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Tùy chỉnh theo yêu cầu</td>
                            <td class="text-center"><i class="bi bi-dash text-muted"></i></td>
                            <td class="text-center"><i class="bi bi-dash text-muted"></i></td>
                            <td class="text-center"><i class="bi bi-check-lg text-success"></i></td>
                        </tr>
                        <tr class="bg-light">
                            <td><strong>Giá tháng</strong></td>
                            <td class="text-center"><strong>499.000đ</strong></td>
                            <td class="text-center"><strong>999.000đ</strong></td>
                            <td class="text-center"><strong>Liên hệ</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('contact') }}" class="btn btn-primary px-4 py-2">Liên hệ tư vấn</a>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white">
        <div class="container py-4 text-center">
            <h2 class="fw-bold mb-4">Sẵn sàng nâng cấp hệ thống quản lý cho cửa hàng của bạn?</h2>
            <p class="lead mb-4">Trải nghiệm ngay Z-Plus KIOT với gói dùng thử miễn phí 14 ngày</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('login') }}" class="btn btn-light btn-lg px-4">Dùng thử miễn phí</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-4">Tư vấn chi tiết</a>
            </div>
        </div>
    </section>
@endsection