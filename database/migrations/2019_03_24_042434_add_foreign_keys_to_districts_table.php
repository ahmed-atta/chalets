<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDistrictsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('districts', function(Blueprint $table)
		{
			$table->foreign('city_id', 'fk_districts_cities1')->references('id')->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('country_id', 'fk_districts_countries1')->references('id')->on('countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('districts', function(Blueprint $table)
		{
			$table->dropForeign('fk_districts_cities1');
			$table->dropForeign('fk_districts_countries1');
		});
	}

}
