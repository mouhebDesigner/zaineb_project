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
            ],
            [
                "nom" => "jury",
                "prenom" => "jury",
                "email" => "jury@gmail.com",
                "numtel" => "12345478",
                "genre" => "female",
                "role" => "jury",
                "password" => Hash::make("adminadmin"),
            ],
            [
                "nom" => "etudiant",
                "prenom" => "etudiant",
                "email" => "etudiant@gmail.com",
                "numtel" => "44555666",
                "genre" => "female",
                "role" => "etudiant",
                "password" => Hash::make("adminadmin"),
            ],
            [
                "nom" => "student one",
                "prenom" => "one",
                "email" => "one@gmail.com",
                "numtel" => "44523466",
                "genre" => "female",
                "role" => "etudiant",
                "password" => Hash::make("adminadmin"),
            ],
            [
                "nom" => "student two",
                "prenom" => "two",
                "email" => "two@gmail.com",
                "numtel" => "34444555",
                "genre" => "female",
                "role" => "etudiant",
                "password" => Hash::make("adminadmin"),
            ]
        ]);
        DB::table('concours')->insert([
            [
                "titre" => "Concour compétition",
                "description" => "Site concour de compétition des projets s'adresse aux étudiants sous la direction de professeurs
                    pour leurs permettre et discuter de leurs projets",
            ]
        ]);
        DB::table('resources')->insert([
            [
                "path" => "front/concour.png",
                "type" => "image",
                "concour_id" => "1"
            ]
        ]);
    }
}
