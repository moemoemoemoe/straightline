<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Profile::create([
            'description' => 'profile description',
            'mission' => 'profile mission',
            'vision'=>'profile vision',
            'goals'=>'profile goals',
            'values'=>'profile values'

        ]);
    }
}
