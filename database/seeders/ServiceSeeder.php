<?php

namespace Database\Seeders;

use App\Models\Affiliator;
use App\Models\AffiliatorWithdrawal;
use App\Models\ServiceCategory;
use App\Models\Theme;
use App\Models\Service;
use App\Models\ServicePackage;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Wedding;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = now();

        $UndanganCategory = ServiceCategory::create([
            'name' => 'Undangan',
            'slug' => 'undangan',
            'description' => 'Website undangan web online',
        ]);

        $UndanganWebService = Service::create([
            'id_service_category' => $UndanganCategory->id,
            'name' => 'Undangan Nikah Web',
            'slug' => 'undangan-nikah-web',
            'banner_heading' => 'Undangan Nikah Web',
            'banner_desc' => 'Undangan Nikah Web',
            'feature_desc' => 'Undangan Nikah Web',
            'image' => 'Undangan Nikah Web',
        ]);

        Theme::create([
            'id_service' => $UndanganWebService->id,
            'name' => 'Dark Wedding',
            'demo_link' => 'Undangan Nikah Web',
            'image' => 'Undangan Nikah Web',
        ]);

        Theme::create([
            'id_service' => $UndanganWebService->id,
            'name' => 'Light Wedding',
            'demo_link' => 'Undangan Nikah Web',
            'image' => 'Undangan Nikah Web',
        ]);

        $KesehatanCategory = ServiceCategory::create([
            'name' => 'Website Kesehatan',
            'slug' => 'website-kesehatan',
            'description' => 'Website Kesehatan',
        ]);

        $DokterGigiService = Service::create([
            'id_service_category' => $KesehatanCategory->id,
            'name' => 'Dokter Gigi',
            'slug' => 'dokter-gigi',
            'banner_heading' => 'Website Dokter Gigi',
            'banner_desc' => 'Website Dokter Gigi',
            'feature_desc' => 'Website Dokter Gigi',
            'image' => 'Website Dokter Gigi',
        ]);

        ServicePackage::create([
            'id_service' => $DokterGigiService->id,
            'name' => 'Basic',
            'price' => '500000',
        ]);
        ServicePackage::create([
            'id_service' => $DokterGigiService->id,
            'name' => 'Standard',
            'price' => '1000000',
        ]);
        ServicePackage::create([
            'id_service' => $DokterGigiService->id,
            'name' => 'Pro',
            'price' => '2000000',
        ]);

        Theme::create([
            'id_service' => $DokterGigiService->id,
            'name' => 'Theme 1',
            'demo_link' => 'https://theme.ditrois.com/dental/1',
            'image' => 'bla',
        ]);

        Theme::create([
            'id_service' => $DokterGigiService->id,
            'name' => 'Theme 2',
            'demo_link' => 'https://theme.ditrois.com/dental/2',
            'image' => 'bla',
        ]);

        Theme::create([
            'id_service' => $DokterGigiService->id,
            'name' => 'Theme 3',
            'demo_link' => 'https://theme.ditrois.com/dental/3',
            'image' => 'bla',
        ]);

        $DokterMataService = Service::create([
            'id_service_category' => $KesehatanCategory->id,
            'name' => 'Dokter Mata',
            'slug' => 'dokter-mata',
            'banner_heading' => 'Website Dokter Mata',
            'banner_desc' => 'Website Dokter Mata',
            'feature_desc' => 'Website Dokter Mata',
            'image' => 'Website Dokter Mata',
        ]);

        ServicePackage::create([
            'id_service' => $DokterMataService->id,
            'name' => 'Basic',
            'price' => '500000',
        ]);
        ServicePackage::create([
            'id_service' => $DokterMataService->id,
            'name' => 'Standard',
            'price' => '1000000',
        ]);
        ServicePackage::create([
            'id_service' => $DokterMataService->id,
            'name' => 'Pro',
            'price' => '2000000',
        ]);

        Theme::create([
            'id_service' => $DokterMataService->id,
            'name' => 'Theme 1',
            'demo_link' => 'bla',
            'image' => 'bla',
        ]);

        Theme::create([
            'id_service' => $DokterMataService->id,
            'name' => 'Theme 2',
            'demo_link' => 'bla',
            'image' => 'bla',
        ]);

        Theme::create([
            'id_service' => $DokterMataService->id,
            'name' => 'Theme 3',
            'demo_link' => 'bla',
            'image' => 'bla',
        ]);
    }
}
