<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert(
            [
                [
                    "first_name" => "Jonathan",
                    "last_name" => "Ahouangan",
                    "telephone" => "66345634",
                    "whatsapp" => "66345634",
                    "email" => "chezlaffairiste@gmail.com",
                    "balance" => 0,
                    "earnings" => 0,
                    "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    "is_active" => 1,
                    "is_root" => 0,
                    "agency_id" => 1,
                ]
            ]
        );
    }
}
