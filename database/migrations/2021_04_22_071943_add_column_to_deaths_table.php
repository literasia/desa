<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDeathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deaths', function (Blueprint $table) {
            //
            $table->bigInteger('no_kk')->after('village_id');
            $table->string('birthplace')->after('name');
            $table->date('birthdate')->after('deathdate');
            $table->string('gender');
            $table->string('religion');
            $table->string('status_marriage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deaths', function (Blueprint $table) {
            //
        });
    }
}
