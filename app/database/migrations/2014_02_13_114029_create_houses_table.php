<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHousesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('houses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('key', 32);
			$table->integer('landlord_id');
			$table->integer('zipcode');
			$table->string('county', 10);
			$table->string('district', 10);
			$table->string('address', 255);
			$table->softDeletes();
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
		Schema::drop('houses');
	}

}
