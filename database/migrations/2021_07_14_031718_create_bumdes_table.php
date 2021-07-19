<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBumdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bumdes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('village_id');
            $table->string('bumdes_name');
            $table->text('description')->nullable();
            $table->bigInteger('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('status')->nullable();
            $table->string('bumbdes_email')->nullable();
            $table->string('since_year');
            $table->bigInteger('adrt')->nullable();
            $table->bigInteger('earnings_last_year');
            $table->string('registration_code')->nullable();
            $table->bigInteger('no_whatsapp');
            $table->text('bumdes_address');
            $table->integer('number_of_employee');
            $table->text('financial_report');
            $table->bigInteger('profits_last_year');
            $table->text('bumdes_image');
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
        Schema::dropIfExists('bumdes');
    }
}
