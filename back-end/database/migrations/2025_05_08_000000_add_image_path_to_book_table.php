<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('book', 'image_path')) {
            Schema::table('book', function (Blueprint $table) {
                $table->string('image_path')->nullable()->after('cover_image');
            });
        }

        // Create the images directory if it doesn't exist
        if (!file_exists(public_path('images'))) {
            mkdir(public_path('images'), 0755, true);
        }
    }

    public function down(): void
    {
        Schema::table('book', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
};