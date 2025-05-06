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
        Schema::create('warranty_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warranty_id')->constrained('warranties');
            $table->date('received_date');
            $table->text('issue_description');
            $table->text('diagnosis')->nullable();
            $table->text('solution')->nullable();
            $table->enum('status', ['received', 'processing', 'completed', 'returned'])->default('received');
            $table->date('completed_date')->nullable();
            $table->date('returned_date')->nullable();
            $table->foreignId('technician_id')->nullable()->constrained('users');
            $table->foreignId('received_by')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warranty_claims');
    }
};
