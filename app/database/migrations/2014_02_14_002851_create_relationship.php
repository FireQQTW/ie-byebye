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
			$table->dropForeign('houses_landlord_id_foreign');
		});
		// drop foreign rooms
		Schema::table('rooms', function(Blueprint $table){
			$table->dropForeign('rooms_house_id_foreign');
		});

		// drop foreign pmus
		Schema::table('pmus', function(Blueprint $table){
			$table->dropForeign('pmus_room_id_foreign');
		});
	}

}
