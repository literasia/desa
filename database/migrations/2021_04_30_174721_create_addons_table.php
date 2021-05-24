<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('village_id');
            $table->bigInteger('admin_id');
            $table->boolean('dashboard')->default('0');
            $table->boolean('population_data')->default('0');
            $table->boolean('village_structure')->default('0');
            $table->boolean('village_profile')->default('0');
            $table->boolean('administration')->default('0');
            $table->boolean('village_potency')->default('0');
            $table->boolean('attendance')->default('0');
            $table->boolean('calendar')->default('0');
            $table->boolean('template')->default('0');
            $table->boolean('log_user')->default('0');
            $table->boolean('library')->default('0');
            $table->boolean('guest_book')->default('0');
            $table->boolean('finance')->default('0');
            $table->boolean('news')->default('0');
            $table->boolean('slider')->default('0');
            $table->boolean('event')->default('0');
            $table->boolean('village_tour')->default('0');
            $table->boolean('announcement')->default('0');
            $table->boolean('campaign')->default('0');
            $table->boolean('reference')->default('0');
            $table->boolean('complaint')->default('0');
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
        Schema::dropIfExists('addons');
    }
}
