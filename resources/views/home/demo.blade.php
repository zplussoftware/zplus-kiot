@extends('layouts.home')

@section('title', 'Yêu cầu Demo')

@section('main-content')
    <!-- Header Section -->
    <section class="bg-primary text-white py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="fw-bold mb-4">Đăng ký Demo Z-Plus KIOT</h1>
                    <p class="lead">Trải nghiệm sức mạnh của hệ thống quản lý cửa hàng điện tử toàn diện</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Demo Form Section -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="fw-bold mb-4">Tại sao nên dùng thử Z-Plus KIOT?</h2>
                    <p class="mb-4">Đăng ký demo để trải nghiệm đầy đủ các tính năng của Z-Plus KIOT và khám phá cách hệ thống có thể giúp cửa hàng của bạn phát triển.</p>
                    
                    <div class="d-flex mb-4">
                        <div class="me-3 text-primary">
                            <i class="bi bi-check-circle-fill fs-4"></i>
                        </div>
                        <div>
                            <h5>Demo trực tiếp với chuyên gia</h5>
                            <p class="text-muted">Đội ngũ chuyên gia của chúng tôi sẽ hướng dẫn bạn qua tất cả các tính năng của hệ thống, tùy chỉnh theo nhu cầu cụ thể của cửa hàng bạn.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="me-3 text-primary">
                            <i class="bi bi-check-circle-fill fs-4"></i>
                        </div>
                        <div>
                            <h5>Tài khoản dùng thử miễn phí</h5>
                            <p class="text-muted">Sau buổi demo, bạn sẽ nhận được tài khoản dùng thử miễn phí trong 14 ngày với đầy đủ tính năng của hệ thống.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="me-3 text-primary">
                            <i class="bi bi-check-circle-fill fs-4"></i>
                        </div>
                        <div>
                            <h5>Hỗ trợ thiết lập ban đầu</h5>
                            <p class="text-muted">Đội ngũ kỹ thuật sẽ hỗ trợ bạn trong quá trình thiết lập ban đầu, nhập dữ liệu sản phẩm và đào tạo nhân viên sử dụng hệ thống.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="me-3 text-primary">
                            <i class="bi bi-check-circle-fill fs-4"></i>
                        </div>
                        <div>
                            <h5>Tư vấn gói dịch vụ phù hợp</h5>
                            <p class="text-muted">Chúng tôi sẽ phân tích nhu cầu của cửa hàng bạn và đề xuất gói dịch vụ phù hợp nhất với quy mô và ngân sách.</p>
                        </div>
                    </div>
                    
                    <div class="card bg-light border-0 p-4 mt-5">
                        <div class="d-flex align-items-center">
                            <div class="me-4">
                                <img src="{{ asset('images/customer-support.jpg') }}" alt="Customer Support" class="rounded-circle" width="80" height="80">
                            </div>
                            <div>
                                <h5>Cần hỗ trợ?</h5>
                                <p class="mb-2">Liên hệ trực tiếp với đội ngũ tư vấn:</p>
                                <p class="mb-0"><strong>Hotline:</strong> (028) 1234 5678</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 p-lg-5">
                            <h3 class="fw-bold mb-4">Đăng ký Demo</h3>
                            
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                            <form action="{{ route('demo.request') }}" method="POST">
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
                                            <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" placeholder="Chức vụ" value="{{ old('position') }}">
                                            <label for="position">Chức vụ *</label>
                                            @error('position')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                            <label for="email">Email công ty *</label>
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
                                    
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" placeholder="Tên công ty/cửa hàng" value="{{ old('company') }}">
                                            <label for="company">Tên công ty/cửa hàng *</label>
                                            @error('company')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select @error('business_type') is-invalid @enderror" id="business_type" name="business_type">
                                                <option value="" selected disabled>Chọn loại hình kinh doanh</option>
                                                <option value="retail" {{ old('business_type') == 'retail' ? 'selected' : '' }}>Cửa hàng bán lẻ</option>
                                                <option value="chain" {{ old('business_type') == 'chain' ? 'selected' : '' }}>Chuỗi cửa hàng</option>
                                                <option value="distributor" {{ old('business_type') == 'distributor' ? 'selected' : '' }}>Nhà phân phối</option>
                                                <option value="service" {{ old('business_type') == 'service' ? 'selected' : '' }}>Trung tâm bảo hành</option>
                                                <option value="other" {{ old('business_type') == 'other' ? 'selected' : '' }}>Khác</option>
                                            </select>
                                            <label for="business_type">Loại hình kinh doanh *</label>
                                            @error('business_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select @error('store_count') is-invalid @enderror" id="store_count" name="store_count">
                                                <option value="" selected disabled>Chọn số lượng cửa hàng</option>
                                                <option value="1" {{ old('store_count') == '1' ? 'selected' : '' }}>1 cửa hàng</option>
                                                <option value="2-5" {{ old('store_count') == '2-5' ? 'selected' : '' }}>2-5 cửa hàng</option>
                                                <option value="6-10" {{ old('store_count') == '6-10' ? 'selected' : '' }}>6-10 cửa hàng</option>
                                                <option value="11+" {{ old('store_count') == '11+' ? 'selected' : '' }}>11+ cửa hàng</option>
                                            </select>
                                            <label for="store_count">Số lượng cửa hàng *</label>
                                            @error('store_count')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select @error('demo_type') is-invalid @enderror" id="demo_type" name="demo_type">
                                                <option value="" selected disabled>Chọn hình thức demo</option>
                                                <option value="online" {{ old('demo_type') == 'online' ? 'selected' : '' }}>Demo trực tuyến</option>
                                                <option value="onsite" {{ old('demo_type') == 'onsite' ? 'selected' : '' }}>Demo tại cửa hàng</option>
                                                <option value="office" {{ old('demo_type') == 'office' ? 'selected' : '' }}>Demo tại văn phòng Z-Plus KIOT</option>
                                            </select>
                                            <label for="demo_type">Hình thức demo mong muốn *</label>
                                            @error('demo_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" placeholder="Ghi chú" style="height: 100px">{{ old('note') }}</textarea>
                                            <label for="note">Ghi chú (tùy chọn)</label>
                                            @error('note')
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
                                        <button type="submit" class="btn btn-primary py-3 px-5 w-100">
                                            <i class="bi bi-calendar2-check me-2"></i> Đăng ký Demo
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

    <!-- Customer Testimonials -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Khách hàng nói gì về chúng tôi</h2>
                <p class="text-muted">Trải nghiệm thực tế từ những khách hàng đã và đang sử dụng Z-Plus KIOT</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex mb-4">
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                                <div class="text-warning"><i class="bi bi-star-fill"></i></div>
                            </div>
                            <p class="card-text mb-4">"Z-Plus KIOT đã giúp tôi quản lý cửa hàng điện thoại di động một cách hiệu quả. Tính năng quản lý bảo hành giúp tôi không bao giờ bỏ sót bất kỳ sản phẩm bảo hành nào, tăng niềm tin của khách hàng với cửa hàng."</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/testimonials/customer-1.jpg') }}" class="rounded-circle me-3" width="60" height="60" alt="Customer">
                                <div>
                                    <h5 class="mb-0">Nguyễn Văn Mạnh</h5>
                                    <p class="text-muted mb-0">Chủ cửa hàng Mobile Store, Hà Nội</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex mb-4">
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                            </div>
                            <p class="card-text mb-4">"Với 3 chi nhánh cửa hàng, việc quản lý kho hàng và luân chuyển sản phẩm trở nên rất phức tạp. Z-Plus KIOT giúp tôi kiểm soát tồn kho theo thời gian thực, dễ dàng chuyển hàng giữa các chi nhánh và không bao giờ bị hết hàng."</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/testimonials/customer-2.jpg') }}" class="rounded-circle me-3" width="60" height="60" alt="Customer">
                                <div>
                                    <h5 class="mb-0">Trần Minh Đức</h5>
                                    <p class="text-muted mb-0">Giám đốc Công ty TNHH Điện tử ABC, TP.HCM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex mb-4">
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                                <div class="text-warning me-1"><i class="bi bi-star-fill"></i></div>
                                <div class="text-warning me-1"><i class="bi bi-star-half"></i></div>
                            </div>
                            <p class="card-text mb-4">"Tính năng báo cáo thống kê của Z-Plus KIOT giúp tôi có cái nhìn tổng quan về tình hình kinh doanh. Đặc biệt là báo cáo lợi nhuận theo sản phẩm giúp tôi dễ dàng điều chỉnh chiến lược kinh doanh và tập trung vào sản phẩm mang lại lợi nhuận cao."</p>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/testimonials/customer-3.jpg') }}" class="rounded-circle me-3" width="60" height="60" alt="Customer">
                                <div>
                                    <h5 class="mb-0">Lê Thị Hương</h5>
                                    <p class="text-muted mb-0">Chủ chuỗi cửa hàng Tech Galaxy, Đà Nẵng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Câu hỏi thường gặp về Demo</h2>
                <p class="text-muted">Một số câu hỏi phổ biến về quy trình Demo Z-Plus KIOT</p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionDemo">
                        <div class="accordion-item border mb-3 rounded shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Demo kéo dài bao lâu?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionDemo">
                                <div class="accordion-body">
                                    Thông thường, buổi demo trực tuyến kéo dài khoảng 45-60 phút, trong khi demo tại cửa hàng hoặc văn phòng có thể kéo dài 1-2 giờ tùy thuộc vào nhu cầu và câu hỏi của bạn. Chúng tôi sẽ đảm bảo giới thiệu đầy đủ tất cả các tính năng quan trọng phù hợp với loại hình kinh doanh của bạn.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border mb-3 rounded shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Tôi cần chuẩn bị gì cho buổi demo?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionDemo">
                                <div class="accordion-body">
                                    Để buổi demo đạt hiệu quả tối đa, bạn nên chuẩn bị một số thông tin như: quy trình kinh doanh hiện tại, thách thức bạn đang gặp phải, mục tiêu bạn muốn đạt được với hệ thống mới, và bất kỳ câu hỏi cụ thể nào về tính năng. Đối với demo trực tuyến, bạn cần máy tính có kết nối internet ổn định và phần mềm họp trực tuyến (như Zoom hoặc Google Meet).
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border mb-3 rounded shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Sau khi đăng ký, khi nào tôi sẽ được demo?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionDemo">
                                <div class="accordion-body">
                                    Sau khi nhận được đăng ký, đội ngũ tư vấn của chúng tôi sẽ liên hệ với bạn trong vòng 24 giờ làm việc để xác nhận và lên lịch demo phù hợp với thời gian của bạn. Thông thường, chúng tôi có thể sắp xếp buổi demo trong vòng 2-3 ngày làm việc kể từ khi bạn đăng ký.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item border mb-3 rounded shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Tôi có thể mời nhiều người tham gia buổi demo không?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionDemo">
                                <div class="accordion-body">
                                    Có, bạn có thể mời đồng nghiệp, nhân viên hoặc đối tác kinh doanh tham gia buổi demo. Chúng tôi khuyến khích các bên liên quan trong quá trình ra quyết định tham gia để họ có thể đặt câu hỏi và hiểu rõ cách hệ thống có thể giúp ích cho công việc của họ.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-5">
                        <p class="mb-3">Vẫn còn thắc mắc? Liên hệ trực tiếp với chúng tôi.</p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary px-4 py-2">Liên hệ ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection