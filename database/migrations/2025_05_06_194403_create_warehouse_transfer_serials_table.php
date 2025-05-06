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
        if (Schema::hasTable('warehouse_transfer_serials')) {
            Schema::table('warehouse_transfer_serials', function (Blueprint $table) {
                // Kiểm tra và thêm các cột nếu cần
                if (!Schema::hasColumn('warehouse_transfer_serials', 'transfer_item_id')) {
                    $table->foreignId('transfer_item_id')->constrained('warehouse_transfer_items')->after('id');
                }
                if (!Schema::hasColumn('warehouse_transfer_serials', 'serial_id')) {
                    $table->foreignId('serial_id')->constrained('product_serials')->after('transfer_item_id');
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
