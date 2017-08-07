<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('account_types')->truncate();
        // $this->call(UsersTableSeeder::class);
        $this->call(AccountTypeTableSeeder::class);
    }
}
