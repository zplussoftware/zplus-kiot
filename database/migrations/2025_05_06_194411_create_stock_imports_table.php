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
        if (Schema::hasTable('stock_imports')) {
            Schema::table('stock_imports', function (Blueprint $table) {
                // Thêm các cột còn thiếu nếu cần
                if (!Schema::hasColumn('stock_imports', 'import_number')) {
                    $table->string('import_number')->unique()->after('id');
                }
                if (!Schema::hasColumn('stock_imports', 'debt_amount')) {
                    $table->decimal('debt_amount', 15, 2)->default(0)->after('paid_amount');
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
        if (Schema::hasTable('stock_imports')) {
            Schema::table('stock_imports', function (Blueprint $table) {
                if (Schema::hasColumn('stock_imports', 'import_number')) {
                    $table->dropColumn('import_number');
                }
                if (Schema::hasColumn('stock_imports', 'debt_amount')) {
                    $table->dropColumn('debt_amount');
                }
            });
        }
    }
};
