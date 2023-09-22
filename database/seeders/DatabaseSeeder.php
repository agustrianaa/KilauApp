<?php

namespace Database\Seeders;

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
            'role' => 'adminpusat',
        ]);
        if($user) {
            AdminPusat::create([
                'name' => 'Rita M',
                'user_id' => $user -> id
            ]);
        }
    }
}
