<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePmusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pmus', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('sn', 32)->uniqid();
			$table->integer('room_id')->unsigned()->index();
			$table->string('name', 50);
			$table->string('ip', 16);
			$table->integer('use_w')->default(0);
			$table->integer('last_w')->default(0);
			$table->float('mu_v')->default(0);
			$table->float('mu_a')->default(0);
			$table->integer('use_minute')->default(0);
			$table->integer('last_minute')->default(0);
			$table->boolean('isEnabled')->default(1);
			$table->datetime('mu_dt')->nullable();
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
		Schema::drop('pmus');
	}

}
