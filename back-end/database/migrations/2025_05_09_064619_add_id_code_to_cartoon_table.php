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
        Schema::table('cartoon', function (Blueprint $table) {
            $table->uuid('id_code')->unique()->after('id');
        });
    }

    public function down()
    {
        Schema::table('cartoon', function (Blueprint $table) {
            $table->dropColumn('id_code');
        });
    }

};
