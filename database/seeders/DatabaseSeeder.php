<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "nom" => "touil",
                "prenom" => "zaineb",
                "email" => "zaineb@gmail.com",
                "numtel" => "12345678",
                "genre" => "female",
                "role" => "admin",
                "password" => Hash::make("adminadmin"),
            ]
        ]);
    }
}
