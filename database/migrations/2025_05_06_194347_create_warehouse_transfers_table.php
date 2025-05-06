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
        if (Schema::hasTable('warehouse_transfers')) {
            Schema::table('warehouse_transfers', function (Blueprint $table) {
                // Thêm các cột còn thiếu nếu cần
                if (!Schema::hasColumn('warehouse_transfers', 'transfer_number')) {
                    $table->string('transfer_number')->unique()->after('id');
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
        if (Schema::hasTable('warehouse_transfers') && Schema::hasColumn('warehouse_transfers', 'transfer_number')) {
            Schema::table('warehouse_transfers', function (Blueprint $table) {
                $table->dropColumn('transfer_number');
            });
        }
    }
};
