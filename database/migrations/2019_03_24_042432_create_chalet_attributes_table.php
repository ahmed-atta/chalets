<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChaletAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chalet_attributes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('attribute_id')->index('fk_chalet_attributes_attributes1_idx');
			$table->integer('chalet_id')->index('fk_chalet_attributes_chalets1_idx');
			$table->text('value');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chalet_attributes');
	}

}
