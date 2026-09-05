<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'slug' => 'somchai-techlead',
                'name' => 'สมชาย ใจดี',
                'job_title' => 'Chief Technology Officer',
                'bio' => 'สถาปนิกซอฟต์แวร์ประสบการณ์ 15 ปี ดูแลระบบให้ลูกค้าองค์กรมากกว่า 40 โปรเจกต์ เชี่ยวชาญ Laravel, Astro และ Cloud Architecture',
                'photo' => '/images/team/somchai.jpg',
                'email' => 'somchai@geniuscorp.example',
                'social_links' => [
                    'https://www.linkedin.com/in/somchai-example',
                    'https://github.com/somchai-example',
                ],
                'sort_order' => 1,
            ],
            [
                'slug' => 'nattaya-pm',
                'name' => 'ณัฐญา วงศ์สว่าง',
                'job_title' => 'Project Manager',
                'bio' => 'บริหารโปรเจกต์พัฒนาซอฟต์แวร์ให้ลูกค้าภาครัฐและเอกชนมากกว่า 25 โครงการ ได้รับการรับรอง PMP',
                'photo' => '/images/team/nattaya.jpg',
                'email' => 'nattaya@geniuscorp.example',
                'social_links' => ['https://www.linkedin.com/in/nattaya-example'],
                'sort_order' => 2,
            ],
            [
                'slug' => 'peerapat-dev',
                'name' => 'พีรพัฒน์ ศรีสุข',
                'job_title' => 'Senior Full Stack Developer',
                'bio' => 'นักพัฒนา Full Stack สาย PHP/Laravel และ TypeScript เขียนบทความเทคนิคประจำบล็อกของบริษัท',
                'photo' => '/images/team/peerapat.jpg',
                'email' => null,
                'social_links' => ['https://github.com/peerapat-example'],
                'sort_order' => 3,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(['slug' => $member['slug']], $member);
        }
    }
}
