<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('cartoon', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn(['title', 'photo', 'description', 'uploader', 'action']);

            // Add new columns
            $table->uuid('id_code')->after('id')->unique();
            $table->string('youtube_link')->nullable()->after('id_code');
            $table->string('name')->after('youtube_link');
        });
    }

    public function down(): void
    {
        Schema::table('cartoon', function (Blueprint $table) {
            // Re-add old columns if you ever rollback
            $table->string('title')->nullable();
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->string('uploader')->nullable();
            $table->string('action')->nullable();

            // Remove new columns
            $table->dropColumn(['id_code', 'youtube_link', 'name']);
        });
    }
};
