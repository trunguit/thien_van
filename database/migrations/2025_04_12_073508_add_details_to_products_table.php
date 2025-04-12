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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('min_qty')->default(1);
            $table->integer('max_qty')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->string('sku')->nullable()->unique();
            $table->string('upc')->nullable()->unique();
            $table->string('condition')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'min_qty', 'max_qty', 'price', 'sale_price', 'sku', 'upc', 'condition'
            ]);
        });
    }
};
