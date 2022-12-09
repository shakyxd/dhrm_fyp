<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class accountseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $acc = [
        [
            'accountID' => 1,
            'username' => 'admin',
            'password' => Str::random(10),
            'profileID' => 1,
            'deactivated' => 0,
        ],
        [
            'accountID' => 2,
            'username' => 'dentist1',
            'password' => Str::random(10),
            'profileID' => 2,
            'deactivated' => 0,
        ],
        [
            'accountID' => 3,
            'username' => 'dentist2',
            'password' => Str::random(10),
            'profileID' => 2,
            'deactivated' => 0,
        ],
        [
            'accountID' => 4,
            'username' => 'dentist3',
            'password' => Str::random(10),
            'profileID' => 2,
            'deactivated' => 0,
        ],
        [
            'accountID' => 5,
            'username' => 'patient1',
            'password' => Str::random(10),
            'profileID' => 3,
            'deactivated' => 0,
        ],
        [
            'accountID' => 6,
            'username' => 'patient2',
            'password' => Str::random(10),
            'profileID' => 3,
            'deactivated' => 0,
        ],
        [
            'accountID' => 7,
            'username' => 'patient3',
            'password' => Str::random(10),
            'profileID' => 3,
            'deactivated' => 0,
        ]
        ];
        DB::table('users')->insert($acc);
    }
}
