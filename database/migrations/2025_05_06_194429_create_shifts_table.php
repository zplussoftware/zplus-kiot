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
        if (Schema::hasTable('shifts')) {
            Schema::table('shifts', function (Blueprint $table) {
                // Kiểm tra và thêm các cột nếu cần
                if (!Schema::hasColumn('shifts', 'total_cash_sale')) {
                    $table->decimal('total_cash_sale', 15, 2)->default(0)->after('closing_amount');
                }
                if (!Schema::hasColumn('shifts', 'total_bank_sale')) {
                    $table->decimal('total_bank_sale', 15, 2)->default(0)->after('total_cash_sale');
                }
                if (!Schema::hasColumn('shifts', 'total_credit_sale')) {
                    $table->decimal('total_credit_sale', 15, 2)->default(0)->after('total_bank_sale');
                }
                if (!Schema::hasColumn('shifts', 'total_sale')) {
                    $table->decimal('total_sale', 15, 2)->default(0)->after('total_credit_sale');
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
        if (Schema::hasTable('shifts')) {
            Schema::table('shifts', function (Blueprint $table) {
                $table->dropColumn([
                    'total_cash_sale',
                    'total_bank_sale',
                    'total_credit_sale',
                    'total_sale'
                ]);
            });
        }
    }
};
