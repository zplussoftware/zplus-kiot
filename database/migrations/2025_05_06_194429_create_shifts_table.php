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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('warehouse_id')->constrained('warehouses');
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->decimal('opening_amount', 15, 2)->default(0);
            $table->decimal('closing_amount', 15, 2)->default(0);
            $table->decimal('total_cash_sale', 15, 2)->default(0);
            $table->decimal('total_bank_sale', 15, 2)->default(0);
            $table->decimal('total_credit_sale', 15, 2)->default(0);
            $table->decimal('total_sale', 15, 2)->default(0);
            $table->string('status')->default('open'); // open, closed
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
        Schema::dropIfExists('shifts');
    }
};
