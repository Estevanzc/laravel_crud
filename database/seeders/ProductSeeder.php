<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table("products")->insert([
            [
                "name" => "Mcqueen",
                "price" => "5000",
                "description" => "kachow",
                "photo" => "",
                "categorie_id" => 1,
            ],
            [
                "name" => "MilkBox",
                "price" => "100000",
                "description" => "não contem a vaca vavá",
                "photo" => "",
                "categorie_id" => 2,
            ],
        ]);
    }
}
