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
        // Không tạo lại bảng, mà thêm các cột còn thiếu nếu bảng đã tồn tại
        if (Schema::hasTable('order_items')) {
            Schema::table('order_items', function (Blueprint $table) {
                // Kiểm tra và thêm các cột nếu chưa tồn tại
                if (!Schema::hasColumn('order_items', 'cost')) {
                    $table->decimal('cost', 12, 2)->nullable()->after('unit_price');
                }
                if (!Schema::hasColumn('order_items', 'warranty_months')) {
                    $table->integer('warranty_months')->default(0)->after('subtotal');
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
        if (Schema::hasTable('order_items')) {
            Schema::table('order_items', function (Blueprint $table) {
                $table->dropColumn(['cost', 'warranty_months']);
            });
        }
    }
};
