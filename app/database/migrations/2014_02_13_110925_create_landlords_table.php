<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandlordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('landlords', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key', 32)->unique();
			$table->string('username', 50);
			$table->string('password', 32);
			$table->string('name', 10);
			$table->integer('zipcode');
			$table->string('country', 10);
			$table->string('district', 10);
			$table->string('address', 255);
			$table->boolean('isEnabled')->default(1);
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
		Schema::drop('landlords');
	}

}