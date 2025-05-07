# Giai đoạn 2: Phát triển tính năng Z-Plus KIOT

## 1. Phân quyền và xác thực

### 1.1. Cài đặt và tích hợp Spatie Laravel Permission
- [ ] Cài đặt package Spatie Laravel Permission thông qua Composer
- [ ] Xuất bản migration, config và các file cần thiết
- [ ] Cấu hình cơ bản trong config/permission.php

### 1.2. Xây dựng hệ thống phân quyền theo role và permission
- [ ] Tạo controller quản lý Role (`RoleController`)
- [ ] Tạo CRUD giao diện quản lý vai trò (Role)
- [ ] Tạo controller quản lý Permission (`PermissionController`)
- [ ] Tạo CRUD giao diện quản lý quyền (Permission)
- [ ] Phân nhóm quyền theo tính năng (sản phẩm, kho, đơn hàng, v.v.)
- [ ] Cài đặt middleware kiểm tra quyền trong routes
- [ ] Tạo Policy cho các model chính (CRUD permission)

### 1.3. Phân quyền theo kho hàng
- [ ] Tạo giao diện quản lý phân quyền người dùng theo kho
- [ ] Tạo middleware kiểm tra quyền truy cập vào kho cụ thể
- [ ] Giới hạn dữ liệu sản phẩm, tồn kho theo kho được phân quyền
- [ ] Phát triển logic lọc dữ liệu dựa trên quyền truy cập kho

## 2. Quản lý sản phẩm

### 2.1. CRUD danh mục sản phẩm
- [ ] Tạo CategoryController với đầy đủ phương thức CRUD
- [ ] Tạo blade views cho danh mục (index, create, edit, show)
- [ ] Xây dựng form tạo và chỉnh sửa danh mục
- [ ] Hiển thị cây danh mục đa cấp (parent-child relationship)
- [ ] Thêm tính năng tìm kiếm, sắp xếp, phân trang

### 2.2. CRUD đơn vị tính
- [ ] Tạo UnitController với đầy đủ phương thức CRUD
- [ ] Tạo blade views cho đơn vị tính (index, create, edit)
- [ ] Xây dựng các validation rules cho đơn vị tính
- [ ] Hiển thị danh sách đơn vị tính với phân trang và tìm kiếm

### 2.3. CRUD sản phẩm cơ bản
- [ ] Tạo ProductController với đầy đủ phương thức CRUD
- [ ] Tạo blade views cho sản phẩm (index, create, edit, show)
- [ ] Xây dựng form phức tạp cho thông tin sản phẩm
- [ ] Thêm tính năng mã vạch (barcode/QR code)
- [ ] Quản lý giá bán, giá nhập, giá khuyến mãi
- [ ] Tích hợp tìm kiếm nâng cao (theo mã, tên, danh mục, v.v)
- [ ] Thêm tính năng import/export sản phẩm từ Excel

### 2.4. Upload và quản lý hình ảnh sản phẩm
- [ ] Tạo ProductImageController
- [ ] Xây dựng tính năng upload nhiều hình ảnh
- [ ] Tạo thumbnail và tối ưu hình ảnh tự động
- [ ] Hiển thị gallery hình ảnh sản phẩm
- [ ] Hỗ trợ kéo thả để sắp xếp thứ tự hình ảnh

### 2.5. Quản lý thuộc tính sản phẩm
- [ ] Tạo ProductAttributeController
- [ ] Xây dựng giao diện quản lý các loại thuộc tính (màu sắc, kích thước, v.v)
- [ ] Tạo form động để nhập giá trị thuộc tính khi tạo sản phẩm
- [ ] Hỗ trợ lọc sản phẩm theo thuộc tính
- [ ] Tích hợp giá khác nhau cho từng thuộc tính

### 2.6. Quản lý sản phẩm combo
- [ ] Tạo ProductBundleController
- [ ] Xây dựng giao diện tạo combo từ nhiều sản phẩm
- [ ] Hỗ trợ thiết lập giá combo và chiết khấu
- [ ] Quản lý tồn kho cho sản phẩm combo
- [ ] Hiển thị chi tiết sản phẩm trong combo

## 3. Quản lý kho hàng

### 3.1. CRUD kho hàng
- [ ] Tạo WarehouseController với đầy đủ phương thức CRUD
- [ ] Xây dựng giao diện quản lý kho (tạo, sửa, xóa)
- [ ] Thiết lập thông tin kho (tên, địa chỉ, người quản lý)
- [ ] Hiển thị danh sách kho với trạng thái và thông tin tổng quan

### 3.2. Phân quyền người dùng theo kho
- [ ] Tạo UserWarehouseController
- [ ] Xây dựng giao diện phân công người dùng vào kho
- [ ] Thiết lập quyền người dùng đối với từng kho (xem, sửa, quản lý)

### 3.3. Nhập kho từ nhà cung cấp
- [ ] Tạo StockImportController
- [ ] Xây dựng giao diện nhập kho
- [ ] Tạo form nhập hàng từ nhà cung cấp
- [ ] Quản lý chi tiết sản phẩm nhập (số lượng, giá, v.v)
- [ ] Tự động cập nhật tồn kho khi nhập hàng
- [ ] Quản lý serial sản phẩm khi nhập kho (đối với sản phẩm có serial)
- [ ] In phiếu nhập kho

### 3.4. Chuyển kho
- [ ] Tạo WarehouseTransferController
- [ ] Xây dựng giao diện chuyển kho
- [ ] Tạo phiếu chuyển kho giữa các kho
- [ ] Quản lý chi tiết sản phẩm chuyển
- [ ] Xác nhận nhận hàng ở kho đích
- [ ] Tự động cập nhật tồn kho sau khi chuyển
- [ ] Theo dõi trạng thái chuyển kho
- [ ] In phiếu chuyển kho

### 3.5. Quản lý tồn kho
- [ ] Tạo ProductStockController
- [ ] Xây dựng giao diện quản lý tồn kho
- [ ] Hiển thị tồn kho theo từng kho
- [ ] Cảnh báo hàng tồn kho dưới mức tối thiểu
- [ ] Thống kê tồn kho theo thời gian
- [ ] Kiểm kê kho và điều chỉnh số lượng

### 3.6. Quản lý serial sản phẩm
- [ ] Tạo ProductSerialController
- [ ] Xây dựng giao diện quản lý serial
- [ ] Tích hợp nhập/quét serial khi nhập hàng
- [ ] Theo dõi lịch sử di chuyển của từng serial
- [ ] Liên kết serial với bảo hành
- [ ] Tìm kiếm nhanh theo serial

## 4. Quản lý khách hàng

### 4.1. CRUD nhóm khách hàng
- [ ] Tạo CustomerGroupController
- [ ] Xây dựng giao diện quản lý nhóm khách hàng
- [ ] Thiết lập các chính sách giá và chiết khấu theo nhóm
- [ ] Quản lý cấp độ thành viên và điểm thưởng

### 4.2. CRUD khách hàng
- [ ] Tạo CustomerController
- [ ] Xây dựng giao diện quản lý khách hàng
- [ ] Form nhập thông tin khách hàng chi tiết
- [ ] Tìm kiếm khách hàng nhanh (theo tên, SĐT, email)
- [ ] Import/export danh sách khách hàng
- [ ] Quản lý điểm thưởng và hạng thành viên

### 4.3. Xem lịch sử mua hàng của khách
- [ ] Hiển thị lịch sử đơn hàng theo khách hàng
- [ ] Thống kê giá trị mua hàng theo thời gian
- [ ] Xem chi tiết từng đơn hàng
- [ ] Biểu đồ phân tích hành vi mua hàng

## 5. Quản lý nhà cung cấp và công nợ

### 5.1. CRUD nhà cung cấp
- [ ] Tạo SupplierController
- [ ] Xây dựng giao diện quản lý nhà cung cấp
- [ ] Form nhập thông tin nhà cung cấp chi tiết
- [ ] Quản lý danh sách sản phẩm theo nhà cung cấp
- [ ] Theo dõi lịch sử nhập hàng từ nhà cung cấp

### 5.2. Quản lý công nợ nhà cung cấp
- [ ] Tạo SupplierDebtController
- [ ] Xây dựng giao diện quản lý công nợ
- [ ] Theo dõi công nợ theo từng nhà cung cấp
- [ ] Cảnh báo công nợ quá hạn
- [ ] Báo cáo tổng hợp công nợ

### 5.3. Theo dõi thanh toán công nợ
- [ ] Tạo SupplierDebtPaymentController
- [ ] Xây dựng giao diện thanh toán công nợ
- [ ] Lịch sử thanh toán theo từng nhà cung cấp
- [ ] In phiếu thanh toán công nợ
- [ ] Báo cáo thanh toán theo thời gian

## 6. Bán hàng

### 6.1. Quản lý ca làm việc
- [ ] Tạo ShiftController
- [ ] Xây dựng giao diện quản lý ca
- [ ] Tính năng mở/đóng ca
- [ ] Báo cáo doanh thu theo ca
- [ ] Kiểm đếm tiền đầu ca và cuối ca

### 6.2. Màn hình POS bán hàng
- [ ] Xây dựng giao diện POS hiện đại
- [ ] Tối ưu giao diện cho màn hình cảm ứng
- [ ] Tính năng tìm kiếm sản phẩm nhanh
- [ ] Hiển thị danh mục sản phẩm dạng lưới
- [ ] Quản lý giỏ hàng trực quan

### 6.3. Tìm kiếm sản phẩm theo mã, tên, barcode
- [ ] Tích hợp quét mã vạch/QR code
- [ ] Tìm kiếm nhanh theo từ khóa
- [ ] Gợi ý tự động khi gõ tìm kiếm
- [ ] Lọc theo danh mục và thuộc tính

### 6.4. Quản lý chiết khấu
- [ ] Tích hợp chiết khấu theo sản phẩm
- [ ] Chiết khấu theo nhóm khách hàng
- [ ] Chiết khấu theo tổng giá trị đơn hàng
- [ ] Áp dụng mã khuyến mãi
- [ ] Quản lý chương trình khuyến mãi theo thời gian

### 6.5. Thanh toán đơn hàng
- [ ] Hỗ trợ nhiều phương thức thanh toán
- [ ] Quản lý tiền thừa trả khách
- [ ] Chia nhỏ thanh toán nhiều hình thức
- [ ] Theo dõi trạng thái thanh toán

### 6.6. In hóa đơn
- [ ] Thiết kế mẫu hóa đơn tùy chỉnh
- [ ] Hỗ trợ in nhiều loại máy in
- [ ] In hóa đơn đầy đủ và hóa đơn rút gọn
- [ ] In hóa đơn điện tử (e-invoice)

## 7. Quản lý đơn hàng

### 7.1. Xem danh sách đơn hàng
- [ ] Tạo OrderController
- [ ] Xây dựng giao diện quản lý đơn hàng
- [ ] Lọc đơn hàng theo nhiều tiêu chí
- [ ] Tìm kiếm đơn hàng nhanh
- [ ] Export danh sách đơn hàng

### 7.2. Theo dõi trạng thái đơn hàng
- [ ] Tạo OrderStatusHistoryController
- [ ] Xây dựng quy trình xử lý đơn hàng
- [ ] Cập nhật trạng thái tự động
- [ ] Hiển thị timeline xử lý đơn hàng
- [ ] Gửi thông báo khi thay đổi trạng thái

### 7.3. Quản lý thanh toán đơn hàng
- [ ] Tạo OrderPaymentController
- [ ] Xây dựng giao diện quản lý thanh toán
- [ ] Theo dõi lịch sử thanh toán từng đơn
- [ ] Hỗ trợ thanh toán bổ sung
- [ ] Báo cáo thanh toán theo thời gian

## 8. Quản lý bảo hành

### 8.1. Tạo phiếu bảo hành
- [ ] Tạo WarrantyController
- [ ] Xây dựng giao diện quản lý bảo hành
- [ ] Tạo phiếu bảo hành khi bán hàng
- [ ] In phiếu bảo hành
- [ ] Quản lý chính sách bảo hành theo sản phẩm

### 8.2. Theo dõi bảo hành theo serial
- [ ] Liên kết serial với thông tin bảo hành
- [ ] Tra cứu thông tin bảo hành qua serial
- [ ] Kiểm tra hạn bảo hành
- [ ] Cảnh báo sản phẩm gần hết hạn bảo hành

### 8.3. Quản lý yêu cầu bảo hành
- [ ] Tạo WarrantyClaimController
- [ ] Xây dựng giao diện xử lý yêu cầu bảo hành
- [ ] Quy trình xử lý bảo hành
- [ ] Theo dõi trạng thái bảo hành
- [ ] Thống kê sản phẩm bảo hành theo thời gian và loại lỗi

## 9. Báo cáo

### 9.1. Báo cáo doanh số
- [ ] Tạo ReportController
- [ ] Báo cáo doanh số theo ngày/tuần/tháng/năm
- [ ] Báo cáo doanh số theo nhân viên
- [ ] Báo cáo doanh số theo kho hàng
- [ ] Biểu đồ trực quan hóa doanh số
- [ ] Export báo cáo ra Excel/PDF

### 9.2. Báo cáo lợi nhuận
- [ ] Báo cáo lợi nhuận theo thời gian
- [ ] Báo cáo lợi nhuận theo sản phẩm
- [ ] Báo cáo lợi nhuận theo danh mục
- [ ] Phân tích biên lợi nhuận
- [ ] Export báo cáo ra Excel/PDF

### 9.3. Báo cáo tồn kho
- [ ] Báo cáo tồn kho hiện tại
- [ ] Báo cáo nhập xuất tồn
- [ ] Báo cáo giá trị hàng tồn kho
- [ ] Cảnh báo hàng tồn kho quá mức/dưới mức
- [ ] Export báo cáo ra Excel/PDF

### 9.4. Báo cáo sản phẩm bán chạy
- [ ] Thống kê top sản phẩm bán chạy
- [ ] Phân tích xu hướng bán hàng
- [ ] Báo cáo theo danh mục
- [ ] Biểu đồ trực quan hóa
- [ ] Export báo cáo ra Excel/PDF

### 9.5. Báo cáo công nợ
- [ ] Báo cáo công nợ nhà cung cấp
- [ ] Báo cáo công nợ khách hàng
- [ ] Cảnh báo công nợ quá hạn
- [ ] Phân tích tuổi nợ
- [ ] Export báo cáo ra Excel/PDF