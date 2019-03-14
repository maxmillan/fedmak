<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaidtenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paidtenants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('lease_id')->unsigned();
            $table->foreign('lease_id')->references('id')->on('leases');

            $table->integer('payment_id')->nullable();

            $table->string('property_id')->nullable();




            $table->string('transaction_type');
            $table->string('balance')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('bill')->nullable();
            $table->integer('amount');

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
        Schema::dropIfExists('paidtenants');
    }
}
