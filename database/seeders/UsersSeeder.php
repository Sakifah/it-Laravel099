<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        [
            'name' => 'Sakifah Tippayanon',
            'email' => 'Sakifa001@hotmail.com',
            'password' => Hash::make('123456'),
            'role' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Maki Milk',
            'email' => 'Maki1@hotmail.com',
            'password' => Hash::make('123456'),
            'role' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]
        ];
        DB::table('users')->insert($data);
    }
}
