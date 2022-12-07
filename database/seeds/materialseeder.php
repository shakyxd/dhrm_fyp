<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class materialseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mat = [
        [
            'itemID' => 1,
            'itemName' => 'artificialcrown',
            'itemQty' => 1000,
        ],
        [
            'itemID' => 2,
            'itemName' => 'braces',
            'itemQty' => 1000,
        ],
        [
            'itemID' => 3,
            'itemName' => 'syringe',
            'itemQty' => 1000,
        ]
        ];
        DB::table('materials')->insert($mat);
    }
}
