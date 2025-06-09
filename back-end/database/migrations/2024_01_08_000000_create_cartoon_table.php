<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartoonTable extends Migration
{
    public function up()
    {
        Schema::create('cartoon', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_code')->unique();
            $table->string('youtube_link');
            $table->string('name');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cartoon');
    }
}