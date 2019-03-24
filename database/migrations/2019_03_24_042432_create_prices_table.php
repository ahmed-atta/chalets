<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prices', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('period_from')->nullable();
			$table->dateTime('period_to')->nullable();
			$table->float('day_price', 10, 0)->nullable();
			$table->integer('chalet_id')->index('fk_prices_chalets1_idx');
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
		Schema::drop('prices');
	}

}
