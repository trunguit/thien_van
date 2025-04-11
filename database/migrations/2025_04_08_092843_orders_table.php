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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('product_id'); // Khóa ngoại đến bảng products
            $table->string('product_name', 255); // Tên sản phẩm
            $table->integer('qty'); // Số lượng
            $table->string('customer_name', 100); // Tên khách hàng
            $table->string('customer_phone', 20); // Số điện thoại
            $table->text('customer_address'); // Địa chỉ (dùng text vì có thể dài)            
            $table->timestamps();            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
