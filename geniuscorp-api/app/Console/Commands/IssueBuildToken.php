<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class IssueBuildToken extends Command
{
    protected $signature = 'geo:issue-build-token
                            {--email=astro-build@geniuscorp.example : อีเมลของผู้ใช้ที่จะออก token ให้}
                            {--name=astro-build : ชื่อ token}';

    protected $description = 'ออก Sanctum token แบบอ่านอย่างเดียว (content:read) สำหรับ Astro build process';

    public function handle(): int
    {
        $user = User::where('email', $this->option('email'))->first();

        if (! $user) {
            $this->error('ไม่พบผู้ใช้ ' . $this->option('email') . ' - รัน php artisan db:seed ก่อน');
            return self::FAILURE;
        }

        $user->tokens()->where('name', $this->option('name'))->delete();

        $token = $user->createToken($this->option('name'), ['content:read']);

        $this->info('สร้าง token สำเร็จ นำค่าด้านล่างไปใส่ใน .env ของโปรเจกต์ Astro (API_TOKEN=...)');
        $this->newLine();
        $this->line($token->plainTextToken);

        return self::SUCCESS;
    }
}
