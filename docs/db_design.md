# Thiết kế cơ sở dữ liệu Z-Plus KIOT

## I. THIẾT KẾ DATABASE (TÊN BẢNG - CỘT CHÍNH)

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

## II. MỐI QUAN HỆ GIỮA CÁC BẢNG VÀ GHI CHÚ

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