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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('image')->nullable()->after('name'); // Thêm cột image sau cột name, có thể null
            $table->text('description')->nullable()->after('image'); // Thêm cột description sau cột image, có thể null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['image', 'description']);
        });
    }
};
