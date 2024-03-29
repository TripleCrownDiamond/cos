<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("user_role")->insert(
            [
                [
                    "user_id" => 1,
                    "role_id" => 1
                ]
            ]
        );
    }
}
