<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sender_id')->unsigned();
			$table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('dest_id')->unsigned();
			$table->foreign('dest_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->text('body');
			$table->integer('status');
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
		Schema::drop('messages');
	}

}
