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
			$table->string('key', 32);
			$table->integer('house_id');
			$table->string('username', 50);
			$table->string('password', 32);
			$table->string('name', 255);
			$table->decimal('billed', 10, 0);
			$table->string('BilledTypeJsonData', 255);
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
