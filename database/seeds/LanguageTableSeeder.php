<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('languages')->insert([
    			'uuid' => 'en-GB',
    			'iso_name' => 'en',
    			'name' => 'English',
    	]);
    	
    	DB::table('languages')->insert([
    			'uuid' => 'pt-BR',
    			'iso_name' => 'pt',
    			'name' => 'Brazilian Portuguese',
    	]);
    }
}
