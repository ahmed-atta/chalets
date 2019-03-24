<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prices', function(Blueprint $table)
		{
			$table->foreign('chalet_id', 'fk_prices_chalets1')->references('id')->on('chalets')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prices', function(Blueprint $table)
		{
			$table->dropForeign('fk_prices_chalets1');
		});
	}

}
