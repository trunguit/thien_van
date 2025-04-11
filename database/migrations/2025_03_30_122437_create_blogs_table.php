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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Tạo trường id tự động tăng (primary key)
            $table->string('title'); // Tiêu đề blog
            $table->string('image')->nullable(); // Ảnh (có thể null)
            $table->text('content'); // Nội dung bài viết
            $table->text('description')->nullable(); // Mô tả ngắn (có thể null)
            $table->boolean('is_home')->default(false); // Hiển thị ở trang chủ hay không (mặc định false)
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
