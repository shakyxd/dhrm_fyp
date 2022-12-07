<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class treatmentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tre = [
        [
            'treatmentID' => 1,
            'treatmentName' => 'treatment1',
            'lastVisited' => '2021-01-12 23:13:28',
        ],
        [
            'treatmentID' => 2,
            'treatmentName' => 'treatment2',
            'lastVisited' => '2021-01-14 23:12:28',
        ],
        [
            'treatmentID' => 3,
            'treatmentName' => 'treatment3',
            'lastVisited' => '2021-01-17 23:16:28',
        ]
        ];
        DB::table('treatments')->insert($tre);
    }
}
