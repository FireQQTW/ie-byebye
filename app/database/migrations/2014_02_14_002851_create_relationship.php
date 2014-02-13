<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelationship extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// references landlord and houses, One to Many
		Schema::table('houses', function(Blueprint $table){
			$table->foreign('landlord_id')->references('id')->on('landlords')->onDelete('cascade');
		});
		
		// references houses and rooms, One to Many
		Schema::table('rooms', function(Blueprint $table){
			$table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');
		});

		// references rooms and pmus, One to Many
		Schema::table('pmus', function(Blueprint $table){
			$table->foreign('room_id')->references('id')->on('pmus')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// drop foreign houses
		Schema::table('houses', function(Blueprint $table){
			$table->drop_foreign('houses_landlords_id_foreign');
		});
		// drop foreign rooms
		Schema::table('rooms', function(Blueprint $table){
			$table->drop_foreign('rooms_houses_id_foreign');
		});

		// drop foreign pmus
		Schema::table('pmus', function(Blueprint $table){
			$table->drop_foreign('pmus_rooms_id_foreign');
		});
	}

}
