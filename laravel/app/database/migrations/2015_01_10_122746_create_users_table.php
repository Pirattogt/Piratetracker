<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create(
				'users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 32);
			$table->string('username', 32);
			$table->string('email', 320);
			$table->string('password', 64);
			// required for Laravel 4.1.26
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
		}
		);
		Schema::create(
				'roles', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
		}
		);
		Schema::create(
				'users_roles', function (Blueprint $table) {
			$table->integer('user_id');
			$table->integer('role_id');
		}
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users_roles');
		Schema::drop('roles');
		Schema::drop('users');
	}

}
