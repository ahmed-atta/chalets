<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChaletsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chalets', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable();
			$table->text('description')->nullable();
			$table->text('address')->nullable();
			$table->string('latitude', 45)->nullable();
			$table->string('longitude', 45)->nullable();
			$table->integer('district_id')->index('fk_chalets_districts1_idx');
			$table->integer('owner_id')->index('fk_chalets_users1_idx');
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
		Schema::drop('chalets');
	}

}
