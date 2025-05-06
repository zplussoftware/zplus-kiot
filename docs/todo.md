# Danh sách công việc cho hệ thống Z-Plus KIOT

## Giai đoạn 1: Thiết lập cơ sở dữ liệu

### 1. Tạo Migrations

#### 1.1. Bảng User và Phân quyền
- [x] users (mặc định Laravel)
- [x] roles
- [x] permissions
- [x] model_has_roles
- [x] model_has_permissions
- [x] role_has_permissions

#### 1.2. Quản lý kho hàng
- [x] warehouses (kho hàng)
- [x] user_warehouse (phân quyền theo kho)

#### 1.3. Quản lý danh mục và sản phẩm
- [x] categories (danh mục sản phẩm)
- [x] units (đơn vị tính)
- [x] products (sản phẩm)
- [x] product_attributes (thuộc tính sản phẩm)
- [x] product_attribute_values (giá trị thuộc tính)
- [x] product_images (hình ảnh sản phẩm)
- [x] product_bundles (sản phẩm combo)
- [x] product_stocks (tồn kho)
- [x] product_serials (số serial)

#### 1.4. Quản lý khách hàng và nhà cung cấp
- [x] customer_groups (nhóm khách hàng)
- [x] customers (khách hàng)
- [x] suppliers (nhà cung cấp)
- [x] supplier_debts (công nợ nhà cung cấp)
- [x] supplier_debt_payments (thanh toán công nợ)

#### 1.5. Quản lý đơn hàng và bán hàng
- [x] orders (đơn hàng)
- [x] order_items (chi tiết đơn hàng)
- [x] order_item_serials (serial trong đơn hàng)
- [x] order_payments (thanh toán đơn hàng)
- [x] order_status_history (lịch sử trạng thái)

#### 1.6. Quản lý bảo hành
- [x] warranties (bảo hành)
- [x] warranty_claims (yêu cầu bảo hành)

#### 1.7. Quản lý kho
- [x] warehouse_transfers (chuyển kho)
- [x] warehouse_transfer_items (chi tiết chuyển kho)
- [x] warehouse_transfer_serials (serial chuyển kho)
- [x] stock_imports (nhập kho)
- [x] stock_import_items (chi tiết nhập kho)

#### 1.8. Quản lý ca làm việc
- [x] shifts (ca làm việc)
- [x] shift_orders (đơn hàng trong ca)

#### 1.9. Theo dõi hoạt động
- [x] activity_log (nhật ký hoạt động)

### 2. Tạo Models

#### 2.1. User và Phân quyền
- [x] User (mặc định Laravel)
- [x] Role
- [x] Permission

#### 2.2. Quản lý kho hàng
- [x] Warehouse
- [x] UserWarehouse

#### 2.3. Quản lý danh mục và sản phẩm
- [x] Category
- [x] Unit
- [x] Product
- [x] ProductAttribute
- [x] ProductAttributeValue
- [x] ProductImage
- [x] ProductBundle
- [x] ProductStock
- [x] ProductSerial

#### 2.4. Quản lý khách hàng và nhà cung cấp
- [x] CustomerGroup
- [x] Customer
- [x] Supplier
- [x] SupplierDebt
- [x] SupplierDebtPayment

#### 2.5. Quản lý đơn hàng và bán hàng
- [x] Order
- [x] OrderItem
- [x] OrderItemSerial
- [x] OrderPayment
- [x] OrderStatusHistory

#### 2.6. Quản lý bảo hành
- [x] Warranty
- [x] WarrantyClaim

#### 2.7. Quản lý kho
- [x] WarehouseTransfer
- [x] WarehouseTransferItem
- [x] WarehouseTransferSerial
- [x] StockImport
- [x] StockImportItem

#### 2.8. Quản lý ca làm việc
- [x] Shift
- [x] ShiftOrder

#### 2.9. Theo dõi hoạt động
- [x] ActivityLog

### 3. Tạo Factory và Seeders

#### 3.1. Factory
- [x] UserFactory (mặc định Laravel)
- [x] RoleFactory
- [x] PermissionFactory
- [x] WarehouseFactory
- [x] CategoryFactory
- [x] UnitFactory
- [x] ProductFactory
- [x] ProductAttributeFactory
- [x] CustomerGroupFactory
- [x] CustomerFactory
- [x] SupplierFactory

#### 3.2. Seeders
- [x] RoleSeeder (Admin, Manager, Sales, Warehouse)
- [x] PermissionSeeder (các quyền cơ bản)
- [x] AdminUserSeeder (tạo tài khoản admin mặc định)
- [x] WarehouseSeeder (tạo kho mặc định)
- [x] CategorySeeder (tạo danh mục mẫu)
- [x] UnitSeeder (tạo đơn vị tính mẫu)
- [x] CustomerGroupSeeder (tạo nhóm khách hàng mẫu)
- [x] DemoDataSeeder (tạo dữ liệu demo cho hệ thống)

## Giai đoạn 2: Phát triển tính năng

### 1. Phân quyền và xác thực
- [ ] Cài đặt và tích hợp Spatie Laravel Permission
- [ ] Xây dựng hệ thống phân quyền theo role và permission
- [ ] Phân quyền theo kho hàng

### 2. Quản lý sản phẩm
- [ ] CRUD danh mục sản phẩm
- [ ] CRUD đơn vị tính
- [ ] CRUD sản phẩm cơ bản
- [ ] Upload và quản lý hình ảnh sản phẩm
- [ ] Quản lý thuộc tính sản phẩm
- [ ] Quản lý sản phẩm combo

### 3. Quản lý kho hàng
- [ ] CRUD kho hàng
- [ ] Phân quyền người dùng theo kho
- [ ] Nhập kho từ nhà cung cấp
- [ ] Chuyển kho
- [ ] Quản lý tồn kho
- [ ] Quản lý serial sản phẩm

### 4. Quản lý khách hàng
- [ ] CRUD nhóm khách hàng
- [ ] CRUD khách hàng
- [ ] Xem lịch sử mua hàng của khách

### 5. Quản lý nhà cung cấp và công nợ
- [ ] CRUD nhà cung cấp
- [ ] Quản lý công nợ nhà cung cấp
- [ ] Theo dõi thanh toán công nợ

### 6. Bán hàng
- [ ] Quản lý ca làm việc
- [ ] Màn hình POS bán hàng
- [ ] Tìm kiếm sản phẩm theo mã, tên, barcode
- [ ] Quản lý chiết khấu
- [ ] Thanh toán đơn hàng
- [ ] In hóa đơn

### 7. Quản lý đơn hàng
- [ ] Xem danh sách đơn hàng
- [ ] Theo dõi trạng thái đơn hàng
- [ ] Quản lý thanh toán đơn hàng

### 8. Quản lý bảo hành
- [ ] Tạo phiếu bảo hành
- [ ] Theo dõi bảo hành theo serial
- [ ] Quản lý yêu cầu bảo hành

### 9. Báo cáo
- [ ] Báo cáo doanh số
- [ ] Báo cáo lợi nhuận
- [ ] Báo cáo tồn kho
- [ ] Báo cáo sản phẩm bán chạy
- [ ] Báo cáo công nợ

## Giai đoạn 3: Hoàn thiện và tối ưu

### 1. Giao diện người dùng
- [ ] Thiết kế responsive cho màn hình admin
- [ ] Thiết kế responsive cho màn hình POS
- [ ] Tối ưu UX/UI

### 2. Tối ưu hiệu suất
- [ ] Cache
- [ ] Query optimization
- [ ] Database indexing

### 3. Kiểm thử
- [ ] Unit tests
- [ ] Feature tests
- [ ] Integration tests

### 4. Tài liệu
- [ ] Tài liệu API
- [ ] Tài liệu hướng dẫn sử dụng
- [ ] Tài liệu triển khai

### 5. Bảo mật
- [ ] Rà soát và khắc phục lỗ hổng
- [ ] Cấu hình HTTPS
- [ ] Backup và khôi phục dữ liệu