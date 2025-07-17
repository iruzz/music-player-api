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
    Schema::table('songs', function (Blueprint $table) {
        $table->enum('category', ['new', 'indo', 'luar'])->default('new');
    });
}

public function down()
{
    Schema::table('songs', function (Blueprint $table) {
        $table->dropColumn('category');
    });
}

};
