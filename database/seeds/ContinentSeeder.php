<?php

use Illuminate\Database\Seeder;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Continent::insert([
        	[
        	'id' => '1',
            'cont_name' => 'Asia',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s'),
         ],
        
[
        	'id' => '2',
            'cont_name' => 'Europe',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
        	'id' => '3',
            'cont_name' => 'North America',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s'),
         ],
         [
        	'id' => '4',
            'cont_name' => 'Midlle East & Africa',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s'),
         ]
        ]);
    }
}
