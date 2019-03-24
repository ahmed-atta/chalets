<?php 
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder {
	
	public function run() 
	{
		DB::table('countries')->delete();
		$countries = array(
			array('id' => 1,'code' => 'SA' ,'name' => "المملكة العربية السعودية")
		);
		DB::table('countries')->insert($countries);
		//============================================== 
		DB::table('cities')->delete();
		$cities = array(
			array('id' => 1,'name' => "الرياض " ,'country_id'=> 1),
			array('id' => 2,'name' => "مكة المكرمة  " ,'country_id'=> 1),
		);
		DB::table('cities')->insert($cities);
		//============================================== 
		DB::table('districts')->delete();
		$districts = array(
			array('id' => 1,'name' => "الرياض " ,'country_id'=> 1, 'city_id'=>2),
			array('id' => 2,'name' => "مكة المكرمة  " ,'country_id'=> 1,'city_id'=>2),
		);
		DB::table('districts')->insert($districts);
	}
}