<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFilePathFromBookTable extends Migration
{
    public function up(): void
    {
        Schema::table('book', function (Blueprint $table) {
            $table->dropColumn('file_path');
        });
    }

    public function down(): void
    {
        Schema::table('book', function (Blueprint $table) {
            $table->string('file_path')->nullable(); // ចូលតាមលក្ខណៈ fallback
        });
    }
}
