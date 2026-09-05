<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'slug' => 'web-development',
                'name' => 'รับพัฒนาเว็บไซต์องค์กร',
                'short_description' => 'พัฒนาเว็บไซต์องค์กรด้วย Astro และ Laravel โหลดเร็วกว่า 0.8 วินาที รองรับ AI Search ตั้งแต่วันแรก เริ่มต้น 45,000 บาท ใช้เวลา 30 วัน',
                'description' => '<p>GeniusCorp พัฒนาเว็บไซต์องค์กรด้วยสถาปัตยกรรม Static Site Generation (Astro) ร่วมกับ Laravel API และ MySQL ทำให้ได้ HTML สมบูรณ์ 100% ที่ทั้ง Google และ AI Search Engines เช่น ChatGPT, Perplexity, Claude และ Gemini อ่านเนื้อหาได้ครบโดยไม่ต้องรัน JavaScript</p><h2>บริการนี้เหมาะกับใคร</h2><p>บริษัทที่ต้องการเว็บองค์กรใหม่ หรือต้องการย้ายจาก WordPress ที่ช้าและดูแลยาก โดยเฉพาะองค์กรที่ต้องการให้เว็บถูกค้นเจอและถูกอ้างอิงในยุค AI Search</p><h2>ราคาเริ่มต้นเท่าไร และรวมอะไรบ้าง</h2><p>เริ่มต้น 45,000 บาท สำหรับเว็บ 7 หน้ามาตรฐาน ได้แก่ หน้าแรก เกี่ยวกับเรา บริการ ผลงาน บทความ ทีมงาน และติดต่อเรา รวมการติดตั้ง Structured Data (JSON-LD) ครบทุก Schema, Sitemap, llms.txt และการ Deploy ขึ้นเซิร์ฟเวอร์ของลูกค้า</p><h2>ขั้นตอนการทำงานเป็นอย่างไร ใช้เวลากี่วัน</h2><ol><li>ออกแบบโครงสร้างและเนื้อหา 7 วัน</li><li>พัฒนา Laravel API และ Astro 15 วัน</li><li>ทดสอบ Validate Structured Data และ Deploy 8 วัน</li></ol><p>รวมประมาณ 30 วันทำการ</p>',
                'price_from' => 45000,
                'price_currency' => 'THB',
                'duration_days' => 30,
                'icon' => 'globe',
                'sort_order' => 1,
                'is_published' => true,
                'published_at' => now()->subMonths(6),
            ],
            [
                'slug' => 'mobile-app-development',
                'name' => 'รับพัฒนาโมบายแอปพลิเคชัน',
                'short_description' => 'พัฒนาแอป iOS และ Android ด้วย Flutter จากทีมที่ส่งมอบแล้วมากกว่า 30 แอป เริ่มต้น 150,000 บาท ใช้เวลา 60-90 วัน',
                'description' => '<p>GeniusCorp พัฒนาแอปพลิเคชันด้วย Flutter เขียนโค้ดครั้งเดียวได้ทั้ง iOS และ Android ทีมของเราส่งมอบแอปให้ลูกค้าแล้วมากกว่า 30 แอป ครอบคลุมธุรกิจค้าปลีก สุขภาพ และโลจิสติกส์</p><h2>บริการนี้เหมาะกับใคร</h2><p>ธุรกิจที่ต้องการแอปสำหรับลูกค้าหรือพนักงาน ที่ต้องเชื่อมต่อกับระบบหลังบ้านเดิม เช่น ERP, CRM หรือฐานข้อมูล MySQL</p><h2>ราคาเริ่มต้นเท่าไร</h2><p>เริ่มต้น 150,000 บาท สำหรับแอปที่มี 8-10 หน้าจอ รวม Backend API และการส่งขึ้น App Store และ Google Play</p>',
                'price_from' => 150000,
                'price_currency' => 'THB',
                'duration_days' => 75,
                'icon' => 'smartphone',
                'sort_order' => 2,
                'is_published' => true,
                'published_at' => now()->subMonths(5),
            ],
            [
                'slug' => 'geo-aeo-consulting',
                'name' => 'ที่ปรึกษา GEO/AEO ให้เว็บถูก AI อ้างอิง',
                'short_description' => 'ตรวจสอบและปรับเว็บไซต์ให้ถูกอ้างอิงโดย ChatGPT, Perplexity, Claude และ Gemini พร้อมรายงานวัดผลรายเดือน เริ่มต้น 25,000 บาท',
                'description' => '<p>บริการ Audit เว็บไซต์ตาม GEO-Ready Checklist 30 ข้อ ครอบคลุม Structured Data, Metadata, Canonical, Sitemap, llms.txt, E-E-A-T และ Performance แล้วส่งมอบแผนแก้ไขเรียงตาม Impact vs Effort พร้อมลงมือทำให้บนทั้ง Astro และ WordPress</p><h2>GEO/AEO คืออะไร</h2><p>GEO (Generative Engine Optimization) คือการทำให้เว็บถูก AI เลือกอ้างอิงในคำตอบ ส่วน AEO (Answer Engine Optimization) คือการทำให้เนื้อหาถูกดึงไปเป็นคำตอบโดยตรง ทั้งสองต่อยอดจาก Technical SEO ที่ถูกต้อง</p><h2>วัดผลอย่างไร</h2><p>ตรวจ Server Log หา AI Crawlers ทุกสัปดาห์ และทดสอบถาม AI แต่ละตัวด้วยชุดคำถามเป้าหมาย 20 คำถามทุกเดือน แล้วรายงาน Citation Rate</p>',
                'price_from' => 25000,
                'price_currency' => 'THB',
                'duration_days' => 14,
                'icon' => 'sparkles',
                'sort_order' => 3,
                'is_published' => true,
                'published_at' => now()->subMonths(2),
            ],
            [
                'slug' => 'internal-draft-service',
                'name' => 'บริการที่ยังไม่เผยแพร่ (ทดสอบ scope published)',
                'short_description' => 'ข้อมูลนี้ต้องไม่หลุดออกไปทาง API',
                'description' => '<p>draft</p>',
                'price_from' => null,
                'duration_days' => null,
                'sort_order' => 99,
                'is_published' => false,
                'published_at' => null,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
