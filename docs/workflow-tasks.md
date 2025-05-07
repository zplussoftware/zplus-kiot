# Phân chia công việc theo luồng cho Z-Plus KIOT

## 1. Luồng Trang Home (Public)

### 1.1. Thiết kế giao diện
- [x] Tạo layout chung (header, footer, navigation)
- [x] Thiết kế trang giới thiệu hệ thống
- [x] Thiết kế form đăng nhập
- [x] Thiết kế trang thông tin liên hệ
- [x] Thiết kế trang giới thiệu tính năng

### 1.2. Xác thực và phân quyền
- [x] Xây dựng form đăng nhập
- [x] Xử lý logic xác thực người dùng
- [x] Điều hướng sau đăng nhập dựa trên vai trò (admin -> trang admin, nhân viên bán hàng -> trang POS)
- [x] Vô hiệu hóa chức năng đăng ký mặc định
- [x] Xây dựng chức năng quên mật khẩu

### 1.3. Nội dung
- [x] Viết nội dung giới thiệu về hệ thống Z-Plus KIOT
- [x] Tạo slideshow giới thiệu tính năng
- [x] Thiết kế phần trình bày lợi ích của hệ thống
- [x] Tạo phần FAQ (Câu hỏi thường gặp)
- [x] Thêm thông tin liên hệ và hỗ trợ

## 2. Luồng Trang Admin

### 2.1. Dashboard và thống kê
- [ ] Thiết kế dashboard tổng quan
- [ ] Tạo biểu đồ thống kê doanh số
- [ ] Hiển thị thông tin tồn kho
- [ ] Hiển thị đơn hàng mới
- [ ] Hiển thị báo cáo nhanh (doanh thu, lợi nhuận, số đơn hàng)
- [ ] Tạo widget cảnh báo (hàng sắp hết, công nợ quá hạn)

### 2.2. Quản lý người dùng và phân quyền
- [ ] Xây dựng giao diện quản lý người dùng (CRUD)
- [ ] Xây dựng giao diện quản lý vai trò (CRUD)
- [ ] Xây dựng giao diện quản lý quyền hạn (CRUD)
- [ ] Phân công người dùng vào kho
- [ ] Quản lý ca làm việc của nhân viên

### 2.3. Quản lý danh mục và sản phẩm
- [ ] Xây dựng giao diện quản lý danh mục (CRUD)
- [ ] Xây dựng giao diện quản lý đơn vị tính (CRUD)
- [ ] Xây dựng giao diện quản lý sản phẩm (CRUD)
- [ ] Xây dựng giao diện quản lý thuộc tính sản phẩm
- [ ] Xây dựng giao diện quản lý hình ảnh sản phẩm
- [ ] Xây dựng giao diện quản lý sản phẩm combo
- [ ] Tính năng import/export danh sách sản phẩm

### 2.4. Quản lý kho hàng
- [ ] Xây dựng giao diện quản lý kho (CRUD)
- [ ] Xây dựng giao diện nhập kho
- [ ] Xây dựng giao diện chuyển kho
- [ ] Xây dựng giao diện kiểm kho
- [ ] Xây dựng giao diện quản lý tồn kho
- [ ] Xây dựng giao diện quản lý serial sản phẩm

### 2.5. Quản lý khách hàng và nhà cung cấp
- [ ] Xây dựng giao diện quản lý nhóm khách hàng (CRUD)
- [ ] Xây dựng giao diện quản lý khách hàng (CRUD)
- [ ] Xây dựng giao diện quản lý nhà cung cấp (CRUD)
- [ ] Xây dựng giao diện quản lý công nợ nhà cung cấp
- [ ] Tính năng import/export danh sách khách hàng/nhà cung cấp

### 2.6. Quản lý đơn hàng
- [ ] Xây dựng giao diện danh sách đơn hàng
- [ ] Xây dựng giao diện chi tiết đơn hàng
- [ ] Xây dựng giao diện quản lý trạng thái đơn hàng
- [ ] Xây dựng giao diện quản lý thanh toán đơn hàng
- [ ] Tính năng in hóa đơn, xuất PDF
- [ ] Tính năng tìm kiếm và lọc đơn hàng

### 2.7. Quản lý bảo hành
- [ ] Xây dựng giao diện quản lý bảo hành
- [ ] Xây dựng giao diện quản lý yêu cầu bảo hành
- [ ] Xây dựng giao diện tra cứu bảo hành theo serial
- [ ] Xây dựng quy trình xử lý yêu cầu bảo hành

### 2.8. Báo cáo
- [ ] Xây dựng giao diện báo cáo doanh số
- [ ] Xây dựng giao diện báo cáo lợi nhuận
- [ ] Xây dựng giao diện báo cáo tồn kho
- [ ] Xây dựng giao diện báo cáo sản phẩm bán chạy
- [ ] Xây dựng giao diện báo cáo công nợ
- [ ] Tính năng export báo cáo ra Excel/PDF

### 2.9. Cài đặt hệ thống
- [ ] Xây dựng giao diện cài đặt thông tin cửa hàng
- [ ] Xây dựng giao diện cài đặt email
- [ ] Xây dựng giao diện cài đặt backup
- [ ] Xây dựng giao diện cài đặt mẫu in

## 3. Luồng Trang POS (Bán hàng)

### 3.1. Giao diện bán hàng
- [ ] Thiết kế giao diện POS tối ưu cho màn hình cảm ứng
- [ ] Xây dựng layout hiển thị danh mục sản phẩm
- [ ] Xây dựng layout hiển thị sản phẩm dạng lưới
- [ ] Xây dựng layout giỏ hàng
- [ ] Xây dựng layout thông tin khách hàng
- [ ] Xây dựng layout thanh toán

### 3.2. Quản lý ca làm việc
- [ ] Xây dựng giao diện mở ca
- [ ] Xây dựng giao diện đóng ca
- [ ] Xây dựng giao diện kiểm đếm tiền đầu ca và cuối ca
- [ ] Xây dựng giao diện báo cáo doanh thu theo ca

### 3.3. Tìm kiếm sản phẩm
- [ ] Xây dựng chức năng tìm kiếm sản phẩm theo tên/mã
- [ ] Xây dựng chức năng quét mã vạch/QR code
- [ ] Xây dựng chức năng lọc sản phẩm theo danh mục
- [ ] Xây dựng chức năng lọc sản phẩm theo thuộc tính

### 3.4. Giỏ hàng và đơn hàng
- [ ] Xây dựng chức năng thêm sản phẩm vào giỏ hàng
- [ ] Xây dựng chức năng điều chỉnh số lượng
- [ ] Xây dựng chức năng áp dụng chiết khấu
- [ ] Xây dựng chức năng nhập thông tin khách hàng
- [ ] Xây dựng chức năng tạm dừng và lưu đơn hàng
- [ ] Xây dựng chức năng ghi chú đơn hàng

### 3.5. Thanh toán
- [ ] Xây dựng chức năng thanh toán tiền mặt
- [ ] Xây dựng chức năng thanh toán chuyển khoản/thẻ
- [ ] Xây dựng chức năng thanh toán kết hợp nhiều phương thức
- [ ] Xây dựng chức năng tính tiền thừa trả khách
- [ ] Xây dựng chức năng lưu thông tin thanh toán

### 3.6. In hóa đơn
- [ ] Xây dựng chức năng in hóa đơn bán hàng
- [ ] Xây dựng chức năng in phiếu bảo hành
- [ ] Tùy chỉnh mẫu in theo nhu cầu
- [ ] Hỗ trợ nhiều loại máy in

### 3.7. Quản lý đơn hàng đã bán
- [ ] Xây dựng giao diện danh sách đơn hàng trong ca
- [ ] Xây dựng chức năng tìm kiếm đơn hàng
- [ ] Xây dựng chức năng xem chi tiết đơn hàng
- [ ] Xây dựng chức năng in lại hóa đơn
- [ ] Xây dựng chức năng hủy/đổi/trả hàng

## 4. Công việc chung và tích hợp

### 4.1. Cơ sở dữ liệu và migrations
- [x] Tạo migrations cho tất cả các bảng
- [x] Tạo models với các relationships
- [x] Tạo factories và seeders

### 4.2. Xác thực và phân quyền
- [ ] Cài đặt và cấu hình Laravel Breeze/Jetstream
- [ ] Tích hợp Spatie Laravel Permission
- [ ] Cấu hình middlewares kiểm tra quyền
- [ ] Tạo policies cho các model

### 4.3. Routes và Controllers
- [ ] Thiết lập route groups cho các luồng (public, admin, pos)
- [ ] Tạo controllers cho từng module
- [ ] Cấu hình middleware bảo vệ routes

### 4.4. API (nếu cần)
- [ ] Xây dựng API endpoints cho tích hợp với ứng dụng mobile (nếu có)
- [ ] Thiết lập API authentication (Sanctum/Passport)
- [ ] Tạo API resources và collections

### 4.5. Tối ưu hóa
- [ ] Cấu hình caching
- [ ] Tối ưu queries
- [ ] Tạo indexes cho database
- [ ] Lazy loading images
- [ ] Tối ưu assets (JS/CSS)

### 4.6. Testing
- [ ] Viết unit tests
- [ ] Viết feature tests
- [ ] Viết integration tests

### 4.7. Triển khai
- [ ] Cấu hình môi trường sản xuất
- [ ] Thiết lập backup tự động
- [ ] Cấu hình HTTPS
- [ ] Tối ưu hiệu suất server