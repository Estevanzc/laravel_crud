<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table("categories")->insert([
            [
                "name" => "teste",
            ],
            [
                "name" => "teste1",
            ],
            [
                "name" => "teste2",
            ],
            [
                "name" => "teste3",
            ],
            [
                "name" => "teste4",
            ],
            [
                "name" => "teste5",
            ],
            [
                "name" => "teste6",
            ],
        ]);
    }
}
