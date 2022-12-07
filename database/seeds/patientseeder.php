<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class patientseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pat = [
        [
            'patientID' => 1,
            'firstName' => 'Long',
            'lastName' => 'Dong',
            'accountID' => 5,
            'planID' => 1,
            'treatmentID' => 1,
        ],
        [
            'patientID' => 2,
            'firstName' => 'Yilong',
            'lastName' => 'Mask',
            'accountID' => 6,
            'planID' => 2,
            'treatmentID' => 2,
        ],
        [
            'patientID' => 3,
            'firstName' => 'Snoop',
            'lastName' => 'Dogg',
            'accountID' => 7,
            'planID' => 3,
            'treatmentID' => 3,
        ]
        
        ];
        DB::table('patients')->insert($pat);
    }
}
