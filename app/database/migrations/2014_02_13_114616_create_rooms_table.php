<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('sn', 32)->uniqid();
			$table->integer('house_id')->unsigned()->index();
			$table->string('username', 50)->nullable()->index();
			$table->string('password', 32)->nullable()->index();
			$table->string('name', 255);
			$table->decimal('billed', 10, 0);
			$table->string('BilledTypeJsonData', 255)->nullable();
			$table->boolean('isEnabled')->defaut(1);
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
		Schema::drop('rooms');
	}

}
