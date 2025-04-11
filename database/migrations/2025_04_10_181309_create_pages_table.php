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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tiêu đề trang
            $table->string('alias')->unique(); // Đường dẫn alias (vd: "ve-chung-toi")
            $table->text('content')->nullable(); // Nội dung HTML của trang
            $table->string('meta_title')->nullable(); // Meta title cho SEO
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
