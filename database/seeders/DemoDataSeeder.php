<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\ProductStock;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\ProductSerial;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create demo staff users with different roles
        $this->createDemoUsers();
        
        // Create demo suppliers
        $this->createDemoSuppliers();
        
        // Create demo customers
        $this->createDemoCustomers();
        
        // Create demo products and stock
        $this->createDemoProducts();
    }
    
    /**
     * Create demo users with different roles
     */
    private function createDemoUsers(): void
    {
        // Get roles
        $managerRole = Role::where('name', 'Manager')->first();
        $salesRole = Role::where('name', 'Sales')->first();
        $warehouseRole = Role::where('name', 'Warehouse')->first();
        
        // Kiểm tra và tạo người dùng quản lý nếu chưa tồn tại
        if (!User::where('email', 'manager@zplus-kiot.com')->exists()) {
            $manager = User::create([
                'name' => 'Quản lý',
                'email' => 'manager@zplus-kiot.com',
                'password' => Hash::make('password'),
                'active' => 1
            ]);
            $manager->assignRole($managerRole);
        }
        
        // Kiểm tra và tạo người dùng bán hàng 1 nếu chưa tồn tại
        if (!User::where('email', 'sales1@zplus-kiot.com')->exists()) {
            $sales1 = User::create([
                'name' => 'Nhân viên bán hàng 1',
                'email' => 'sales1@zplus-kiot.com',
                'password' => Hash::make('password'),
                'active' => 1
            ]);
            $sales1->assignRole($salesRole);
        }
        
        // Kiểm tra và tạo người dùng bán hàng 2 nếu chưa tồn tại
        if (!User::where('email', 'sales2@zplus-kiot.com')->exists()) {
            $sales2 = User::create([
                'name' => 'Nhân viên bán hàng 2',
                'email' => 'sales2@zplus-kiot.com',
                'password' => Hash::make('password'),
                'active' => 1
            ]);
            $sales2->assignRole($salesRole);
        }
        
        // Kiểm tra và tạo người dùng kho nếu chưa tồn tại
        if (!User::where('email', 'warehouse@zplus-kiot.com')->exists()) {
            $warehouse = User::create([
                'name' => 'Nhân viên kho',
                'email' => 'warehouse@zplus-kiot.com',
                'password' => Hash::make('password'),
                'active' => 1
            ]);
            $warehouse->assignRole($warehouseRole);
        }
    }
    
    /**
     * Create demo suppliers
     */
    private function createDemoSuppliers(): void
    {
        $suppliers = [
            [
                'name' => 'Công ty TNHH ABC',
                'code' => 'SUP-ABC',
                'contact_person' => 'Nguyễn Văn A',
                'contact_phone' => '0901234567',
                'address' => '123 Đường Lê Lợi, Quận 1, TP HCM',
                'tax_code' => '1234567890',
                'email' => 'info@abc.com',
                'phone' => '0901234567',
                'current_debt' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Công ty TNHH XYZ',
                'code' => 'SUP-XYZ',
                'contact_person' => 'Trần Thị B',
                'contact_phone' => '0911234567',
                'address' => '456 Đường Nguyễn Huệ, Quận 1, TP HCM',
                'tax_code' => '0987654321',
                'email' => 'info@xyz.com',
                'phone' => '0911234567',
                'current_debt' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Công ty CP DEF',
                'code' => 'SUP-DEF',
                'contact_person' => 'Lê Văn C',
                'contact_phone' => '0921234567',
                'address' => '789 Đường Hai Bà Trưng, Quận 3, TP HCM',
                'tax_code' => '2468013579',
                'email' => 'info@def.com',
                'phone' => '0921234567',
                'current_debt' => 0,
                'is_active' => true,
            ],
        ];
        
        foreach ($suppliers as $supplier) {
            // Kiểm tra nhà cung cấp đã tồn tại chưa (dựa trên code hoặc email)
            if (!Supplier::where('code', $supplier['code'])->exists() && 
                !Supplier::where('email', $supplier['email'])->exists()) {
                Supplier::create($supplier);
            }
        }
    }
    
    /**
     * Create demo customers
     */
    private function createDemoCustomers(): void
    {
        // Kiểm tra xem đã có khách hàng nào chưa, nếu có thì bỏ qua để tránh tạo thêm
        if (Customer::count() > 0) {
            return;
        }
        
        // Create 5 random customers for each customer group
        for ($i = 1; $i <= 5; $i++) {
            Customer::create([
                'name' => 'Khách lẻ ' . $i,
                'phone' => '090' . rand(1000000, 9999999),
                'email' => 'customer_retail_' . $i . '@example.com',
                'address' => 'Địa chỉ khách lẻ ' . $i,
                'customer_group_id' => 1, // Khách lẻ
                'tax_code' => null,
            ]);
            
            Customer::create([
                'name' => 'Khách thường ' . $i,
                'phone' => '091' . rand(1000000, 9999999),
                'email' => 'customer_regular_' . $i . '@example.com',
                'address' => 'Địa chỉ khách thường ' . $i,
                'customer_group_id' => 2, // Khách thường
                'tax_code' => null,
            ]);
            
            Customer::create([
                'name' => 'Khách buôn ' . $i,
                'phone' => '092' . rand(1000000, 9999999),
                'email' => 'customer_wholesale_' . $i . '@example.com',
                'address' => 'Địa chỉ khách buôn ' . $i,
                'customer_group_id' => 3, // Khách buôn
                'tax_code' => rand(1000000000, 9999999999),
            ]);
            
            Customer::create([
                'name' => 'Khách VIP ' . $i,
                'phone' => '093' . rand(1000000, 9999999),
                'email' => 'customer_vip_' . $i . '@example.com',
                'address' => 'Địa chỉ khách VIP ' . $i,
                'customer_group_id' => 4, // Khách VIP
                'tax_code' => rand(1000000000, 9999999999),
            ]);
            
            Customer::create([
                'name' => 'Đối tác ' . $i,
                'phone' => '094' . rand(1000000, 9999999),
                'email' => 'partner_' . $i . '@example.com',
                'address' => 'Địa chỉ đối tác ' . $i,
                'customer_group_id' => 5, // Đối tác
                'tax_code' => rand(1000000000, 9999999999),
            ]);
        }
    }
    
    /**
     * Create demo products and stock
     */
    private function createDemoProducts(): void
    {
        // Kiểm tra xem đã có sản phẩm nào chưa, nếu có thì bỏ qua để tránh tạo thêm
        if (Product::count() > 0) {
            return;
        }
        
        // Kiểm tra và tạo thuộc tính sản phẩm nếu chưa tồn tại
        $colorAttribute = ProductAttribute::firstOrCreate(['name' => 'Màu sắc']);
        $materialAttribute = ProductAttribute::firstOrCreate(['name' => 'Chất liệu']);
        $memoryAttribute = ProductAttribute::firstOrCreate(['name' => 'Bộ nhớ']);
        $processorAttribute = ProductAttribute::firstOrCreate(['name' => 'CPU']);
        
        // Create some sample products
        $laptop1 = Product::create([
            'name' => 'Laptop ASUS TUF Gaming',
            'sku' => 'LT-ASUS-TUF',
            'price' => 22000000,
            'cost' => 19000000,
            'category_id' => Category::where('name', 'Laptop Gaming')->first()?->id ?? 5,
            'unit_id' => 1, // Cái
            'description' => 'Laptop ASUS TUF Gaming F15 FX506LHB-HN188W i5-10300H | 8GB | 512GB | GeForce GTX 1650 4GB | 15.6 inch FHD | Win 11',
            'barcode' => '8888888000001',
            'is_serial_tracked' => 1,
            'min_stock_level' => 5,
        ]);
        
        // Add attributes to laptop
        ProductAttributeValue::create([
            'product_id' => $laptop1->id,
            'attribute_id' => $colorAttribute->id,
            'value' => 'Đen',
        ]);
        
        ProductAttributeValue::create([
            'product_id' => $laptop1->id,
            'attribute_id' => $memoryAttribute->id,
            'value' => '8GB DDR4',
        ]);
        
        ProductAttributeValue::create([
            'product_id' => $laptop1->id,
            'attribute_id' => $processorAttribute->id,
            'value' => 'Intel Core i5-10300H',
        ]);
        
        // Add stock to both warehouses
        ProductStock::create([
            'product_id' => $laptop1->id,
            'warehouse_id' => 1, // Kho Chính
            'quantity' => 10,
        ]);
        
        ProductStock::create([
            'product_id' => $laptop1->id,
            'warehouse_id' => 2, // Kho Chi Nhánh
            'quantity' => 5,
        ]);
        
        // Add serial numbers to the product
        for ($i = 1; $i <= 10; $i++) {
            ProductSerial::create([
                'product_id' => $laptop1->id,
                'warehouse_id' => 1,
                'serial_number' => 'ASUS-TUF-' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'status' => 'available',
                'order_id' => null,
                'import_id' => null,
            ]);
        }
        
        for ($i = 11; $i <= 15; $i++) {
            ProductSerial::create([
                'product_id' => $laptop1->id,
                'warehouse_id' => 2,
                'serial_number' => 'ASUS-TUF-' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'status' => 'available',
                'order_id' => null,
                'import_id' => null,
            ]);
        }
        
        // Create another product - iPhone
        $iphone = Product::create([
            'name' => 'iPhone 14 Pro Max',
            'sku' => 'IP-14-PROMAX',
            'price' => 29990000,
            'cost' => 26000000,
            'category_id' => Category::where('name', 'iPhone')->first()?->id ?? 8,
            'unit_id' => 1, // Cái
            'description' => 'iPhone 14 Pro Max 128GB - Chip A16 Bionic mạnh mẽ, màn hình Dynamic Island',
            'barcode' => '8888888000002',
            'is_serial_tracked' => 1,
            'min_stock_level' => 3,
        ]);
        
        // Add attributes to iPhone
        ProductAttributeValue::create([
            'product_id' => $iphone->id,
            'attribute_id' => $colorAttribute->id,
            'value' => 'Đen',
        ]);
        
        ProductAttributeValue::create([
            'product_id' => $iphone->id,
            'attribute_id' => $memoryAttribute->id,
            'value' => '128GB',
        ]);
        
        // Add stock to both warehouses
        ProductStock::create([
            'product_id' => $iphone->id,
            'warehouse_id' => 1, // Kho Chính
            'quantity' => 8,
        ]);
        
        ProductStock::create([
            'product_id' => $iphone->id,
            'warehouse_id' => 2, // Kho Chi Nhánh
            'quantity' => 4,
        ]);
        
        // Add serial numbers to the iPhone
        for ($i = 1; $i <= 8; $i++) {
            ProductSerial::create([
                'product_id' => $iphone->id,
                'warehouse_id' => 1,
                'serial_number' => 'IP14PM-' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'status' => 'available',
                'order_id' => null,
                'import_id' => null,
            ]);
        }
        
        for ($i = 9; $i <= 12; $i++) {
            ProductSerial::create([
                'product_id' => $iphone->id,
                'warehouse_id' => 2,
                'serial_number' => 'IP14PM-' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'status' => 'available',
                'order_id' => null,
                'import_id' => null,
            ]);
        }
        
        // Create a product without serial tracking - headphones
        $headphones = Product::create([
            'name' => 'Tai nghe không dây Sony WH-1000XM4',
            'sku' => 'TN-SONY-XM4',
            'price' => 5990000,
            'cost' => 4500000,
            'category_id' => Category::where('name', 'Tai nghe')->first()?->id ?? 11,
            'unit_id' => 1, // Cái
            'description' => 'Tai nghe không dây Sony WH-1000XM4 chống ồn cao cấp',
            'barcode' => '8888888000003',
            'is_serial_tracked' => 0, // Not tracked by serial
            'min_stock_level' => 10,
        ]);
        
        // Add attributes to headphones
        ProductAttributeValue::create([
            'product_id' => $headphones->id,
            'attribute_id' => $colorAttribute->id,
            'value' => 'Đen',
        ]);
        
        // Add stock to both warehouses
        ProductStock::create([
            'product_id' => $headphones->id,
            'warehouse_id' => 1, // Kho Chính
            'quantity' => 20,
        ]);
        
        ProductStock::create([
            'product_id' => $headphones->id,
            'warehouse_id' => 2, // Kho Chi Nhánh
            'quantity' => 15,
        ]);
    }
}
