<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table("notes")->insert([
            [
                "title" => "teste",
                "texto" => "teste",
            ],
            [
                "title" => "teste1",
                "texto" => "teste1",
            ],
            [
                "title" => "teste2",
                "texto" => "teste2",
            ],
            [
                "title" => "teste3",
                "texto" => "teste3",
            ],
        ]);
    }
}
