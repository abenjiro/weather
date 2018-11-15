<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $json = File::get("database/data/city.list.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
        	City::create(array(
        		'code' => $obj->code,
        		'name' => $obj->name,
        		'country' => $obj->country,
                'lon' => $obj->coord->lon,
                'lat' => $obj->coord->lat,
        	));
        }
    }
}
