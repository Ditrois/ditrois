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

        $serCat = ServiceCategory::create([
            'name' => 'Undangan',
            'slug' => 'undangan',
            'description' => 'blablabla',
        ]);

        $ser = Service::create([
            'id_service_category' => $serCat->id,
            'name' => 'Undangan Nikah Web',
            'slug' => 'undangan_nikah_web',
            'banner_heading' => 'Undangan Nikah Web',
            'banner_desc' => 'Undangan Nikah Web',
            'feature_desc' => 'Undangan Nikah Web',
            'image' => 'Undangan Nikah Web',
        ]);

        $theme = Theme::create([
            'id_service' => $ser->id,
            'name' => 'Dark Wedding',
            'demo_link' => 'Undangan Nikah Web',
            'image' => 'Undangan Nikah Web',
        ]);

        $trans = Transaction::create([
            'id_service' => $ser->id,
            'id_affiliator' => $aff->id,
            'id_theme' => $theme->id,
            'customer_name' => 'Cok Man',
            'customer_phone_number' => '081231761223',
            'total' => '100000',
            'status' => 'pending',
        ]);
        
        Wedding::create([
            'id_transaction' => $trans->id,
            'title' => 'Wedding Ari Yuni',
            'slug' => 'ariyuniwedding',
            'date' => '2022-04-04',
            'time' => '18:00',
            'location' => 'gang matahari',
            'maps_link' => 'blabla',
            'edit_code' => 'blabla',
            'song' => 'blabla',
        ]);

        AffiliatorWithdrawal::create([
            'id_affiliator' => $aff->id,
            'amount' => '100000',
            'status' => 'pending',
            'bank' => 'BCA',
            'no_rekening' => '401653215',
            'nama' => 'I Nyoman Jyotisa',
        ]);
    }
}
