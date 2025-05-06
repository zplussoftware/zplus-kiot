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
        Schema::create('stock_import_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('import_id')->constrained('stock_imports');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('quantity');
            $table->decimal('cost', 15, 2)->default(0);
            $table->decimal('total', 15, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_import_items');
    }
};
