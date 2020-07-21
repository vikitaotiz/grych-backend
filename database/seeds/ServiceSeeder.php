<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Garbage Collection',
            'description' => 'Service One',
            'payment_frequency' => 'Monthly',
            'amount' => 300,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('services')->insert([
            'name' => 'Fumigation',
            'description' => 'Service Two',
            'payment_frequency' => 'Week',
            'amount' => 250,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('services')->insert([
            'name' => 'Service 1',
            'description' => 'Service 1',
            'payment_frequency' => 'Daily',
            'amount' => 300,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('services')->insert([
            'name' => 'Service 2',
            'description' => 'Service 2',
            'payment_frequency' => 'After Work',
            'amount' => 250,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
