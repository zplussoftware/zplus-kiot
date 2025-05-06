<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Không tạo lại bảng, mà chỉ thêm các thuộc tính cần thiết nếu bảng đã tồn tại
        if (Schema::hasTable('warehouse_transfer_items')) {
            Schema::table('warehouse_transfer_items', function (Blueprint $table) {
                // Kiểm tra và thêm các cột nếu cần
                if (!Schema::hasColumn('warehouse_transfer_items', 'transfer_id')) {
                    $table->foreignId('transfer_id')->constrained('warehouse_transfers')->after('id');
                }
                if (!Schema::hasColumn('warehouse_transfer_items', 'product_id')) {
                    $table->foreignId('product_id')->constrained('products')->after('transfer_id');
                }
                if (!Schema::hasColumn('warehouse_transfer_items', 'quantity')) {
                    $table->integer('quantity')->after('product_id');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Không xóa bảng, chỉ xóa các cột đã thêm nếu cần
        // Migration này không thêm cột mới nên không cần xóa gì trong down()
    }
};
