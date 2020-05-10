<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('document_type')->unsigned();
            $table->foreign('document_type')->references('id')->on('documents');
            $table->string('document_number');
            $table->string('customer_firstname');
            $table->string('customer_lastname');
            $table->string('customer_address');
            $table->bigInteger('customer_city')->unsigned();
            $table->foreign('customer_city')->references('id')->on('cities');
            $table->string('customer_email');
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
        Schema::dropIfExists('orders');
    }
}
