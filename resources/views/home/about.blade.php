@extends('layouts.home')

@section('title', 'Giới thiệu')

@section('main-content')
    <!-- Header Section -->
    <section class="bg-primary text-white py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="fw-bold mb-4">Về Z-Plus KIOT</h1>
                    <p class="lead">Đồng hành cùng sự phát triển của cửa hàng điện tử, điện thoại di động trên toàn quốc</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Câu chuyện của chúng tôi</h2>
                    <p>Z-Plus KIOT ra đời vào năm 2020 với sứ mệnh cung cấp giải pháp quản lý toàn diện cho các cửa hàng kinh doanh thiết bị điện tử, điện thoại di động và dịch vụ bảo hành tại Việt Nam.</p>
                    <p>Đội ngũ sáng lập của chúng tôi đều có nhiều năm kinh nghiệm trong lĩnh vực công nghệ thông tin và quản lý bán lẻ. Chúng tôi hiểu rõ những thách thức mà các chủ cửa hàng điện tử gặp phải: quản lý hàng tồn kho phức tạp, theo dõi bảo hành sản phẩm, kiểm soát doanh thu và lợi nhuận.</p>
                    <p>Từ đó, Z-Plus KIOT được phát triển với mục tiêu đơn giản hóa các quy trình quản lý, tối ưu hóa vận hành và giúp các chủ cửa hàng tập trung vào những điều họ làm tốt nhất - chăm sóc khách hàng và phát triển kinh doanh.</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/about-story.jpg') }}" alt="Z-Plus KIOT Story" class="img-fluid rounded shadow">
                </div>
            </div>

            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-lg-2">
                    <h2 class="fw-bold mb-4">Sứ mệnh & Tầm nhìn</h2>
                    <div class="mb-4">
                        <h5>Sứ mệnh</h5>
                        <p>Cung cấp giải pháp công nghệ tiên tiến giúp các cửa hàng điện tử, điện thoại tối ưu hóa quy trình, tăng năng suất và nâng cao trải nghiệm khách hàng.</p>
                    </div>
                    <div class="mb-4">
                        <h5>Tầm nhìn</h5>
                        <p>Trở thành đối tác công nghệ hàng đầu của các cửa hàng điện tử, điện thoại tại Việt Nam, mang lại giá trị thiết thực và thúc đẩy sự phát triển bền vững của ngành bán lẻ thiết bị điện tử.</p>
                    </div>
                    <div class="mb-4">
                        <h5>Giá trị cốt lõi</h5>
                        <ul>
                            <li>Đổi mới không ngừng</li>
                            <li>Lấy khách hàng làm trung tâm</li>
                            <li>Chất lượng là ưu tiên hàng đầu</li>
                            <li>Hợp tác và phát triển cùng đối tác</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <img src="{{ asset('images/about-mission.jpg') }}" alt="Z-Plus KIOT Mission" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Đội ngũ của chúng tôi</h2>
                <p class="text-muted">Những chuyên gia đứng sau sự thành công của Z-Plus KIOT</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/team-1.jpg') }}" class="card-img-top" alt="Team Member">
                        <div class="card-body text-center">
                            <h5 class="card-title">Nguyễn Minh Tuấn</h5>
                            <p class="text-muted">Đồng sáng lập & CEO</p>
                            <p class="small">Hơn 15 năm kinh nghiệm trong lĩnh vực công nghệ thông tin và quản lý bán lẻ.</p>
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <a href="#" class="text-secondary"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="text-secondary"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="text-secondary"><i class="bi bi-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/team-2.jpg') }}" class="card-img-top" alt="Team Member">
                        <div class="card-body text-center">
                            <h5 class="card-title">Lê Thị Hương</h5>
                            <p class="text-muted">Đồng sáng lập & CFO</p>
                            <p class="small">Chuyên gia tài chính với kinh nghiệm tư vấn cho nhiều doanh nghiệp bán lẻ.</p>
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <a href="#" class="text-secondary"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="text-secondary"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="text-secondary"><i class="bi bi-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/team-3.jpg') }}" class="card-img-top" alt="Team Member">
                        <div class="card-body text-center">
                            <h5 class="card-title">Trần Quốc Bảo</h5>
                            <p class="text-muted">CTO</p>
                            <p class="small">Kỹ sư phần mềm tài năng với nhiều năm phát triển các hệ thống quản lý doanh nghiệp.</p>
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <a href="#" class="text-secondary"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="text-secondary"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="text-secondary"><i class="bi bi-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/team-4.jpg') }}" class="card-img-top" alt="Team Member">
                        <div class="card-body text-center">
                            <h5 class="card-title">Phạm Thị Lan</h5>
                            <p class="text-muted">Giám đốc Chăm sóc Khách hàng</p>
                            <p class="small">Hơn 10 năm kinh nghiệm trong lĩnh vực chăm sóc khách hàng và hỗ trợ kỹ thuật.</p>
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <a href="#" class="text-secondary"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="text-secondary"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="text-secondary"><i class="bi bi-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievement Section -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="display-4 fw-bold text-primary mb-2">5+</div>
                    <h5 class="mb-0">Năm kinh nghiệm</h5>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="display-4 fw-bold text-primary mb-2">1,000+</div>
                    <h5 class="mb-0">Khách hàng tin dùng</h5>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <div class="display-4 fw-bold text-primary mb-2">50+</div>
                    <h5 class="mb-0">Nhân viên tận tâm</h5>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="display-4 fw-bold text-primary mb-2">63/63</div>
                    <h5 class="mb-0">Tỉnh thành phủ sóng</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Đối tác của chúng tôi</h2>
                <p class="text-muted">Những thương hiệu lớn đã tin tưởng và hợp tác cùng Z-Plus KIOT</p>
            </div>
            <div class="row justify-content-center align-items-center g-4">
                <div class="col-md-2 col-4 text-center">
                    <img src="{{ asset('images/partner-1.png') }}" alt="Partner" class="img-fluid" style="max-height: 80px;">
                </div>
                <div class="col-md-2 col-4 text-center">
                    <img src="{{ asset('images/partner-2.png') }}" alt="Partner" class="img-fluid" style="max-height: 80px;">
                </div>
                <div class="col-md-2 col-4 text-center">
                    <img src="{{ asset('images/partner-3.png') }}" alt="Partner" class="img-fluid" style="max-height: 80px;">
                </div>
                <div class="col-md-2 col-4 text-center">
                    <img src="{{ asset('images/partner-4.png') }}" alt="Partner" class="img-fluid" style="max-height: 80px;">
                </div>
                <div class="col-md-2 col-4 text-center">
                    <img src="{{ asset('images/partner-5.png') }}" alt="Partner" class="img-fluid" style="max-height: 80px;">
                </div>
                <div class="col-md-2 col-4 text-center">
                    <img src="{{ asset('images/partner-6.png') }}" alt="Partner" class="img-fluid" style="max-height: 80px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white">
        <div class="container py-4 text-center">
            <h2 class="fw-bold mb-4">Sẵn sàng trở thành đối tác của chúng tôi?</h2>
            <p class="lead mb-4">Liên hệ ngay để được tư vấn và hỗ trợ</p>
            <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-5">Liên hệ ngay</a>
        </div>
    </section>
@endsection