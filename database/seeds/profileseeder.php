<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class profileseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pro = [
        [
            'profileID' => 1,
            'profileName' => 'Administrator',
            'deactivated' => 0,
        ],
        [
            'profileID' => 2,
            'profileName' => 'Dentist',
            'deactivated' => 0,
        ],
        [
            'profileID' => 3,
            'profileName' => 'Patient',
            'deactivated' => 0,
        ]
        ];
        DB::table('profiles')->insert($pro);
    }
}
