<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublishersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishers')->insert(
            [
                [
                    'title' => 'First publisher',
                ],
                [
                    'title' => 'Second publisher',
                ],
                [
                    'title' => 'Third publisher'
                ]
            ]
        );
    }
}
