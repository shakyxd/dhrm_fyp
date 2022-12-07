<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeders = array ('accountseeder','materialseeder','patientseeder','profileseeder','serviceplanseeder','staffseeder','treatmentseeder');

        foreach ($seeders as $seeder)
        { 
           $this->call($seeder);
        }
    }
}
