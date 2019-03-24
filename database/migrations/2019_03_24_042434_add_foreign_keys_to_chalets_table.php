<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChaletsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('chalets', function(Blueprint $table)
		{
			$table->foreign('district_id', 'fk_chalets_districts1')->references('id')->on('districts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('owner_id', 'fk_chalets_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('chalets', function(Blueprint $table)
		{
			$table->dropForeign('fk_chalets_districts1');
			$table->dropForeign('fk_chalets_users1');
		});
	}

}
