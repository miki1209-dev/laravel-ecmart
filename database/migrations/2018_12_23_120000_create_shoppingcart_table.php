<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingcartTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create(config('cart.database.table'), function (Blueprint $table) {
			$table->string('identifier');
			$table->string('instance');
			$table->longText('content');
			$table->integer('number')->nullable();
			$table->nullableTimestamps();

			$table->primary(['identifier', 'instance']);
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::drop(config('cart.database.table'));
	}
}
