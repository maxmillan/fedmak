<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finalreports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lease_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('property_id')->nullable();
            $table->integer('bill_id')->nullable();
            $table->integer('amount');
            $table->string('transaction_type');
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
        Schema::dropIfExists('finalreports');
    }
}
