<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('period_from')->nullable();
			$table->dateTime('period_to')->nullable();
			$table->integer('status')->nullable();
			$table->boolean('confirmed')->nullable()->default(0);
			$table->float('total_price', 10, 0)->nullable();
			$table->integer('chalet_id')->index('fk_orders_chalets1_idx');
			$table->integer('user_id')->index('fk_orders_users1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
