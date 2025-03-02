<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'Edward',
            'lastname' => 'ward',
            'email' => 'edward@test.com',
            'gender' => 'male',
            'role' => Role::where('name', 'student')->first(),
            'password' => 'password',
            'avatar' => 'man_dp.png'
        ]);
    }
}
