# Tài liệu Hệ thống Quản lý Bán hàng Đơn giản (Chi tiết)

## I. CHỨC NĂNG CẦN XÂY DỰNG

### 1. Màn hình Admin

#### 1.1 Quản lý sản phẩm
* **Thông tin cơ bản sản phẩm**: Mã (SKU), tên, mô tả, giá bán, giá vốn, danh mục, đơn vị tính, mức tồn kho tối thiểu, barcode
* **Quản lý thuộc tính sản phẩm**: 
  * Tạo và quản lý các thuộc tính (màu sắc, kích thước, chất liệu, xuất xứ...)
  * Gán giá trị thuộc tính cho từng sản phẩm
  * Tìm kiếm sản phẩm theo thuộc tính
* **Quản lý hình ảnh sản phẩm**:
  * Upload nhiều hình ảnh cho một sản phẩm
  * Đánh dấu hình ảnh chính
  * Sắp xếp thứ tự hiển thị hình ảnh
* **Quản lý sản phẩm combo/bundle**:
  * Tạo sản phẩm combo từ nhiều sản phẩm đơn lẻ
  * Thiết lập số lượng của từng sản phẩm thành phần
  * Tính giá bán tự động hoặc nhập giá bán riêng

#### 1.2 Quản lý danh mục sản phẩm đa cấp
* Tạo và quản lý danh mục không giới hạn cấp
* Sắp xếp, di chuyển danh mục giữa các cấp
* Hiển thị cây danh mục

#### 1.3 Quản lý đơn vị tính sản phẩm
* Tạo và quản lý các đơn vị tính
* Thiết lập ký hiệu cho đơn vị tính

#### 1.4 Quản lý khách hàng
* **Thông tin khách hàng**: Tên, số điện thoại, email, địa chỉ
* **Phân loại khách hàng theo nhóm**:
  * Tạo các nhóm khách hàng (khách buôn, khách lẻ, khách VIP...)
  * Thiết lập tỷ lệ chiết khấu mặc định cho từng nhóm
  * Phân khách hàng vào nhóm
* **Lịch sử mua hàng**: Xem lịch sử đơn hàng của từng khách hàng

#### 1.5 Quản lý đối tác (nhà cung cấp) và công nợ
* **Thông tin đối tác**: Tên, thông tin liên hệ
* **Quản lý công nợ**:
  * Theo dõi số tiền nợ từng đối tác
  * Lịch sử thanh toán công nợ
  * Báo cáo tổng hợp công nợ theo thời gian

#### 1.6 Quản lý kho hàng
* **Quản lý nhiều kho hàng**: Tên kho, vị trí
* **Chuyển hàng giữa kho**:
  * Tạo phiếu chuyển kho
  * Xác nhận nhận hàng
* **Phân quyền user theo kho**:
  * Gán người dùng quản lý từng kho
  * Phân quyền thao tác trên từng kho

#### 1.7 Quản lý đơn hàng
* **Thông tin đơn hàng**: Khách hàng, kho xuất, sản phẩm, số lượng, giá bán, chiết khấu, tổng tiền
* **Theo dõi trạng thái đơn hàng**:
  * Các trạng thái: Mới tạo, Đã xác nhận, Đang xử lý, Đã xuất kho, Đã giao hàng, Đã thanh toán, Hoàn thành, Hủy
  * Lịch sử thay đổi trạng thái
* **Thanh toán đơn hàng**:
  * Hình thức thanh toán: Tiền mặt, chuyển khoản, công nợ
  * Theo dõi số tiền đã thanh toán, còn nợ

#### 1.8 Quản lý bảo hành sản phẩm
* **Theo dõi bảo hành theo serial**:
  * Ghi nhận serial sản phẩm khi bán
  * Tra cứu thông tin bảo hành theo serial
* **Quản lý phiếu bảo hành**:
  * Tạo phiếu nhận bảo hành
  * Cập nhật trạng thái và kết quả bảo hành
  * In phiếu bảo hành

#### 1.9 Báo cáo
* **Báo cáo doanh số**:
  * Theo thời gian (ngày, tuần, tháng, năm)
  * Theo nhân viên, kho hàng, danh mục sản phẩm
* **Báo cáo lợi nhuận**:
  * Tổng hợp lợi nhuận theo sản phẩm, danh mục
  * So sánh lợi nhuận theo thời gian
* **Báo cáo tồn kho**:
  * Số lượng tồn theo từng kho
  * Cảnh báo hàng sắp hết (dưới mức tồn kho tối thiểu)
* **Báo cáo sản phẩm bán chạy**:
  * Top sản phẩm bán chạy theo thời gian
  * Phân tích xu hướng bán hàng

### 2. Màn hình POS

#### 2.1 Quản lý ca làm việc
* **Mở ca làm việc**:
  * Đăng nhập vào hệ thống
  * Khai báo số tiền đầu ca
  * Ghi nhận thời gian bắt đầu ca
* **Đóng ca làm việc**:
  * Kiểm kê tiền mặt cuối ca
  * Đối chiếu doanh số bán hàng
  * Ghi nhận thời gian kết thúc ca
  * Báo cáo tổng kết ca

#### 2.2 Bán hàng
* **Chọn sản phẩm**:
  * Tìm kiếm sản phẩm theo mã, tên, barcode
  * Hiển thị thông tin sản phẩm: tên, giá, tồn kho
  * Chọn số lượng sản phẩm
* **Chọn khách hàng**:
  * Tìm kiếm khách hàng theo tên, số điện thoại
  * Hiển thị thông tin nhóm khách hàng và chiết khấu mặc định
  * Thêm mới khách hàng nhanh
* **Chọn kho xuất hàng**:
  * Lựa chọn kho có sản phẩm
  * Kiểm tra tồn kho theo từng kho
* **Nhập số serial (nếu có)**:
  * Quét mã serial hoặc nhập tay
  * Kiểm tra trạng thái serial (có sẵn, đã bán)
* **Áp dụng chiết khấu**:
  * Chiết khấu theo % hoặc số tiền cụ thể
  * Chiết khấu theo sản phẩm hoặc tổng đơn hàng
* **Chọn gói bảo hành**:
  * Gói bảo hành 3 tháng, 6 tháng, 12 tháng
  * Tính phí bảo hành (nếu có)
* **Thanh toán**:
  * Chọn phương thức thanh toán: tiền mặt, chuyển khoản, công nợ
  * Nhập số tiền khách trả, tính tiền thối lại
  * Ghi nhận thông tin thanh toán

#### 2.3 Tạo phiếu bảo hành
* **Phiếu bảo hành theo serial**:
  * Tự động tạo phiếu bảo hành khi bán sản phẩm có serial
  * Ghi nhận thông tin bảo hành: thời hạn, điều kiện
* **In phiếu bảo hành**:
  * Xuất phiếu bảo hành cho khách hàng
  * Lưu lại phiếu bảo hành trong hệ thống

#### 2.4 Xuất kho và in phiếu bán hàng
* **Xuất kho**:
  * Cập nhật số lượng tồn kho tự động
  * Ghi nhận thông tin xuất kho: người xuất, thời gian
* **In phiếu bán hàng**:
  * In hóa đơn bán hàng chi tiết
  * Tùy chỉnh mẫu in theo nhu cầu
  * Gửi hóa đơn qua email (nếu cần)

## II. LUỒNG XỬ LÝ CHÍNH

### A. Bán hàng (POS)

1. **Mở ca làm việc**
   * Nhân viên đăng nhập vào hệ thống
   * Khai báo số tiền đầu ca
   * Hệ thống ghi nhận thời gian bắt đầu ca làm việc

2. **Tạo đơn hàng mới**
   * Nhân viên chọn "Tạo đơn hàng mới"
   * Hệ thống tạo đơn hàng với trạng thái "Mới tạo"

3. **Chọn sản phẩm**
   * Nhân viên tìm kiếm sản phẩm (theo mã, tên, quét barcode)
   * Hệ thống hiển thị thông tin sản phẩm: tên, giá, tồn kho
   * Nhân viên nhập số lượng
   * Nếu sản phẩm cần quản lý serial:
     * Hệ thống yêu cầu nhập số serial
     * Nhân viên quét hoặc nhập số serial
     * Hệ thống kiểm tra trạng thái serial (có sẵn, đã bán)
   * Hệ thống thêm sản phẩm vào đơn hàng

4. **Chọn khách hàng**
   * Nhân viên tìm kiếm khách hàng (theo tên, số điện thoại)
   * Hệ thống hiển thị thông tin khách hàng và nhóm khách hàng
   * Nếu khách hàng mới:
     * Nhân viên chọn "Thêm khách hàng mới"
     * Nhập thông tin khách hàng
     * Chọn nhóm khách hàng

5. **Áp dụng chiết khấu/gói bảo hành**
   * Hệ thống áp dụng chiết khấu mặc định theo nhóm khách hàng
   * Nhân viên có thể điều chỉnh chiết khấu (theo % hoặc số tiền)
   * Chọn gói bảo hành cho sản phẩm (3T, 6T, 12T) nếu có

6. **Chọn kho xuất hàng**
   * Nhân viên chọn kho xuất hàng
   * Hệ thống kiểm tra tồn kho tại kho được chọn

7. **Xác nhận thanh toán**
   * Hệ thống hiển thị tổng tiền phải thanh toán
   * Nhân viên chọn phương thức thanh toán:
     * Tiền mặt: Nhập số tiền khách trả, hệ thống tính tiền thối
     * Chuyển khoản: Ghi nhận thông tin giao dịch
     * Công nợ: Ghi nhận số tiền còn nợ
   * Cho phép thanh toán kết hợp nhiều phương thức

8. **Hoàn tất đơn hàng**
   * Hệ thống lưu đơn hàng, chuyển trạng thái sang "Đã thanh toán"
   * Cập nhật tồn kho: giảm số lượng tại kho xuất
   * Cập nhật trạng thái serial (nếu có): chuyển từ "có sẵn" sang "đã bán"
   * Tạo phiếu bảo hành nếu có gói bảo hành
   * Ghi nhận đơn hàng vào doanh số ca làm việc hiện tại

9. **In hóa đơn và phiếu bảo hành**
   * Hệ thống in hóa đơn bán hàng
   * In phiếu bảo hành (nếu có)
   * Gửi hóa đơn qua email (tùy chọn)

10. **Đóng ca làm việc**
    * Kết thúc ngày bán hàng, nhân viên chọn "Đóng ca"
    * Nhập số tiền thực tế cuối ca
    * Hệ thống tính toán doanh số, số tiền chênh lệch
    * Ghi nhận thời gian kết thúc ca
    * Xuất báo cáo tổng kết ca làm việc

### B. Chuyển kho

1. **Tạo phiếu chuyển kho**
   * User chọn chức năng "Chuyển kho"
   * Hệ thống tạo phiếu chuyển kho mới với trạng thái "Tạo mới"

2. **Chọn kho gửi và kho nhận**
   * User chọn kho gửi (kho xuất hàng)
   * User chọn kho nhận (kho nhập hàng)
   * Hệ thống kiểm tra quyền của user đối với các kho

3. **Chọn sản phẩm chuyển kho**
   * User tìm kiếm sản phẩm (theo mã, tên)
   * Hệ thống hiển thị số lượng tồn tại kho gửi
   * User nhập số lượng cần chuyển
   * Nếu sản phẩm quản lý theo serial:
     * User quét hoặc nhập các số serial cần chuyển
     * Hệ thống kiểm tra trạng thái serial

4. **Xác nhận chuyển kho**
   * User nhập ghi chú (nếu cần)
   * User xác nhận chuyển kho
   * Hệ thống cập nhật trạng thái phiếu sang "Đang chuyển"

5. **Cập nhật tồn kho**
   * Hệ thống giảm số lượng tồn tại kho gửi
   * Trạng thái serial (nếu có) chuyển sang "đang chuyển kho"

6. **Xác nhận nhận hàng**
   * User tại kho nhận đăng nhập vào hệ thống
   * Xem danh sách phiếu chuyển kho đến
   * Xác nhận đã nhận hàng
   * Hệ thống cập nhật trạng thái phiếu sang "Đã nhận"

7. **Hoàn tất chuyển kho**
   * Hệ thống tăng số lượng tồn tại kho nhận
   * Cập nhật trạng thái serial (nếu có) sang "có sẵn" tại kho mới

### C. Nhập kho

1. **Tạo phiếu nhập kho**
   * User chọn chức năng "Nhập kho"
   * Hệ thống tạo phiếu nhập kho mới với trạng thái "Tạo mới"

2. **Chọn nhà cung cấp và kho nhận**
   * User chọn nhà cung cấp từ danh sách hoặc tạo mới
   * User chọn kho nhận hàng
   * Hệ thống kiểm tra quyền của user đối với kho

3. **Nhập thông tin sản phẩm**
   * User tìm kiếm sản phẩm (theo mã, tên)
   * User nhập số lượng và giá vốn
   * Tính thành tiền cho từng sản phẩm
   * Nếu sản phẩm quản lý theo serial:
     * User quét hoặc nhập các số serial
     * Hệ thống kiểm tra trùng lặp serial

4. **Xác nhận nhập kho**
   * Hệ thống tính tổng giá trị nhập kho
   * User nhập thông tin thanh toán:
     * Đã thanh toán: Số tiền đã trả nhà cung cấp
     * Chưa thanh toán: Số tiền còn nợ
   * User xác nhận nhập kho

5. **Cập nhật tồn kho và công nợ**
   * Hệ thống tăng số lượng tồn tại kho nhận
   * Thêm serial mới vào hệ thống (nếu có)
   * Nếu chưa thanh toán hết:
     * Tạo công nợ đối với nhà cung cấp
     * Cập nhật tổng công nợ của nhà cung cấp

6. **Hoàn tất nhập kho**
   * Hệ thống chuyển trạng thái phiếu sang "Hoàn thành"
   * In phiếu nhập kho (nếu cần)

### D. Bảo hành

1. **Tiếp nhận yêu cầu bảo hành**
   * Khách hàng mang sản phẩm đến bảo hành
   * User chọn chức năng "Bảo hành"

2. **Tìm thông tin sản phẩm**
   * User tìm theo:
     * Quét/nhập số serial
     * Tìm theo đơn hàng
     * Tìm theo thông tin khách hàng
   * Hệ thống hiển thị thông tin sản phẩm, thời hạn bảo hành

3. **Kiểm tra điều kiện bảo hành**
   * Hệ thống kiểm tra:
     * Sản phẩm còn trong thời hạn bảo hành?
     * Lỗi thuộc diện được bảo hành?

4. **Tạo phiếu nhận bảo hành**
   * User nhập thông tin:
     * Tình trạng lỗi
     * Mô tả chi tiết
     * Dự kiến thời gian xử lý
   * Hệ thống tạo phiếu bảo hành với trạng thái "Đã nhận"
   * In phiếu nhận bảo hành cho khách hàng

5. **Xử lý bảo hành**
   * User cập nhật tiến trình xử lý:
     * Đang sửa chữa
     * Chờ linh kiện
     * Đã sửa xong
     * Không sửa được
   * Ghi nhận thông tin xử lý

6. **Trả sản phẩm cho khách hàng**
   * User cập nhật trạng thái sang "Đã trả khách"
   * Ghi nhận thời gian trả
   * Yêu cầu khách hàng xác nhận đã nhận
   * In phiếu trả bảo hành (nếu cần)

7. **Hoàn tất bảo hành**
   * Hệ thống cập nhật lịch sử bảo hành của sản phẩm
   * Lưu thông tin cho báo cáo bảo hành

### E. Quản lý công nợ đối tác

1. **Phát sinh công nợ**
   * Khi nhập hàng nhưng chưa thanh toán hết
   * Hệ thống tự động tạo công nợ với nhà cung cấp
   * Ghi nhận: Nhà cung cấp, Số tiền, Phiếu nhập liên quan, Ngày đến hạn

2. **Xem danh sách công nợ**
   * User chọn chức năng "Công nợ đối tác"
   * Hệ thống hiển thị danh sách công nợ:
     * Đã thanh toán
     * Chưa thanh toán
     * Quá hạn thanh toán
   * Lọc theo nhà cung cấp, thời gian, trạng thái

3. **Thanh toán công nợ**
   * User chọn công nợ cần thanh toán
   * Nhập số tiền thanh toán (có thể thanh toán một phần)
   * Ghi nhận thông tin thanh toán: Ngày, Phương thức, Ghi chú

4. **Cập nhật công nợ**
   * Hệ thống cập nhật số tiền còn nợ
   * Nếu thanh toán hết: Chuyển trạng thái sang "Đã thanh toán"
   * Nếu thanh toán một phần: Giữ trạng thái "Chưa thanh toán"

5. **Báo cáo công nợ**
   * Tổng hợp công nợ theo nhà cung cấp
   * Phân tích tuổi nợ (Dưới 30 ngày, 30-60 ngày, 60-90 ngày, Trên 90 ngày)
   * Cảnh báo công nợ sắp đến hạn hoặc quá hạn

## III. THIẾT KẾ DATABASE (TÊN BẢNG - CỘT CHÍNH)

### A. Quản lý người dùng và phân quyền

```plaintext
users
- id                  : Khóa chính
- name                : Tên người dùng
- email               : Email đăng nhập
- password            : Mật khẩu (đã mã hóa)
- active              : Trạng thái hoạt động (1: hoạt động, 0: không hoạt động)
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
roles
- id                  : Khóa chính
- name                : Tên vai trò (Admin, Manager, Sales, Warehouse)
- guard_name          : Tên guard (web, api)
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
```

```plaintext
permissions
- id                  : Khóa chính
- name                : Tên quyền (view_products, create_orders...)
- guard_name          : Tên guard (web, api)
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
```

```plaintext
model_has_roles
- role_id             : Khóa ngoại tới bảng roles
- model_type          : Loại model (App\Models\User)
- model_id            : ID của model
```

```plaintext
model_has_permissions
- permission_id       : Khóa ngoại tới bảng permissions
- model_type          : Loại model (App\Models\User)
- model_id            : ID của model
```

```plaintext
role_has_permissions
- permission_id       : Khóa ngoại tới bảng permissions
- role_id             : Khóa ngoại tới bảng roles
```

### B. Quản lý kho hàng

```plaintext
warehouses
- id                  : Khóa chính
- name                : Tên kho
- location            : Địa điểm kho
- description         : Mô tả kho
- status              : Trạng thái (active, inactive)
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
user_warehouse
- id                  : Khóa chính
- user_id             : Khóa ngoại tới bảng users
- warehouse_id        : Khóa ngoại tới bảng warehouses
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

### C. Quản lý danh mục và sản phẩm

```plaintext
categories
- id                  : Khóa chính
- name                : Tên danh mục
- parent_id           : Khóa ngoại tới chính bảng categories (danh mục cha)
- description         : Mô tả danh mục
- order               : Thứ tự hiển thị
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
units
- id                  : Khóa chính
- name                : Tên đơn vị tính
- symbol              : Ký hiệu
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
products
- id                  : Khóa chính
- name                : Tên sản phẩm
- sku                 : Mã sản phẩm
- price               : Giá bán
- cost                : Giá vốn
- category_id         : Khóa ngoại tới bảng categories
- unit_id             : Khóa ngoại tới bảng units
- description         : Mô tả sản phẩm
- barcode             : Mã vạch
- is_serial_tracked   : Có quản lý theo serial không (1: có, 0: không)
- min_stock_level     : Mức tồn kho tối thiểu
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
product_attributes
- id                  : Khóa chính
- name                : Tên thuộc tính (màu sắc, kích thước...)
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
product_attribute_values
- id                  : Khóa chính
- product_id          : Khóa ngoại tới bảng products
- attribute_id        : Khóa ngoại tới bảng product_attributes
- value               : Giá trị thuộc tính
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
product_images
- id                  : Khóa chính
- product_id          : Khóa ngoại tới bảng products
- image_path          : Đường dẫn đến hình ảnh
- is_primary          : Là hình ảnh chính không (1: có, 0: không)
- display_order       : Thứ tự hiển thị
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
product_bundles
- id                  : Khóa chính
- bundle_product_id   : Khóa ngoại tới bảng products (sản phẩm combo)
- component_product_id: Khóa ngoại tới bảng products (sản phẩm thành phần)
- quantity            : Số lượng sản phẩm thành phần
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
product_stocks
- id                  : Khóa chính
- product_id          : Khóa ngoại tới bảng products
- warehouse_id        : Khóa ngoại tới bảng warehouses
- quantity            : Số lượng tồn kho
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
product_serials
- id                  : Khóa chính
- product_id          : Khóa ngoại tới bảng products
- warehouse_id        : Khóa ngoại tới bảng warehouses (kho hiện tại)
- serial_number       : Số serial
- status              : Trạng thái (available/sold/defect/in_transfer)
- order_id            : Khóa ngoại tới bảng orders (null nếu chưa bán)
- import_id           : Khóa ngoại tới bảng stock_imports (đợt nhập)
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

### D. Quản lý khách hàng và nhà cung cấp

```plaintext
customer_groups
- id                  : Khóa chính
- name                : Tên nhóm (Khách lẻ, Khách buôn, VIP...)
- description         : Mô tả nhóm
- discount_percentage : Tỷ lệ chiết khấu mặc định
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
customers
- id                  : Khóa chính
- name                : Tên khách hàng
- phone               : Số điện thoại
- email               : Email
- address             : Địa chỉ
- customer_group_id   : Khóa ngoại tới bảng customer_groups
- tax_code            : Mã số thuế (nếu có)
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
suppliers
- id                  : Khóa chính
- name                : Tên nhà cung cấp
- contact_info        : Thông tin liên hệ
- address             : Địa chỉ
- tax_code            : Mã số thuế
- email               : Email
- phone               : Số điện thoại
- debt_total          : Tổng công nợ
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
supplier_debts
- id                  : Khóa chính
- supplier_id         : Khóa ngoại tới bảng suppliers
- import_id           : Khóa ngoại tới bảng stock_imports
- amount              : Số tiền ban đầu
- paid                : Số tiền đã thanh toán
- due_date            : Ngày đến hạn
- note                : Ghi chú
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
supplier_debt_payments
- id                  : Khóa chính
- supplier_debt_id    : Khóa ngoại tới bảng supplier_debts
- amount              : Số tiền thanh toán
- payment_date        : Ngày thanh toán
- payment_method      : Phương thức thanh toán
- note                : Ghi chú
- user_id             : Khóa ngoại tới bảng users (người ghi nhận)
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

### E. Quản lý đơn hàng và bán hàng

```plaintext
orders
- id                  : Khóa chính
- order_number        : Số đơn hàng (tự động tạo)
- customer_id         : Khóa ngoại tới bảng customers
- warehouse_id        : Khóa ngoại tới bảng warehouses
- user_id             : Khóa ngoại tới bảng users (người tạo)
- subtotal            : Tổng tiền hàng (trước chiết khấu)
- discount            : Chiết khấu
- total               : Tổng tiền thanh toán
- paid_amount         : Số tiền đã thanh toán
- debt_amount         : Số tiền còn nợ
- status              : Trạng thái đơn hàng (new/confirmed/processing/completed/canceled)
- note                : Ghi chú
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
order_items
- id                  : Khóa chính
- order_id            : Khóa ngoại tới bảng orders
- product_id          : Khóa ngoại tới bảng products
- quantity            : Số lượng
- price               : Giá bán
- cost                : Giá vốn (để tính lợi nhuận)
- discount            : Chiết khấu
- total               : Thành tiền
- warranty_months     : Số tháng bảo hành
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
order_item_serials
- id                  : Khóa chính
- order_item_id       : Khóa ngoại tới bảng order_items
- serial_id           : Khóa ngoại tới bảng product_serials
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
order_payments
- id                  : Khóa chính
- order_id            : Khóa ngoại tới bảng orders
- amount              : Số tiền thanh toán
- payment_method      : Phương thức thanh toán (cash/bank_transfer/credit)
- payment_date        : Ngày thanh toán
- transaction_code    : Mã giao dịch (nếu có)
- note                : Ghi chú
- user_id             : Khóa ngoại tới bảng users (người ghi nhận)
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
order_status_history
- id                  : Khóa chính
- order_id            : Khóa ngoại tới bảng orders
- status              : Trạng thái
- user_id             : Khóa ngoại tới bảng users (người thay đổi)
- note                : Ghi chú
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

### F. Quản lý bảo hành

```plaintext
warranties
- id                  : Khóa chính
- serial_id           : Khóa ngoại tới bảng product_serials
- customer_id         : Khóa ngoại tới bảng customers
- order_id            : Khóa ngoại tới bảng orders
- warranty_months     : Số tháng bảo hành
- start_date          : Ngày bắt đầu bảo hành
- end_date            : Ngày kết thúc bảo hành
- status              : Trạng thái bảo hành (active/expired/void)
- note                : Ghi chú
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
warranty_claims
- id                  : Khóa chính
- warranty_id         : Khóa ngoại tới bảng warranties
- received_date       : Ngày nhận
- issue_description   : Mô tả lỗi
- diagnosis           : Chẩn đoán
- solution            : Giải pháp xử lý
- status              : Trạng thái (received/processing/completed/returned)
- completed_date      : Ngày hoàn thành
- returned_date       : Ngày trả khách
- technician_id       : Khóa ngoại tới bảng users (kỹ thuật viên)
- received_by         : Khóa ngoại tới bảng users (người nhận)
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

### G. Quản lý kho

```plaintext
warehouse_transfers
- id                  : Khóa chính
- transfer_number     : Số phiếu chuyển kho
- from_warehouse_id   : Khóa ngoại tới bảng warehouses (kho gửi)
- to_warehouse_id     : Khóa ngoại tới bảng warehouses (kho nhận)
- user_id             : Khóa ngoại tới bảng users (người tạo)
- status              : Trạng thái (pending/in_transit/completed/canceled)
- note                : Ghi chú
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
warehouse_transfer_items
- id                  : Khóa chính
- transfer_id         : Khóa ngoại tới bảng warehouse_transfers
- product_id          : Khóa ngoại tới bảng products
- quantity            : Số lượng
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
warehouse_transfer_serials
- id                  : Khóa chính
- transfer_item_id    : Khóa ngoại tới bảng warehouse_transfer_items
- serial_id           : Khóa ngoại tới bảng product_serials
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
stock_imports
- id                  : Khóa chính
- import_number       : Số phiếu nhập kho
- supplier_id         : Khóa ngoại tới bảng suppliers
- warehouse_id        : Khóa ngoại tới bảng warehouses
- user_id             : Khóa ngoại tới bảng users (người tạo)
- total               : Tổng giá trị
- paid_amount         : Số tiền đã thanh toán
- debt_amount         : Số tiền còn nợ
- status              : Trạng thái (pending/completed/canceled)
- note                : Ghi chú
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
stock_import_items
- id                  : Khóa chính
- import_id           : Khóa ngoại tới bảng stock_imports
- product_id          : Khóa ngoại tới bảng products
- quantity            : Số lượng
- cost                : Giá vốn
- total               : Thành tiền
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

### H. Quản lý ca làm việc

```plaintext
shifts
- id                  : Khóa chính
- user_id             : Khóa ngoại tới bảng users
- warehouse_id        : Khóa ngoại tới bảng warehouses
- start_time          : Thời gian bắt đầu
- end_time            : Thời gian kết thúc (null nếu chưa đóng ca)
- opening_amount      : Số tiền đầu ca
- closing_amount      : Số tiền cuối ca
- total_cash_sale     : Tổng doanh số tiền mặt
- total_bank_sale     : Tổng doanh số chuyển khoản
- total_credit_sale   : Tổng doanh số công nợ
- total_sale          : Tổng doanh số
- status              : Trạng thái (open/closed)
- note                : Ghi chú
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

```plaintext
shift_orders
- id                  : Khóa chính
- shift_id            : Khóa ngoại tới bảng shifts
- order_id            : Khóa ngoại tới bảng orders
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
- deleted_at          : Thời gian xóa (soft delete)
```

### I. Theo dõi hoạt động

```plaintext
activity_log
- id                  : Khóa chính
- log_name            : Tên nhật ký (default/system)
- description         : Mô tả hoạt động
- subject_type        : Loại đối tượng tác động (App\Models\Product...)
- subject_id          : ID của đối tượng
- causer_type         : Loại người thực hiện (App\Models\User)
- causer_id           : ID của người thực hiện
- properties          : Thuộc tính JSON (dữ liệu cũ/mới)
- created_at          : Thời gian tạo
- updated_at          : Thời gian cập nhật
```

## IV. MỐI QUAN HỆ GIỮA CÁC BẢNG VÀ GHI CHÚ

### A. Mối quan hệ chính

1. **Quản lý sản phẩm**:
   * `products` → `categories`: Mỗi sản phẩm thuộc về một danh mục
   * `products` → `units`: Mỗi sản phẩm có một đơn vị tính
   * `product_stocks` → `products` + `warehouses`: Theo dõi số lượng của sản phẩm tại từng kho
   * `product_serials` → `products` + `warehouses`: Theo dõi số serial của sản phẩm tại từng kho
   * `product_attribute_values` → `products` + `product_attributes`: Gán thuộc tính cho sản phẩm
   * `product_images` → `products`: Hình ảnh của sản phẩm
   * `product_bundles` → `products` + `products`: Quan hệ sản phẩm combo với sản phẩm thành phần

2. **Quản lý đơn hàng**:
   * `orders` → `customers`: Mỗi đơn hàng thuộc về một khách hàng
   * `orders` → `warehouses`: Mỗi đơn hàng xuất từ một kho
   * `orders` → `users`: Mỗi đơn hàng được tạo bởi một nhân viên
   * `order_items` → `orders` + `products`: Chi tiết sản phẩm trong đơn hàng
   * `order_item_serials` → `order_items` + `product_serials`: Liên kết serial với đơn hàng
   * `order_payments` → `orders`: Các lần thanh toán của đơn hàng
   * `order_status_history` → `orders`: Lịch sử thay đổi trạng thái đơn hàng

3. **Quản lý khách hàng**:
   * `customers` → `customer_groups`: Mỗi khách hàng thuộc về một nhóm khách hàng

4. **Quản lý nhà cung cấp và công nợ**:
   * `supplier_debts` → `suppliers` + `stock_imports`: Công nợ với nhà cung cấp
   * `supplier_debt_payments` → `supplier_debts`: Các lần thanh toán công nợ

5. **Quản lý kho**:
   * `warehouse_transfers` → `warehouses` + `warehouses`: Chuyển hàng giữa các kho
   * `warehouse_transfer_items` → `warehouse_transfers` + `products`: Chi tiết sản phẩm chuyển kho
   * `warehouse_transfer_serials` → `warehouse_transfer_items` + `product_serials`: Serial chuyển kho
   * `stock_imports` → `suppliers` + `warehouses`: Nhập kho từ nhà cung cấp
   * `stock_import_items` → `stock_imports` + `products`: Chi tiết sản phẩm nhập kho

6. **Quản lý bảo hành**:
   * `warranties` → `product_serials` + `customers` + `orders`: Phiếu bảo hành
   * `warranty_claims` → `warranties`: Các lần nhận bảo hành

7. **Quản lý ca làm việc**:
   * `shifts` → `users` + `warehouses`: Ca làm việc của nhân viên tại kho
   * `shift_orders` → `shifts` + `orders`: Đơn hàng trong ca làm việc

8. **Phân quyền người dùng**:
   * `users` → `roles` (qua `model_has_roles`): Gán vai trò cho người dùng
   * `roles` → `permissions` (qua `role_has_permissions`): Gán quyền cho vai trò
   * `users` → `permissions` (qua `model_has_permissions`): Gán quyền trực tiếp cho người dùng
   * `users` → `warehouses` (qua `user_warehouse`): Phân quyền người dùng theo kho

### B. Ghi chú và nguyên tắc hoạt động

1. **Quản lý tồn kho**:
   * Tồn kho được tính theo bảng `product_stocks` - cập nhật số lượng tồn kho của từng sản phẩm tại từng kho
   * Khi bán hàng: giảm số lượng trong `product_stocks` của kho xuất
   * Khi nhập kho: tăng số lượng trong `product_stocks` của kho nhận
   * Khi chuyển kho: giảm số lượng tại kho gửi và tăng số lượng tại kho nhận khi hoàn tất chuyển kho

2. **Quản lý serial sản phẩm**:
   * Mỗi sản phẩm có thể có hoặc không quản lý theo serial (trường `is_serial_tracked` trong bảng `products`)
   * Serial được lưu trong bảng `product_serials` với trạng thái:
     * `available`: Có sẵn trong kho
     * `sold`: Đã bán cho khách hàng
     * `defect`: Bị lỗi, không bán được
     * `in_transfer`: Đang trong quá trình chuyển kho
   * Khi bán sản phẩm có serial: cập nhật trạng thái từ `available` sang `sold`, liên kết với đơn hàng
   * Khi nhập kho: thêm mới serial với trạng thái `available`
   * Khi chuyển kho: cập nhật trạng thái từ `available` sang `in_transfer`, sau đó cập nhật `warehouse_id` và trạng thái lại thành `available` khi hoàn tất

3. **Quản lý bảo hành**:
   * Bảo hành chỉ áp dụng cho sản phẩm có serial
   * Khi bán sản phẩm có gói bảo hành: tự động tạo bản ghi trong bảng `warranties`
   * Thông tin bảo hành bao gồm: số serial, khách hàng, thời hạn, ngày bắt đầu/kết thúc
   * Khi khách hàng mang sản phẩm đến bảo hành: tạo bản ghi trong bảng `warranty_claims`
   * Theo dõi tiến trình bảo hành qua trạng thái trong `warranty_claims`

4. **Quản lý công nợ đối tác**:
   * Khi nhập hàng mà chưa thanh toán đủ: tạo công nợ trong bảng `supplier_debts`
   * Theo dõi các lần thanh toán công nợ qua bảng `supplier_debt_payments`
   * Tổng công nợ của nhà cung cấp được cập nhật trong trường `debt_total` của bảng `suppliers`

5. **Phân quyền người dùng**:
   * Sử dụng hệ thống phân quyền với các bảng: `roles`, `permissions`, `model_has_roles`, `model_has_permissions`, `role_has_permissions`
   * Một người dùng có thể có nhiều vai trò (roles)
   * Mỗi vai trò có nhiều quyền (permissions)
   * Người dùng cũng có thể được gán quyền trực tiếp
   * Phân quyền theo kho: người dùng chỉ thao tác được với các kho được gán trong bảng `user_warehouse`

6. **Quản lý danh mục sản phẩm**:
   * Danh mục sản phẩm hỗ trợ nhiều cấp (đa cấp) nhờ trường `parent_id` trong bảng `categories`
   * Mỗi danh mục có thể là danh mục con của một danh mục khác
   * Danh mục cấp cao nhất có `parent_id = null`

7. **Quản lý khách hàng**:
   * Khách hàng được phân loại theo nhóm trong bảng `customer_groups`
   * Mỗi nhóm khách hàng có tỷ lệ chiết khấu mặc định khác nhau
   * Khi tạo đơn hàng, hệ thống sẽ áp dụng chiết khấu mặc định theo nhóm của khách hàng

8. **Quản lý đơn hàng**:
   * Đơn hàng có các trạng thái: Mới tạo, Đã xác nhận, Đang xử lý, Đã xuất kho, Đã giao hàng, Đã thanh toán, Hoàn thành, Hủy
   * Mỗi khi trạng thái đơn hàng thay đổi: ghi nhận vào bảng `order_status_history`
   * Đơn hàng có thể thanh toán nhiều lần, qua nhiều phương thức khác nhau, được lưu trong bảng `order_payments`

9. **Quản lý ca làm việc**:
   * Mỗi nhân viên phải mở ca làm việc trước khi bán hàng
   * Đơn hàng được ghi nhận vào ca làm việc hiện tại qua bảng `shift_orders`
   * Khi đóng ca, hệ thống tính toán tổng doanh số, so sánh số tiền thực tế với số tiền trên hệ thống

10. **Theo dõi hoạt động**:
    * Mọi thao tác quan trọng trong hệ thống được ghi nhận vào bảng `activity_log`
    * Thông tin log bao gồm: người thực hiện, hành động, đối tượng tác động, dữ liệu cũ/mới
    * Dùng để kiểm tra lịch sử thay đổi và xử lý sự cố

11. **Soft Delete**:
    * Tất cả các bảng đều có trường `deleted_at` để sử dụng cơ chế soft delete
    * Khi xóa dữ liệu, hệ thống không xóa thực sự mà chỉ đánh dấu là đã xóa
    * Dữ liệu đã xóa có thể được khôi phục nếu cần

12. **Báo cáo và thống kê**:
    * Doanh số bán hàng: theo thời gian, nhân viên, kho, danh mục
    * Lợi nhuận: dựa trên giá bán và giá vốn của từng sản phẩm
    * Tồn kho: số lượng tồn theo từng kho, cảnh báo hàng sắp hết
    * Sản phẩm bán chạy: top sản phẩm theo số lượng hoặc doanh số
    * Công nợ đối tác: tổng công nợ, tuổi nợ, đến hạn thanh toán

Các quy tắc và nguyên tắc trên đảm bảo hệ thống hoạt động chính xác và đáp ứng đầy đủ các yêu cầu nghiệp vụ trong quản lý bán hàng, kho hàng, bảo hành và báo cáo.
