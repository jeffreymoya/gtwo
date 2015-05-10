<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->integer('address_id')->unsigned();
            $table->integer('quantity');
            $table->float('amount');
            $table->float('discount')->nullable();
            $table->float('commission')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('user_id')
            	  ->references('id')
            	  ->on('users')
            	  ->onDelete('cascade');	
            $table->foreign('product_id')
            	  ->references('id')
            	  ->on('products')
            	  ->onDelete('cascade');
            $table->foreign('payment_id')
            	  ->references('id')
            	  ->on('payments')
            	  ->onDelete('cascade');
            $table->foreign('address_id')
            	  ->references('id')
            	  ->on('addresses')
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
		Schema::drop('orders');
	}
}
