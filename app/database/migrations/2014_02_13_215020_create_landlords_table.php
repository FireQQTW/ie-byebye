<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLandlordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('landlords', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('sn', 32)->unique();
            $table->string('username', 50)->index();
            $table->string('password', 60)->index();
            $table->string('name', 10);
            $table->integer('zipcode');
            $table->string('county', 10);
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