<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = array(
            'name' => 'Admin',
            'email' => 'apgoswamiinfo@yopmail.com',
            'password' => Hash::make('Password@123'),
            'role_as'=> '1',
        );
        $exists = User::where('email', $admin['email'])->first();
        if (!$exists) {
            User::create($admin);
        }
    }
}
