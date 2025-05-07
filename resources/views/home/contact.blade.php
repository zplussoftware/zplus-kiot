@extends('layouts.home')

@section('title', 'Liên hệ')

@section('main-content')
    <!-- Header Section -->
    <section class="bg-primary text-white py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="fw-bold mb-4">Liên hệ với chúng tôi</h1>
                    <p class="lead">Hãy liên hệ với chúng tôi để được tư vấn và hỗ trợ về Z-Plus KIOT</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <h2 class="fw-bold mb-4">Thông tin liên hệ</h2>
                    <p class="text-muted mb-5">Đội ngũ tư vấn của chúng tôi luôn sẵn sàng giải đáp mọi thắc mắc và hỗ trợ bạn tối đa.</p>
                    
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-primary text-white rounded-circle p-3 me-4">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div>
                            <h5>Địa chỉ</h5>
                            <p class="text-muted">123 Đường ABC, Quận XYZ<br>Thành phố Hồ Chí Minh, Việt Nam</p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-primary text-white rounded-circle p-3 me-4">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div>
                            <h5>Điện thoại</h5>
                            <p class="text-muted">Hotline: (028) 1234 5678<br>Hỗ trợ kỹ thuật: 1900 1234</p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-primary text-white rounded-circle p-3 me-4">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div>
                            <h5>Email</h5>
                            <p class="text-muted">Thông tin chung: info@zpluskiot.com<br>Hỗ trợ kỹ thuật: support@zpluskiot.com</p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-start">
                        <div class="bg-primary text-white rounded-circle p-3 me-4">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div>
                            <h5>Giờ làm việc</h5>
                            <p class="text-muted">Thứ Hai - Thứ Bảy: 8:00 - 18:00<br>Chủ Nhật: Nghỉ</p>
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <h5 class="mb-3">Kết nối với chúng tôi</h5>
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-outline-primary rounded-circle">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary rounded-circle">
                                <i class="bi bi-youtube"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary rounded-circle">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary rounded-circle">
                                <i class="bi bi-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 p-lg-5">
                            <h3 class="fw-bold mb-4">Gửi tin nhắn cho chúng tôi</h3>
                            
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                            <form action="{{ route('contact.send') }}" method="POST">
                                @csrf
                                
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Họ và tên" value="{{ old('name') }}">
                                            <label for="name">Họ và tên *</label>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                            <label for="email">Email *</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Số điện thoại" value="{{ old('phone') }}">
                                            <label for="phone">Số điện thoại *</label>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" placeholder="Tên công ty/cửa hàng" value="{{ old('company') }}">
                                            <label for="company">Tên công ty/cửa hàng</label>
                                            @error('company')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select @error('subject') is-invalid @enderror" id="subject" name="subject">
                                                <option value="" selected disabled>Chọn mục đích liên hệ</option>
                                                <option value="Tư vấn sản phẩm" {{ old('subject') == 'Tư vấn sản phẩm' ? 'selected' : '' }}>Tư vấn sản phẩm</option>
                                                <option value="Báo giá" {{ old('subject') == 'Báo giá' ? 'selected' : '' }}>Báo giá</option>
                                                <option value="Đặt lịch demo" {{ old('subject') == 'Đặt lịch demo' ? 'selected' : '' }}>Đặt lịch demo</option>
                                                <option value="Hỗ trợ kỹ thuật" {{ old('subject') == 'Hỗ trợ kỹ thuật' ? 'selected' : '' }}>Hỗ trợ kỹ thuật</option>
                                                <option value="Góp ý sản phẩm" {{ old('subject') == 'Góp ý sản phẩm' ? 'selected' : '' }}>Góp ý sản phẩm</option>
                                                <option value="Khác" {{ old('subject') == 'Khác' ? 'selected' : '' }}>Khác</option>
                                            </select>
                                            <label for="subject">Mục đích liên hệ *</label>
                                            @error('subject')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" placeholder="Nhập nội dung tin nhắn" style="height: 150px">{{ old('message') }}</textarea>
                                            <label for="message">Nội dung tin nhắn *</label>
                                            @error('message')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input @error('privacy_policy') is-invalid @enderror" type="checkbox" id="privacy_policy" name="privacy_policy" {{ old('privacy_policy') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="privacy_policy">
                                                Tôi đồng ý với <a href="#">chính sách bảo mật</a> của Z-Plus KIOT *
                                            </label>
                                            @error('privacy_policy')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary py-3 px-5">
                                            <i class="bi bi-send me-2"></i> Gửi tin nhắn
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Vị trí của chúng tôi</h2>
                <p class="text-muted">Ghé thăm văn phòng để được tư vấn trực tiếp</p>
            </div>
            <div class="ratio ratio-21x9 rounded shadow overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4241674198694!2d106.69155287469746!3d10.780107789376193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f38f9ed887b%3A0x14aded5703768989!2sBitexco%20Financial%20Tower!5e0!3m2!1sen!2s!4v1715050989458!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- FAQ Call to Action -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-3">Câu hỏi thường gặp</h2>
                    <p class="text-muted mb-4">Tìm câu trả lời nhanh cho những thắc mắc phổ biến về Z-Plus KIOT.</p>
                    <a href="{{ route('faq') }}" class="btn btn-primary px-4 py-2">Xem câu hỏi thường gặp</a>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="accordionFaq">
                        <div class="accordion-item border mb-3 rounded shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq1" aria-expanded="true" aria-controls="collapseFaq1">
                                    Làm thế nào để đăng ký dùng thử Z-Plus KIOT?
                                </button>
                            </h2>
                            <div id="collapseFaq1" class="accordion-collapse collapse show" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p>Bạn có thể đăng ký dùng thử Z-Plus KIOT miễn phí trong 14 ngày bằng cách nhấp vào nút "Dùng thử miễn phí" trên trang web, điền thông tin cần thiết và xác nhận email của bạn. Hệ thống sẽ được thiết lập tự động và bạn có thể bắt đầu sử dụng ngay lập tức.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border mb-3 rounded shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq2" aria-expanded="false" aria-controls="collapseFaq2">
                                    Z-Plus KIOT có hỗ trợ nhiều chi nhánh không?
                                </button>
                            </h2>
                            <div id="collapseFaq2" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p>Có, Z-Plus KIOT hỗ trợ quản lý nhiều chi nhánh trong cùng một hệ thống. Gói Nâng cao và Doanh nghiệp hỗ trợ quản lý đa kho hàng, giúp bạn theo dõi hàng tồn và doanh số bán hàng tại từng chi nhánh, đồng thời vẫn có cái nhìn tổng quan về toàn bộ hoạt động kinh doanh.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection