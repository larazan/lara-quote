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
            CreateAdminUserSeeder::class,
            CategorySeeder::class,
            UserTableSeeder::class,
            SettingSeeder::class,
            ArticleSeeder::class,
            LikeSeeder::class,
            FaqSeeder::class,
            RoleSeeder::class,
            PlanSeeder::class,
            // TagSeeder::class,
        ]);
    }
}
