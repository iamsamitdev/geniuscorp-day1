<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $web = Service::where('slug', 'web-development')->first();
        $app = Service::where('slug', 'mobile-app-development')->first();

        $items = [
            [
                'service_id' => $web?->id,
                'slug' => 'siam-logistics-corporate-site',
                'title' => 'เว็บไซต์องค์กร Siam Logistics',
                'client_name' => 'Siam Logistics Co., Ltd.',
                'summary' => 'ย้ายเว็บจาก WordPress มาเป็น Astro SSG ลดเวลาโหลดจาก 4.2 วินาที เหลือ 0.8 วินาที และถูก Perplexity อ้างอิงภายใน 6 สัปดาห์',
                'description' => '<p>Siam Logistics มีเว็บ WordPress อายุ 6 ปีที่โหลดช้าและไม่มี Structured Data เราย้ายเนื้อหา 120 หน้ามาเป็น Astro SSG โดยรักษา URL เดิมทั้งหมดและตั้ง 301 สำหรับหน้าที่เปลี่ยน</p><h2>ผลลัพธ์</h2><ul><li>LCP ลดจาก 4.2 วินาที เหลือ 0.8 วินาที</li><li>PageSpeed Insights mobile จาก 41 เป็น 98</li><li>ถูกอ้างอิงใน Perplexity สำหรับคำถาม "บริษัทขนส่งสินค้าเย็นในไทย" ภายใน 6 สัปดาห์</li></ul>',
                'cover_image' => '/images/portfolio/siam-logistics.jpg',
                'completed_at' => '2026-03-15',
                'is_published' => true,
            ],
            [
                'service_id' => $app?->id,
                'slug' => 'healthplus-patient-app',
                'title' => 'แอปนัดหมายผู้ป่วย HealthPlus',
                'client_name' => 'HealthPlus Clinic Network',
                'summary' => 'แอป Flutter สำหรับนัดหมายและดูผลตรวจ ผู้ใช้งาน 12,000 คนภายใน 3 เดือนแรก',
                'description' => '<p>แอปสำหรับเครือคลินิก 8 สาขา ให้ผู้ป่วยนัดหมาย เลื่อนนัด และดูผลตรวจได้เอง เชื่อมต่อกับระบบ HIS เดิมผ่าน Laravel API</p><h2>ผลลัพธ์</h2><ul><li>ผู้ใช้งาน 12,000 คนภายใน 3 เดือน</li><li>อัตราไม่มาตามนัดลดลง 23%</li></ul>',
                'cover_image' => '/images/portfolio/healthplus.jpg',
                'completed_at' => '2025-11-30',
                'is_published' => true,
            ],
            [
                'service_id' => $web?->id,
                'slug' => 'thai-organic-farm-shop',
                'title' => 'เว็บไซต์และร้านค้าออนไลน์ Thai Organic Farm',
                'client_name' => 'Thai Organic Farm',
                'summary' => 'เว็บองค์กรพร้อมแคตตาล็อกสินค้า 200 รายการ ติด Product Schema ครบ ทำให้ถูกแสดงใน Google AI Overviews สำหรับคำค้นสินค้าออร์แกนิก',
                'description' => '<p>เว็บไซต์ Astro SSG ที่ดึงข้อมูลสินค้าจาก Laravel API พร้อม Product + Offer Schema ทุกรายการ และ FAQ สำหรับสินค้าขายดี</p>',
                'cover_image' => '/images/portfolio/thai-organic.jpg',
                'completed_at' => '2026-06-20',
                'is_published' => true,
            ],
        ];

        foreach ($items as $item) {
            Portfolio::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
