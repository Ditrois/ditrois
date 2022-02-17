<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = now();

        //admin
         $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@ditrois.com',
            'email_verified_at' => $dateNow,
            'password' => Hash::make('123123'),
            'phone_number' => '081234123123',
            'address' => 'Buruan Blahbatuh',
        ]);
        $admin->assignRole('admin');
    }
}
