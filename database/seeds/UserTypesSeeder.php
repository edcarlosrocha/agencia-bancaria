<?php

use Illuminate\Database\Seeder;
use App\UserType;

class UserTypesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserType::updateOrCreate([
        	'id' => 1
        ], [
        	'id' => 1, 
        	'name' => 'Comum'
    	]);

        UserType::updateOrCreate([
        	'id' => 2
        ], [
        	'id' => 2, 
        	'name' => 'Lojista'
    	]);
    }
}
