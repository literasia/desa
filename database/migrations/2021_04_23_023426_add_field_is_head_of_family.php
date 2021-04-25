<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldIsHeadOfFamily extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citizens', function (Blueprint $table) {
            $table->dropColumn('head_of_family_status');
            $table->integer('is_head_of_family')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citizens', function (Blueprint $table) {
            $table->dropColumn('is_head_of_family');
        });
    }
}
