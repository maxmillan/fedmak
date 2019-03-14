<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenantaccounts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('lease_id')->unsigned();
            $table->foreign('lease_id')->references('id')->on('leases');

            $table->string('payment_id')->nullable();
            $table->string('property_id')->nullable();
            $table->string('bill_id')->nullable();

//            $table->integer('payment_id')->unsigned();
//            $table->foreign('payment_id')->references('id')->on('payments')->nullable();
//
//            $table->integer('bill_id')->unsigned();
//            $table->foreign('bill_id')->references('id')->on('bills')->nullable();


            $table->string('transaction_type');
            $table->string('balance')->nullable();

            $table->integer('amount')->nullable();
            $table->string('house')->nullable();



            $table->boolean('status')->nullable(                    );
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
        Schema::dropIfExists('tenantaccounts');
    }
}
