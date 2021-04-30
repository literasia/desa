<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('potency_id')->unsigned();
            $table->string('product_name');
            $table->text('product_description')->nullable();
            $table->text('product_image');
            $table->text('product_price')->nullable();
            $table->timestamps();

            $table->foreign('potency_id')->references('id')->on('potencies')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogs');
    }
}
