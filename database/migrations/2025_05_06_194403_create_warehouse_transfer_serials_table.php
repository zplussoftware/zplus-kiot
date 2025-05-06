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
        Schema::create('warehouse_transfer_serials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transfer_item_id')->constrained('warehouse_transfer_items');
            $table->foreignId('serial_id')->constrained('product_serials');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_transfer_serials');
    }
};
