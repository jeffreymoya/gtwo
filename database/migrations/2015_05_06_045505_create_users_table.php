<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->unique();
            $table->integer('role_id')->unsigned();
            $table->string('iexp4u_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('address_id')->unsigned();
            $table->string('phone');
            $table->string('password');
            $table->string('uploaded_id');
            $table->string('remember_token');
            $table->timestamps();

            $table->foreign('address_id')
            	  ->references('id')
            	  ->on('addresses')
            	  ->onDelete('cascade');
            $table->foreign('role_id')
            	  ->references('id')
            	  ->on('roles')
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
		Schema::drop('users');
	}

}
