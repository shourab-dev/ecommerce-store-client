<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socialLinks = [
            [
                'name' => "facebook",
                'icon' => "fab fa-facebook-f",
                'link' => "#",
            ],
            [
                'name' => "twitter",
                'icon' => "fab fa-twitter",
                'link' => "#",
            ],
            [
                'name' => "instagram",
                'icon' => "fab fa-instagram",
                'link' => "#",
            ],
            [
                'name' => "tiktok",
                'icon' => "fab fa-tiktok",

            ],
            [
                'name' => "linkedin",
                'icon' => "fab fa-linkedin-in",

            ],
            [
                'name' => "youtube",
                'icon' => "fab fa-youtube",
            ],
            [
                'name' => "whatsapp",
                'icon' => "fab fa-whatsapp",
            ],
        ];

        foreach ($socialLinks as $socialLink) {
            SocialLink::create([
                'name' => $socialLink['name'],
                'icon' => $socialLink['icon'],
                'link' => $socialLink['link'] ?? null,
            ]);
        }
    }
}
