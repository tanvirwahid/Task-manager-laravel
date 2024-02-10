<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        $user = config('default-manager');

        User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'role_id' => $user['role_id'],
            'employee_id' => $user['employee_id'],
            'password' => bcrypt($user['password']),
        ]);
    }
}
