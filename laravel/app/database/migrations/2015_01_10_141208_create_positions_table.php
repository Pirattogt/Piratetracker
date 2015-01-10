<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('positions', function(Blueprint $table) {
			$table->increments('id');
			$table->float('latitude', 10, 7);
			$table->float('longitude', 10, 7);
			$table->integer('user');
			$table->timestamp('timestamp');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('positions');
	}

}
