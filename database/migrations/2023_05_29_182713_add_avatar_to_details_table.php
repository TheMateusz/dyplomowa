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
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('max_age');
            $table->boolean('gender')->nullable()->after('avatar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('gender');
        });
    }
};
