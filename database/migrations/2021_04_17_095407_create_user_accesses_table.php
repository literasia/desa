<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_accesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('village_id');
            $table->boolean('administration')->default('1');
            $table->boolean('forum')->default('1');
            $table->boolean('structure')->default('1');
            $table->boolean('complaint')->default('1');
            $table->boolean('potention')->default('1');
            $table->boolean('campaign')->default('1');
            $table->boolean('news')->default('1');
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
        Schema::dropIfExists('user_accesses');
    }
}
