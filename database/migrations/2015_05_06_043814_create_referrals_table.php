<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('referrals', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('sponsor_id');
            $table->integer('referral_id');
            $table->integer('location');
            $table->timestamps();

            $table->foreign('sponsor_id')
            	  ->references('id')
            	  ->on('users')
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
		Schema::drop('referrals');
	}

}
