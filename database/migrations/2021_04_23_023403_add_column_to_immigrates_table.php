<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToImmigratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('immigrates', function (Blueprint $table) {
            //
            $table->string('birthplace')->after('name');
            $table->date('birthdate')->after('address');
            $table->date('movedate');
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
        Schema::table('immigrates', function (Blueprint $table) {
            //
        });
    }
}
