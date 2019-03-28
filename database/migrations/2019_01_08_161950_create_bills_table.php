<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');

            $table->integer('propertyunit_id')->unsigned();
            $table->foreign('propertyunit_id')->references('id')->on('propertyunits');

            $table->integer('servicebill_id')->unsigned();
            $table->foreign('servicebill_id')->references('id')->on('servicebills');
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
        Schema::dropIfExists('bills');
    }
}
