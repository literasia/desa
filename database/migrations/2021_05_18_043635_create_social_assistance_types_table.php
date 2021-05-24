<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialAssistanceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_assistance_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('village_id');
            $table->string('name');
            $table->integer('identity_number_status')->default(0);
            $table->integer('number_of_stages');
            $table->float('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_assistance_types');
    }
}
