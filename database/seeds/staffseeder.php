<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class staffseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sta = [
        [
            'staffID' => 1,
            'firstName' => 'The',
            'lastName' => 'Wok',
            'retired' => 0,
            'accountID' => 1,
        ],
        [
            'staffID' => 2,
            'firstName' => 'Goofy',
            'lastName' => 'Ahh',
            'retired' => 0,
            'accountID' => 2,
        ],
        [
            'staffID' => 3,
            'firstName' => 'Elonge',
            'lastName' => 'Moss',
            'retired' => 0,
            'accountID' => 3,
        ],
        [
            'staffID' => 4,
            'firstName' => 'Jason',
            'lastName' => 'Tan',
            'retired' => 0,
            'accountID' => 4,
        ]
        ];
        DB::table('staffs')->insert($sta);
    }
}
