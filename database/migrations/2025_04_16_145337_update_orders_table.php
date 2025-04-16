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
        Schema::table('orders', function (Blueprint $table) {
            Schema::table('orders', function (Blueprint $table) {
                // Xóa các cột không cần thiết
                $table->dropForeign(['product_id']);
                $table->dropColumn(['qty', 'product_name', 'product_id']);
                
                // Thêm các cột mới
                $table->string('customer_email')->after('customer_phone')->nullable();
                $table->decimal('total')->after('customer_email')->nullable();
                $table->text('note')->after('total')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Khôi phục các cột đã xóa (nếu cần rollback)
            $table->integer('qty');
            $table->string('product_name');
            $table->unsignedBigInteger('product_id');
            
            // Xóa các cột mới thêm
            $table->dropColumn(['customer_email', 'note']);
        });
    }
};
