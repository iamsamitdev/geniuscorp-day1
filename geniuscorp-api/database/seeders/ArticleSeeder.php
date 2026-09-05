<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $somchai = TeamMember::where('slug', 'somchai-techlead')->first();
        $peerapat = TeamMember::where('slug', 'peerapat-dev')->first();

        $articles = [
            [
                'author_id' => $somchai->id,
                'slug' => 'geo-vs-seo-2026',
                'title' => 'GEO ต่างจาก SEO อย่างไร และเว็บองค์กรต้องปรับอะไรบ้างในปี 2026',
                'excerpt' => 'GEO คือการทำให้เว็บถูก AI อ้างอิง ต่างจาก SEO ที่เน้นอันดับ บทความนี้สรุป 7 สิ่งที่นักพัฒนาต้องทำ พร้อมตัวเลขจากงานวิจัย Princeton',
                'body' => '<p>ในปี 2026 ผู้ใช้จำนวนมากเริ่มต้นการค้นหาด้วยการถาม ChatGPT, Perplexity หรือ Gemini แทนการพิมพ์ใน Google เว็บที่ AI ไม่ได้อ้างอิงจึงแทบไม่มีตัวตนสำหรับผู้ใช้กลุ่มนี้ บทความนี้อธิบายความต่างของ GEO กับ SEO และสิ่งที่นักพัฒนาเว็บองค์กรต้องปรับ 7 ข้อ</p><h2>GEO คืออะไร</h2><p>GEO (Generative Engine Optimization) คือการปรับเว็บให้ระบบ AI ที่สร้างคำตอบ (Generative Engine) อ่านเข้าใจ เชื่อถือ และเลือกอ้างอิงเนื้อหาของเรา งานวิจัยของ Princeton ในปี 2024 พบว่าการใส่สถิติ แหล่งอ้างอิง และคำพูดผู้เชี่ยวชาญ เพิ่มโอกาสถูกอ้างอิงได้ราว 30-40%</p><h2>GEO ต่างจาก SEO อย่างไร</h2><table><thead><tr><th>มิติ</th><th>SEO</th><th>GEO</th></tr></thead><tbody><tr><td>เป้าหมาย</td><td>ติดอันดับ</td><td>ถูกอ้างอิง</td></tr><tr><td>หน่วยเนื้อหา</td><td>ทั้งหน้า</td><td>ย่อหน้าและข้อเท็จจริง</td></tr><tr><td>สัญญาณสำคัญ</td><td>Backlink, keyword</td><td>Structured Data, E-E-A-T, ตัวเลข</td></tr></tbody></table><h2>เว็บองค์กรต้องทำอะไรบ้าง</h2><ol><li>ติดตั้ง JSON-LD ครบทุก Schema</li><li>ใส่ Canonical ทุกหน้า</li><li>สร้าง Sitemap ที่ lastmod จริง</li><li>เขียน FAQ แบบ answer-ready</li><li>เพิ่ม Author Box และวันที่แบบ machine-readable</li><li>สร้าง llms.txt</li><li>วัดผลจาก Server Log</li></ol>',
                'cover_image' => '/images/blog/geo-vs-seo.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
            [
                'author_id' => $peerapat->id,
                'slug' => 'astro-laravel-ssg-architecture',
                'title' => 'สถาปัตยกรรม Astro SSG + Laravel API: ทำไมไม่ต้องมี Node.js บนเซิร์ฟเวอร์',
                'excerpt' => 'อธิบายการทำงานของ Astro SSG ร่วมกับ Laravel API และ MySQL ตั้งแต่ build จนถึง deploy บน Apache พร้อมตัวเลข TTFB ที่วัดได้จริง',
                'body' => '<p>หลายคนเข้าใจว่าเว็บที่สร้างด้วย JavaScript framework ต้องรัน Node.js บนเซิร์ฟเวอร์เสมอ แต่ Astro ในโหมด Static Site Generation สร้างไฟล์ HTML ทั้งหมดตอน build จึงนำขึ้น Apache หรือ Nginx ธรรมดาได้ทันที บทความนี้อธิบายการทำงานทั้งระบบพร้อมตัวเลข TTFB 0.08 วินาทีที่วัดได้จริง</p><h2>ระบบทำงานอย่างไร</h2><p>ตอน build Astro เรียก Laravel API ด้วย Sanctum Token ดึงข้อมูลบริการ บทความ และทีมงานจาก MySQL แล้วเรนเดอร์เป็น HTML ในโฟลเดอร์ dist จากนั้น rsync ไปยังเซิร์ฟเวอร์</p><h2>เนื้อหาเปลี่ยนแล้วทำอย่างไร</h2><p>Laravel Observer ยิง Webhook ให้ build ใหม่อัตโนมัติภายใน 2-3 นาที</p>',
                'cover_image' => '/images/blog/astro-laravel.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(7),
            ],
            [
                'author_id' => $somchai->id,
                'slug' => 'wordpress-geo-retrofit-checklist',
                'title' => 'Checklist 20 ข้อ ทำเว็บ WordPress เดิมให้ AI อ้างอิงได้โดยไม่ต้อง Rebuild',
                'excerpt' => 'รวม Checklist สำหรับ GEO Retrofit บน WordPress ตั้งแต่ Metadata, Canonical, Schema จนถึง Performance พร้อมเครื่องมือตรวจฟรี',
                'body' => '<p>เว็บองค์กรส่วนใหญ่ในไทยยังอยู่บน WordPress และการ Rebuild ไม่ใช่ทางเลือกเสมอไป Checklist 20 ข้อนี้ช่วยให้เว็บ WordPress เดิมพร้อมสำหรับ AI Search ภายใน 1-2 สัปดาห์ โดยใช้ Child Theme และ Plugin เพียง 3 ตัว</p><h2>ต้องตรวจอะไรบ้าง</h2><ul><li>Metadata 4 ข้อ</li><li>Canonical 3 ข้อ</li><li>Heading และโครงเนื้อหา 4 ข้อ</li><li>Structured Data 4 ข้อ</li><li>Sitemap และ robots.txt 2 ข้อ</li><li>Performance 3 ข้อ</li></ul>',
                'cover_image' => '/images/blog/wp-geo-checklist.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(['slug' => $article['slug']], $article);
        }
    }
}
