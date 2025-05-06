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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->unique();
            $table->decimal('price', 15, 2);
            $table->decimal('cost', 15, 2);
            $table->foreignId('category_id')->constrained();
            $table->foreignId('unit_id')->constrained();
            $table->text('description')->nullable();
            $table->string('barcode')->nullable()->unique();
            $table->boolean('is_serial_tracked')->default(false);
            $table->integer('min_stock_level')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
