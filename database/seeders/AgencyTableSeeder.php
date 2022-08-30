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
                    "agency_name" => "L'AFFAIRISTE STORE",
                    "uniq_id" => uniqid(),
                ],
                [
                    "agency_name" => "SOLUTIONS LUCIOLE",
                    "uniq_id" => uniqid(),
                ],
                [
                    "agency_name" => "SMART TRADE CORP",
                    "uniq_id" => uniqid(),
                ],
                [
                    "agency_name" => "SIDI ET FILS",
                    "uniq_id" => uniqid(),
                ],
                [
                    "agency_name" => "CASTRO NEGOCE INTER",
                    "uniq_id" => uniqid(),
                ]
                
            ]
        );
    }
}
