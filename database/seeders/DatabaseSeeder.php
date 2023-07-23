<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;



use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            CustomerSeeder::class,
            CountrySeeder::class,
            ClassRoomSeeder::class,
            SubjectSeeder::class,
            BoardSeeder::class,
            QuestionTypeSeeder::class,
            QuestionPaperSeeder::class,
            BookSeeder::class,
            HeaderSeetingSeeder::class,
            SocialLinkSeeder::class,
        ]);
    }
}
