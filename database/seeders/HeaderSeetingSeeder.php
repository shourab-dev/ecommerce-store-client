<?php

namespace Database\Seeders;

use App\Models\HeaderSeeting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderSeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HeaderSeeting::create([
            'logo' => env('APP_URL') . "/frontend/logo.png",
            "phone" => json_encode(["+1 246-345-0695"]),
            "email" => json_encode(["tally@gmail.com"]),
            "is_question" => false,
            "address" => "1418 River Drive, Suite 35 Cottonhall, CA 9622
United States"
        ]);
    }
}
