<?php

namespace Database\Seeders;

use App\Models\Affiliator;
use App\Models\AffiliatorWithdrawal;
use App\Models\ServiceCategory;
use App\Models\Theme;
use App\Models\Service;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Wedding;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AffiliatorSeeder extends Seeder
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
         $user = User::create([
            'name' => 'affiliator',
            'email' => 'affiliator@ditrois.com',
            'email_verified_at' => $dateNow,
            'password' => Hash::make('123123'),
            'phone_number' => '081234123123',
            'address' => 'Buruan Blahbatuh',
        ]);
        $user->assignRole('affiliator');

        $aff = Affiliator::create([
            'id_user' => $user->id,
            'code' => 'affiliator',
            'bank' => 'BCA',
            'no_rekening' => '401653215',
            'nama' => 'I Nyoman Jyotisa',
        ]);
    }
}
