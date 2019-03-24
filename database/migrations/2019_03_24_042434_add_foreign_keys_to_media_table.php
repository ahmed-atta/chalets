<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('media', function(Blueprint $table)
		{
			$table->foreign('chalet_id', 'fk_media_chalets1')->references('id')->on('chalets')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('media', function(Blueprint $table)
		{
			$table->dropForeign('fk_media_chalets1');
		});
	}

}
