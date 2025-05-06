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
        if (Schema::hasTable('shift_orders')) {
            Schema::table('shift_orders', function (Blueprint $table) {
                // Thêm các cột mới nếu cần thiết
                // Không có cột mới cần thêm trong trường hợp này
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Không xóa bảng vì nó đã được tạo bởi migration khác
    }
};
