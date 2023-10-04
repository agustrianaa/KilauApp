<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AdminPusat;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => 'rita@gmail.com',
            'password' => bcrypt('rita1234'),
            'role' => 'admin',
        ]);
        if($user) {
            Admin::create([
                'name' => 'Rita M',
                'user_id' => $user -> id
            ]);
        }

        $user = User::create([
            'email' => 'imam@gmail.com',
            'password' => bcrypt('inipassword'),
            'role' => 'admin',
        ]);
        if($user) {
            Admin::create([
                'name' => 'Imam A',
                'user_id' => $user -> id
            ]);
        }
    }
}
