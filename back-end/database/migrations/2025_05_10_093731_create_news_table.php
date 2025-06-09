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
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // id
            $table->string('id_code')->unique(); // id_code
            $table->string('title'); // title
            $table->string('author')->nullable(); // author
            $table->text('description')->nullable(); // description
            $table->string('cover_image')->nullable(); // cover_image (e.g. URL or path)
            $table->string('image_path')->nullable(); // additional image path
            $table->integer('page_count')->nullable(); // page count
            $table->string('language', 20)->nullable(); // language
            $table->string('file_path')->nullable(); // file_path (e.g. PDF, DOCX)
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
