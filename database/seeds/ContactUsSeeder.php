<?php

use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Contact::create([
            'location_description' => 'Zouk Mosbeh Main Street , Saliba building, 1st Floor',
            'mobile' => '+961 09 220 400',
            'email'=>'info@straightline.com.lb',
            'map_loc'=>'34345345,4353533'

        ]);
    }
}
