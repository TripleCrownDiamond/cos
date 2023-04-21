<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("agencies")->insert(
            [
                [
                    "agency_name" => "L'affairiste Store",
                    "agency_email" => "chezlaffairiste@gmail.com",
                    "agency_telephone" => "66345634",
                    "uniq_id" => "cos" . uniqid(),
                    "validated" => 0,
                ]
            ]
        );
    }
}
