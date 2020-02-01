<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("users")->insert([
            "full_name"=>'مدیرکل',
            "username"=>'admin',
            "password"=>Hash::make('123'),
            "type"=>'Manager',
            "access_project"=>'Manager',
            "active"=>'enabled'
        ]);
    }
}
