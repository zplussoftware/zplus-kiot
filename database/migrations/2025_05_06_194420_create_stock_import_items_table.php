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
        if (Schema::hasTable('stock_import_items')) {
            Schema::table('stock_import_items', function (Blueprint $table) {
                // Kiểm tra và thêm các cột nếu cần
                if (!Schema::hasColumn('stock_import_items', 'cost')) {
                    $table->decimal('cost', 15, 2)->default(0)->after('quantity');
                }
                if (!Schema::hasColumn('stock_import_items', 'total')) {
                    $table->decimal('total', 15, 2)->default(0)->after('cost');
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
        if (Schema::hasTable('stock_import_items')) {
            Schema::table('stock_import_items', function (Blueprint $table) {
                if (Schema::hasColumn('stock_import_items', 'cost')) {
                    $table->dropColumn('cost');
                }
                if (Schema::hasColumn('stock_import_items', 'total')) {
                    $table->dropColumn('total');
                }
            });
        }
    }
};
