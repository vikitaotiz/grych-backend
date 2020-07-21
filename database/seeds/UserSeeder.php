<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
	        'name' => 'Grych Admin',
	        'id_number' => 969798,
	        'phone' => '+254712345678',
	        'email' => 'grychadmin@email.com',
	        'role_id' => 1,
            'department_id' => 1,
	        'email_verified_at' => now(),
	        'password' => bcrypt('grychAdmin#29'),
	        'remember_token' => Str::random(10),
	        'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Staff User',
            'id_number' => 919293,
	        'phone' => '+254712345678',
            'email' => 'staff@email.com',
            'role_id' => 2,
            'department_id' => 2,
            'email_verified_at' => now(),
            'password' => bcrypt('grychStaff#19'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Client User1',
            'id_number' => 919594,
	        'phone' => '+254712345678',
            'email' => 'client1@email.com',
            'role_id' => 3,
            'department_id' => 3,
            'email_verified_at' => now(),
            'password' => bcrypt('grychClient#19'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Client User2',
            'id_number' => 929593,
	        'phone' => '+254712345678',
            'email' => 'client2@email.com',
            'role_id' => 3,
            'department_id' => 3,
            'email_verified_at' => now(),
            'password' => bcrypt('grychClient#19'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Client User3',
            'id_number' => 939592,
	        'phone' => '+254712345678',
            'email' => 'client3@email.com',
            'role_id' => 3,
            'department_id' => 3,
            'email_verified_at' => now(),
            'password' => bcrypt('grychClient#19'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Client User4',
            'id_number' => 949591,
	        'phone' => '+254712345678',
            'email' => 'client4@email.com',
            'role_id' => 3,
            'department_id' => 3,
            'email_verified_at' => now(),
            'password' => bcrypt('grychClient#19'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
