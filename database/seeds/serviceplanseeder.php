<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class serviceplanseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serv = [
        [
            'planID' => 1,
            'planName' => 'plan1',
        ],
        [
            'planID' => 2,
            'planName' => 'plan2',
        ],
        [
            'planID' => 3,
            'planName' => 'plan3',
        ]
        ];
        DB::table('service plans')->insert($serv);
    }
}
