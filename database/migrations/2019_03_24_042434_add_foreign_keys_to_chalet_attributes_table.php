<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChaletAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('chalet_attributes', function(Blueprint $table)
		{
			$table->foreign('attribute_id', 'fk_chalet_attributes_attributes1')->references('id')->on('attributes')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('chalet_id', 'fk_chalet_attributes_chalets1')->references('id')->on('chalets')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('chalet_attributes', function(Blueprint $table)
		{
			$table->dropForeign('fk_chalet_attributes_attributes1');
			$table->dropForeign('fk_chalet_attributes_chalets1');
		});
	}

}
