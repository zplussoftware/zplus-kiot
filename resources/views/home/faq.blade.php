@extends('layouts.home')

@section('title', 'Câu hỏi thường gặp')

@section('main-content')
    <!-- Header Section -->
    <section class="bg-primary text-white py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="fw-bold mb-4">Câu hỏi thường gặp</h1>
                    <p class="lead">Giải đáp những thắc mắc của bạn về Z-Plus KIOT</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="sticky-lg-top pt-3" style="top: 2rem;">
                        <h3 class="fw-bold mb-4">Danh mục câu hỏi</h3>
                        <div class="list-group">
                            <a href="#general" class="list-group-item list-group-item-action">Thông tin chung</a>
                            <a href="#subscription" class="list-group-item list-group-item-action">Đăng ký & Thanh toán</a>
                            <a href="#features" class="list-group-item list-group-item-action">Tính năng sản phẩm</a>
                            <a href="#technical" class="list-group-item list-group-item-action">Hỗ trợ kỹ thuật</a>
                            <a href="#security" class="list-group-item list-group-item-action">Bảo mật & Dữ liệu</a>
                        </div>
                        <div class="mt-4 p-4 bg-light rounded">
                            <h5 class="mb-3">Bạn cần hỗ trợ thêm?</h5>
                            <p class="text-muted mb-3">Nếu bạn không tìm thấy câu trả lời cho thắc mắc của mình, vui lòng liên hệ với chúng tôi.</p>
                            <a href="{{ route('contact') }}" class="btn btn-primary">Liên hệ hỗ trợ</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- General Questions -->
                    <div id="general" class="mb-5">
                        <h3 class="fw-bold mb-4">Thông tin chung</h3>
                        <div class="accordion" id="accordionGeneral">
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseG1" aria-expanded="true" aria-controls="collapseG1">
                                        Z-Plus KIOT là gì?
                                    </button>
                                </h2>
                                <div id="collapseG1" class="accordion-collapse collapse show" data-bs-parent="#accordionGeneral">
                                    <div class="accordion-body">
                                        <p>Z-Plus KIOT là hệ thống quản lý bán hàng và kho hàng toàn diện dành cho các cửa hàng kinh doanh thiết bị điện tử, điện thoại di động và dịch vụ bảo hành. Hệ thống bao gồm nhiều module như: quản lý bán hàng POS, quản lý kho hàng, quản lý bảo hành, quản lý khách hàng, báo cáo thống kê và nhiều tính năng khác.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseG2" aria-expanded="false" aria-controls="collapseG2">
                                        Z-Plus KIOT phù hợp với những đối tượng nào?
                                    </button>
                                </h2>
                                <div id="collapseG2" class="accordion-collapse collapse" data-bs-parent="#accordionGeneral">
                                    <div class="accordion-body">
                                        <p>Z-Plus KIOT được thiết kế đặc biệt dành cho:</p>
                                        <ul>
                                            <li>Cửa hàng kinh doanh điện thoại di động, máy tính, thiết bị điện tử</li>
                                            <li>Cửa hàng có dịch vụ sửa chữa và bảo hành thiết bị điện tử</li>
                                            <li>Chuỗi cửa hàng điện tử có nhiều chi nhánh</li>
                                            <li>Doanh nghiệp nhập khẩu và phân phối thiết bị điện tử</li>
                                        </ul>
                                        <p>Hệ thống có thể mở rộng và phù hợp với quy mô từ cửa hàng nhỏ đến doanh nghiệp lớn.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseG3" aria-expanded="false" aria-controls="collapseG3">
                                        Lợi ích khi sử dụng Z-Plus KIOT?
                                    </button>
                                </h2>
                                <div id="collapseG3" class="accordion-collapse collapse" data-bs-parent="#accordionGeneral">
                                    <div class="accordion-body">
                                        <p>Khi sử dụng Z-Plus KIOT, bạn sẽ nhận được những lợi ích sau:</p>
                                        <ul>
                                            <li>Tối ưu hóa quy trình bán hàng, giảm thời gian xử lý đơn hàng</li>
                                            <li>Kiểm soát tồn kho hiệu quả, cảnh báo hết hàng và hàng tồn quá mức</li>
                                            <li>Quản lý thông tin bảo hành sản phẩm chính xác, dễ dàng</li>
                                            <li>Tích lũy dữ liệu khách hàng, tăng cường chăm sóc và giữ chân khách hàng</li>
                                            <li>Báo cáo doanh thu, lợi nhuận chi tiết giúp đưa ra quyết định kinh doanh tốt hơn</li>
                                            <li>Tiết kiệm chi phí vận hành và nhân sự</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subscription Questions -->
                    <div id="subscription" class="mb-5">
                        <h3 class="fw-bold mb-4">Đăng ký & Thanh toán</h3>
                        <div class="accordion" id="accordionSubscription">
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseS1" aria-expanded="true" aria-controls="collapseS1">
                                        Chi phí sử dụng Z-Plus KIOT là bao nhiêu?
                                    </button>
                                </h2>
                                <div id="collapseS1" class="accordion-collapse collapse show" data-bs-parent="#accordionSubscription">
                                    <div class="accordion-body">
                                        <p>Z-Plus KIOT cung cấp 3 gói dịch vụ với mức giá như sau:</p>
                                        <ul>
                                            <li><strong>Gói Cơ bản:</strong> 499.000đ/tháng, phù hợp với cửa hàng đơn lẻ, quy mô nhỏ</li>
                                            <li><strong>Gói Nâng cao:</strong> 999.000đ/tháng, phù hợp với cửa hàng có quy mô vừa</li>
                                            <li><strong>Gói Doanh nghiệp:</strong> Liên hệ báo giá, phù hợp với chuỗi cửa hàng hoặc doanh nghiệp lớn</li>
                                        </ul>
                                        <p>Bạn có thể thanh toán theo tháng hoặc năm (giảm 10% khi thanh toán theo năm).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseS2" aria-expanded="false" aria-controls="collapseS2">
                                        Làm thế nào để đăng ký dùng thử?
                                    </button>
                                </h2>
                                <div id="collapseS2" class="accordion-collapse collapse" data-bs-parent="#accordionSubscription">
                                    <div class="accordion-body">
                                        <p>Bạn có thể đăng ký dùng thử Z-Plus KIOT miễn phí trong 14 ngày bằng cách:</p>
                                        <ol>
                                            <li>Truy cập trang web của chúng tôi</li>
                                            <li>Nhấp vào nút "Dùng thử miễn phí"</li>
                                            <li>Điền thông tin đăng ký và xác nhận email</li>
                                            <li>Hệ thống sẽ được thiết lập tự động và bạn có thể bắt đầu sử dụng ngay</li>
                                        </ol>
                                        <p>Trong thời gian dùng thử, bạn sẽ được hỗ trợ hướng dẫn sử dụng và tư vấn lựa chọn gói dịch vụ phù hợp.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseS3" aria-expanded="false" aria-controls="collapseS3">
                                        Phương thức thanh toán nào được chấp nhận?
                                    </button>
                                </h2>
                                <div id="collapseS3" class="accordion-collapse collapse" data-bs-parent="#accordionSubscription">
                                    <div class="accordion-body">
                                        <p>Z-Plus KIOT chấp nhận nhiều phương thức thanh toán khác nhau:</p>
                                        <ul>
                                            <li>Chuyển khoản ngân hàng</li>
                                            <li>Thanh toán qua thẻ tín dụng/ghi nợ (Visa, Mastercard, JCB)</li>
                                            <li>Ví điện tử (MoMo, ZaloPay, VNPay)</li>
                                            <li>Thanh toán qua QR Code</li>
                                        </ul>
                                        <p>Sau khi thanh toán, hệ thống sẽ tự động kích hoạt gói dịch vụ của bạn và gửi hóa đơn VAT qua email.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Features Questions -->
                    <div id="features" class="mb-5">
                        <h3 class="fw-bold mb-4">Tính năng sản phẩm</h3>
                        <div class="accordion" id="accordionFeatures">
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseF1" aria-expanded="true" aria-controls="collapseF1">
                                        Z-Plus KIOT có những tính năng chính nào?
                                    </button>
                                </h2>
                                <div id="collapseF1" class="accordion-collapse collapse show" data-bs-parent="#accordionFeatures">
                                    <div class="accordion-body">
                                        <p>Z-Plus KIOT cung cấp nhiều tính năng toàn diện cho việc quản lý cửa hàng điện tử:</p>
                                        <ul>
                                            <li><strong>Quản lý bán hàng POS:</strong> Bán hàng nhanh chóng, xử lý nhiều hình thức thanh toán, in hóa đơn</li>
                                            <li><strong>Quản lý kho hàng:</strong> Theo dõi tồn kho, nhập xuất kho, chuyển kho, kiểm kê</li>
                                            <li><strong>Quản lý sản phẩm:</strong> Thông tin sản phẩm, giá bán, giá nhập, mã vạch, serial</li>
                                            <li><strong>Quản lý bảo hành:</strong> Theo dõi thông tin bảo hành, tạo phiếu bảo hành, quản lý quy trình bảo hành</li>
                                            <li><strong>Quản lý khách hàng:</strong> Thông tin khách hàng, lịch sử mua hàng, công nợ, tích điểm</li>
                                            <li><strong>Quản lý nhà cung cấp:</strong> Thông tin nhà cung cấp, lịch sử nhập hàng, công nợ</li>
                                            <li><strong>Báo cáo thống kê:</strong> Doanh thu, lợi nhuận, tồn kho, bán hàng theo nhân viên</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseF2" aria-expanded="false" aria-controls="collapseF2">
                                        Sự khác biệt giữa các gói dịch vụ là gì?
                                    </button>
                                </h2>
                                <div id="collapseF2" class="accordion-collapse collapse" data-bs-parent="#accordionFeatures">
                                    <div class="accordion-body">
                                        <p>Mỗi gói dịch vụ của Z-Plus KIOT có những tính năng khác nhau:</p>
                                        <p><strong>Gói Cơ bản:</strong></p>
                                        <ul>
                                            <li>2 tài khoản người dùng</li>
                                            <li>Quản lý bán hàng POS cơ bản</li>
                                            <li>Quản lý kho hàng cơ bản</li>
                                            <li>Quản lý khách hàng</li>
                                            <li>Báo cáo cơ bản</li>
                                        </ul>
                                        <p><strong>Gói Nâng cao:</strong></p>
                                        <ul>
                                            <li>5 tài khoản người dùng</li>
                                            <li>Tất cả tính năng của gói Cơ bản</li>
                                            <li>Quản lý đa kho hàng</li>
                                            <li>Quản lý bảo hành</li>
                                            <li>Quản lý nhà cung cấp</li>
                                            <li>Báo cáo chuyên sâu</li>
                                        </ul>
                                        <p><strong>Gói Doanh nghiệp:</strong></p>
                                        <ul>
                                            <li>Không giới hạn tài khoản người dùng</li>
                                            <li>Tất cả tính năng của gói Nâng cao</li>
                                            <li>Tích hợp API</li>
                                            <li>Tùy chỉnh theo yêu cầu</li>
                                            <li>Hỗ trợ 24/7</li>
                                            <li>Đào tạo nhân viên</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseF3" aria-expanded="false" aria-controls="collapseF3">
                                        Có thể sử dụng Z-Plus KIOT trên những thiết bị nào?
                                    </button>
                                </h2>
                                <div id="collapseF3" class="accordion-collapse collapse" data-bs-parent="#accordionFeatures">
                                    <div class="accordion-body">
                                        <p>Z-Plus KIOT là hệ thống đa nền tảng, có thể sử dụng trên nhiều thiết bị khác nhau:</p>
                                        <ul>
                                            <li><strong>Máy tính:</strong> Windows, macOS, Linux thông qua trình duyệt web</li>
                                            <li><strong>Máy tính bảng:</strong> iPad, Android tablet</li>
                                            <li><strong>Điện thoại thông minh:</strong> iPhone, Android</li>
                                            <li><strong>Máy POS chuyên dụng:</strong> Tương thích với nhiều thiết bị POS phổ biến</li>
                                        </ul>
                                        <p>Hệ thống được tối ưu hóa cho các thiết bị có màn hình cảm ứng, giúp việc sử dụng POS trở nên dễ dàng và nhanh chóng.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Technical Support Questions -->
                    <div id="technical" class="mb-5">
                        <h3 class="fw-bold mb-4">Hỗ trợ kỹ thuật</h3>
                        <div class="accordion" id="accordionTechnical">
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseT1" aria-expanded="true" aria-controls="collapseT1">
                                        Làm thế nào để liên hệ hỗ trợ kỹ thuật?
                                    </button>
                                </h2>
                                <div id="collapseT1" class="accordion-collapse collapse show" data-bs-parent="#accordionTechnical">
                                    <div class="accordion-body">
                                        <p>Bạn có thể liên hệ hỗ trợ kỹ thuật của Z-Plus KIOT qua nhiều kênh:</p>
                                        <ul>
                                            <li><strong>Live chat:</strong> Trực tiếp trên hệ thống Z-Plus KIOT</li>
                                            <li><strong>Email:</strong> support@zpluskiot.com</li>
                                            <li><strong>Hotline:</strong> 1900 1234 (8:00 - 18:00, thứ Hai - thứ Bảy)</li>
                                            <li><strong>Ticket hỗ trợ:</strong> Tạo ticket hỗ trợ từ tài khoản của bạn</li>
                                        </ul>
                                        <p>Đối với gói Doanh nghiệp, bạn sẽ có người quản lý tài khoản riêng và số hotline hỗ trợ 24/7.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseT2" aria-expanded="false" aria-controls="collapseT2">
                                        Z-Plus KIOT có tài liệu hướng dẫn sử dụng không?
                                    </button>
                                </h2>
                                <div id="collapseT2" class="accordion-collapse collapse" data-bs-parent="#accordionTechnical">
                                    <div class="accordion-body">
                                        <p>Có, Z-Plus KIOT cung cấp nhiều tài liệu hướng dẫn sử dụng chi tiết:</p>
                                        <ul>
                                            <li><strong>Tài liệu hướng dẫn trực tuyến:</strong> Tổng hợp các hướng dẫn sử dụng từng tính năng</li>
                                            <li><strong>Video hướng dẫn:</strong> Các video ngắn hướng dẫn thao tác từng chức năng</li>
                                            <li><strong>Câu hỏi thường gặp (FAQ):</strong> Giải đáp các thắc mắc phổ biến</li>
                                            <li><strong>Webinar đào tạo:</strong> Các buổi đào tạo trực tuyến định kỳ cho khách hàng mới</li>
                                        </ul>
                                        <p>Tất cả tài liệu này đều có thể truy cập từ trang Trung tâm Hỗ trợ trong tài khoản của bạn.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseT3" aria-expanded="false" aria-controls="collapseT3">
                                        Z-Plus KIOT có cung cấp dịch vụ cài đặt và đào tạo không?
                                    </button>
                                </h2>
                                <div id="collapseT3" class="accordion-collapse collapse" data-bs-parent="#accordionTechnical">
                                    <div class="accordion-body">
                                        <p>Có, Z-Plus KIOT cung cấp dịch vụ cài đặt và đào tạo sử dụng hệ thống:</p>
                                        <ul>
                                            <li><strong>Cài đặt từ xa:</strong> Miễn phí cho tất cả các gói dịch vụ</li>
                                            <li><strong>Cài đặt trực tiếp tại cửa hàng:</strong> Phí bổ sung, tùy thuộc vào địa điểm</li>
                                            <li><strong>Đào tạo từ xa:</strong> 2 buổi miễn phí cho gói Cơ bản, 4 buổi cho gói Nâng cao</li>
                                            <li><strong>Đào tạo trực tiếp:</strong> Phí bổ sung, tùy thuộc vào địa điểm và thời gian</li>
                                            <li><strong>Nhập dữ liệu ban đầu:</strong> Hỗ trợ nhập dữ liệu sản phẩm, khách hàng từ Excel</li>
                                        </ul>
                                        <p>Gói Doanh nghiệp bao gồm dịch vụ cài đặt và đào tạo toàn diện, có thể tùy chỉnh theo nhu cầu cụ thể.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Questions -->
                    <div id="security">
                        <h3 class="fw-bold mb-4">Bảo mật & Dữ liệu</h3>
                        <div class="accordion" id="accordionSecurity">
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSec1" aria-expanded="true" aria-controls="collapseSec1">
                                        Z-Plus KIOT đảm bảo bảo mật dữ liệu như thế nào?
                                    </button>
                                </h2>
                                <div id="collapseSec1" class="accordion-collapse collapse show" data-bs-parent="#accordionSecurity">
                                    <div class="accordion-body">
                                        <p>Z-Plus KIOT áp dụng nhiều biện pháp bảo mật mạnh mẽ để bảo vệ dữ liệu của khách hàng:</p>
                                        <ul>
                                            <li><strong>Mã hóa dữ liệu:</strong> Sử dụng mã hóa 256-bit SSL/TLS cho tất cả dữ liệu truyền tải</li>
                                            <li><strong>Bảo mật máy chủ:</strong> Hệ thống máy chủ được đặt tại các trung tâm dữ liệu cấp quốc tế với tiêu chuẩn bảo mật cao</li>
                                            <li><strong>Xác thực hai lớp:</strong> Tùy chọn xác thực hai lớp (2FA) để bảo vệ tài khoản</li>
                                            <li><strong>Phân quyền người dùng:</strong> Hệ thống phân quyền chi tiết cho từng tài khoản</li>
                                            <li><strong>Sao lưu dữ liệu:</strong> Tự động sao lưu dữ liệu hàng ngày</li>
                                            <li><strong>Kiểm tra bảo mật:</strong> Thường xuyên kiểm tra và cập nhật các biện pháp bảo mật</li>
                                        </ul>
                                        <p>Chúng tôi tuân thủ nghiêm ngặt các quy định về bảo vệ dữ liệu và quyền riêng tư của khách hàng.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSec2" aria-expanded="false" aria-controls="collapseSec2">
                                        Dữ liệu của tôi được lưu trữ ở đâu?
                                    </button>
                                </h2>
                                <div id="collapseSec2" class="accordion-collapse collapse" data-bs-parent="#accordionSecurity">
                                    <div class="accordion-body">
                                        <p>Dữ liệu của khách hàng Z-Plus KIOT được lưu trữ an toàn trên hệ thống máy chủ đám mây:</p>
                                        <ul>
                                            <li>Đối với khách hàng tại Việt Nam, dữ liệu được lưu trữ tại các trung tâm dữ liệu trong nước, đảm bảo tốc độ truy cập nhanh và tuân thủ quy định pháp luật Việt Nam về lưu trữ dữ liệu</li>
                                            <li>Hệ thống sử dụng cơ sở hạ tầng đám mây của các nhà cung cấp hàng đầu (AWS, Google Cloud) với các tiêu chuẩn bảo mật quốc tế</li>
                                            <li>Dữ liệu được sao lưu tự động hàng ngày và lưu trữ ở nhiều vị trí khác nhau để đảm bảo an toàn</li>
                                        </ul>
                                        <p>Đối với gói Doanh nghiệp, chúng tôi có thể cung cấp giải pháp lưu trữ dữ liệu riêng theo yêu cầu.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border mb-3 rounded shadow-sm">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSec3" aria-expanded="false" aria-controls="collapseSec3">
                                        Tôi có thể xuất dữ liệu ra khỏi hệ thống không?
                                    </button>
                                </h2>
                                <div id="collapseSec3" class="accordion-collapse collapse" data-bs-parent="#accordionSecurity">
                                    <div class="accordion-body">
                                        <p>Có, Z-Plus KIOT cho phép bạn xuất dữ liệu ra khỏi hệ thống dưới nhiều định dạng:</p>
                                        <ul>
                                            <li><strong>Excel/CSV:</strong> Xuất dữ liệu sản phẩm, khách hàng, đơn hàng, tồn kho</li>
                                            <li><strong>PDF:</strong> Xuất báo cáo, hóa đơn, phiếu bảo hành</li>
                                            <li><strong>XML:</strong> Xuất dữ liệu cho mục đích tích hợp với các hệ thống khác</li>
                                            <li><strong>Sao lưu đầy đủ:</strong> Yêu cầu sao lưu toàn bộ dữ liệu của cửa hàng</li>
                                        </ul>
                                        <p>Bạn có thể xuất dữ liệu bất kỳ lúc nào, ngay cả khi đã kết thúc sử dụng dịch vụ. Chúng tôi không giữ lại dữ liệu của bạn sau khi hợp đồng kết thúc.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white">
        <div class="container py-4 text-center">
            <h2 class="fw-bold mb-4">Vẫn còn thắc mắc?</h2>
            <p class="lead mb-4">Đội ngũ hỗ trợ của chúng tôi luôn sẵn sàng giải đáp mọi câu hỏi của bạn</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-4">Liên hệ ngay</a>
                <a href="{{ route('demo') }}" class="btn btn-outline-light btn-lg px-4">Yêu cầu demo</a>
            </div>
        </div>
    </section>
@endsection