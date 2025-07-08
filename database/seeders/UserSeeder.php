<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table("users")->insert([
            [
                "name" => "Churchill",
                "email" => "churchill_w@gmail.com",
                "email_verified_at" => Carbon::now(),
                "password" => Hash::make("churchill"),
            ],
        ]);
        User::factory(10)->create();
    }
}
