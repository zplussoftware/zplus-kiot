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
        Schema::create('warranties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serial_id')->constrained('product_serials');
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('order_id')->constrained('orders');
            $table->integer('warranty_months');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'expired', 'void'])->default('active');
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warranties');
    }
};
