<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counties = [
            [
                'name' => "Bangladesh",
                'code' => 'bd'
            ],
            [
                'name' => "India",
                'code' => 'in'
            ],
            [
                'name' => "Australia",
                'code' => 'au'
            ],
            [
                'name' => "China",
                'code' => 'cn'
            ],
        ];

        foreach ($counties as $country) {

            Country::create([
                'name' => $country['name'],
                'code' => $country['code'],
            ]);
        }
    }
}
