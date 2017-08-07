<?php

use Illuminate\Database\Seeder;

class AccountTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_types')->insert([
        	'name' => 'client'
        	]);

        DB::table('account_types')->insert([
        	'name' => 'artisan'
        	]);
    }
}
