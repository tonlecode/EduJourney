<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('buddha', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->uuid('id_code')->unique(); // Using UUID for id_code
            $table->string('youtube_link');
            $table->string('name');
            $table->date('date');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buddha');
    }
};
