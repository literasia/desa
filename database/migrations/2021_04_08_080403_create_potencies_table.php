<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('village_id');
            $table->bigInteger('user_id');
            $table->string('business_name');
            $table->string('business_category');
            $table->string('business_type');
            $table->string('business_owner');
            $table->text('business_address');
            $table->bigInteger('no_phone');
            $table->bigInteger('no_whatsapp');
            $table->text('image_ktp');
            $table->enum('status', ['active', 'inactive']);
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
        Schema::dropIfExists('potencies');
    }
}
