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
        Schema::create('pivot_invoices_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoices_id')->constrained('invoices')->cascadeOnDelete();
            $table->foreignId('invoices_status_id')->constrained('invoices_status')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_invoices_details');
    }
};
