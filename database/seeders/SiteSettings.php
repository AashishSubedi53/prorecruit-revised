<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettings extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'phonenumber' => '9876543210',
            'address' => 'Pokhara-01',
            'email' => 'prorecruit@gmail.com',
            'instagram' => 'https://www.instagram.com/prorecruit',
            'tiktok' => 'https://www.tiktok.com/prorecruit',
            'facebook' => 'https://www.facebook.com/prorecruit',
            'payment_modes' => 'esewa',
            'copyright' => '© 2023. All Rights Reserved',
            'about_us_description' => 'Pro Recruit is dedicated to provide the best possible simplicity for professionals to look for and choose from.
            This platform gives consumers access to a huge and well-structured collection of professionals from many industries, 
            enabling quick and accurate decisions. You can choose the best option for your unique needs thanks to the simplified 
            user experience, which makes it easy for you to browse through profiles, reviews, and qualifications. Pro Recruit stands 
            out as a cutting-edge option for anyone in need of professional services because of its dedication to effectiveness and 
            consumer pleasure.

            Pro Recruit knows of how important it is to link people to excellence. Our platform connects service seekers and qualified
            professionals directly and effortlessly going beyond traditional job boards. If you\'re a small business wanting help from 
            experts or someone who needs special services, Pro Recruit is the place where great opportunities meet top-notch skills. 
            Come along with us as we transform the professional recruitment scene so that locating the right professional for your needs 
            becomes a reality.
            ',
            'about_us_image' => '',
            'logo' => '',
            'homepage_banner' => '',

        ]);
    }
}
