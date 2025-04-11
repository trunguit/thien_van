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
        Schema::create('customer_reviews', function (Blueprint $table) {
            $table->string('name', 100)->comment('Tên khách hàng');
            $table->string('job', 100)->comment('công việc khách hàng');
            $table->string('avatar')->nullable()->comment('Ảnh đại diện khách hàng');
            $table->text('comment')->comment('Nội dung nhận xét');
            $table->enum('status', ['active', 'inactive'])->default('active')->comment('Trạng thái hiển thị');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_reviews');
    }
};
