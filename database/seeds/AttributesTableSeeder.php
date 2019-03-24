<?php 
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder {
	
	public function run() 
	{
		DB::table('attributes')->delete();
		$attributes = array(
			array('id' => 1,'name' => 'المساحة' ,'description' => "مساحة الإستراحة بالمتر"),
			array('id' => 2,'name' => 'مكان العوائل' ,'description' => "هل يوجد بها مكان عوائل"),
			array('id' => 3,'name' => 'ملعب ' ,'description' => "هل يوجد بها ملبع"),
			array('id' => 4,'name' => 'مسبح' ,'description' => "هل يوجد بها مسبح"),
		);
		DB::table('attributes')->insert($attributes);
	}
}