<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ผู้ใช้สำหรับออก Sanctum Token ให้ build process (ไม่ใช่ผู้ใช้จริง)
        User::updateOrCreate(
            ['email' => 'astro-build@geniuscorp.example'],
            ['name' => 'Astro Build Bot', 'password' => bcrypt(str()->random(32))]
        );

        $this->call([
            TeamMemberSeeder::class,
            ServiceSeeder::class,
            PortfolioSeeder::class,
            ArticleSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
