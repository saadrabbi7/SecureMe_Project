<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder for Admin
        $user = [
            'name'     => 'Admin',
            'phone'    => '11111111111',                  // 11 digit here
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin-password'),
            'is_admin' => '1',
        ];
        $user = User::create($user);
    }
}
