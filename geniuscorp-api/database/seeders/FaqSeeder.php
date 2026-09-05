<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Service;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            'web-development' => [
                ['บริการพัฒนาเว็บไซต์องค์กรเหมาะกับใคร', 'เหมาะกับบริษัทที่ต้องการเว็บองค์กรใหม่ หรือต้องการย้ายจาก WordPress ที่ช้าและดูแลยาก โดยเฉพาะองค์กรที่ต้องการให้เว็บถูกค้นเจอทั้งใน Google และ AI Search เช่น ChatGPT และ Perplexity'],
                ['ราคาเริ่มต้นเท่าไร และรวมอะไรบ้าง', 'เริ่มต้น 45,000 บาท สำหรับเว็บ 7 หน้ามาตรฐาน (หน้าแรก เกี่ยวกับเรา บริการ ผลงาน บทความ ทีมงาน ติดต่อ) รวมการติดตั้ง Structured Data, Sitemap, llms.txt และ Deploy ขึ้นเซิร์ฟเวอร์ของลูกค้า'],
                ['ใช้เวลาดำเนินการกี่วัน', 'ประมาณ 30 วันทำการ แบ่งเป็นออกแบบ 7 วัน พัฒนา 15 วัน และทดสอบพร้อม Deploy 8 วัน'],
                ['มีบริการหลังการขายหรือไม่', 'มีการรับประกันแก้ไขข้อผิดพลาด 90 วันหลังส่งมอบ และมีแพ็กเกจดูแลรายเดือนเริ่มต้น 3,000 บาท ซึ่งรวมการ Rebuild เมื่อเนื้อหาเปลี่ยนและรายงาน AI Crawler รายเดือน'],
            ],
            'mobile-app-development' => [
                ['ทำไมเลือกใช้ Flutter แทนการเขียน Native แยกกัน', 'Flutter เขียนโค้ดชุดเดียวได้ทั้ง iOS และ Android ลดเวลาพัฒนาลงประมาณ 40% และลดค่าดูแลระยะยาว เพราะแก้ที่เดียวมีผลทั้งสองแพลตฟอร์ม'],
                ['ราคา 150,000 บาท รวมอะไรบ้าง', 'รวมแอป 8-10 หน้าจอ, Backend API ด้วย Laravel, การเชื่อมต่อฐานข้อมูลเดิมของลูกค้า และการส่งขึ้น App Store และ Google Play ไม่รวมค่าบัญชีนักพัฒนาของ Apple และ Google'],
                ['ใช้เวลาพัฒนากี่วัน', 'ประมาณ 60-90 วัน ขึ้นกับจำนวนหน้าจอและระบบที่ต้องเชื่อมต่อ โดยส่งมอบเวอร์ชันทดสอบให้ดูทุก 2 สัปดาห์'],
            ],
            'geo-aeo-consulting' => [
                ['GEO/AEO คืออะไร ต่างจาก SEO อย่างไร', 'GEO (Generative Engine Optimization) คือการทำให้เว็บถูก AI เช่น ChatGPT, Perplexity, Claude และ Gemini เลือกอ้างอิงในคำตอบ ส่วน SEO เน้นการติดอันดับในหน้าผลการค้นหา ทั้งสองใช้พื้นฐาน Technical SEO ร่วมกัน แต่ GEO เพิ่มเรื่อง Structured Data, E-E-A-T และเนื้อหาที่มีตัวเลขและแหล่งอ้างอิง'],
                ['ใช้เวลานานแค่ไหนกว่าจะเห็นผล', 'โดยทั่วไป AI Crawlers จะเข้ามาเก็บข้อมูลใหม่ภายใน 1-4 สัปดาห์หลังปรับปรุง และจากโปรเจกต์ที่ผ่านมา ลูกค้าเริ่มถูกอ้างอิงใน Perplexity ภายใน 6-8 สัปดาห์'],
                ['วัดผลอย่างไรว่าเว็บถูก AI อ้างอิงแล้ว', 'GeniusCorp ตรวจ Server Log หา User-Agent ของ AI Crawlers ทุกสัปดาห์ และทดสอบถาม AI แต่ละตัวด้วยชุดคำถามเป้าหมาย 20 คำถามทุกเดือน แล้วรายงานว่าเว็บถูกอ้างอิงกี่ครั้ง (Citation Rate)'],
                ['ทำได้กับเว็บ WordPress หรือไม่', 'ได้ บริการนี้ครอบคลุมทั้งเว็บ Astro/Laravel และ WordPress โดยบน WordPress จะทำผ่าน Child Theme และ Plugin เพียง 3 ตัว ไม่ต้อง Rebuild เว็บ'],
            ],
        ];

        foreach ($faqs as $serviceSlug => $items) {
            $service = Service::where('slug', $serviceSlug)->first();
            if (! $service) {
                continue;
            }

            foreach ($items as $index => [$question, $answer]) {
                Faq::updateOrCreate(
                    ['service_id' => $service->id, 'question' => $question],
                    ['answer' => $answer, 'sort_order' => $index + 1]
                );
            }
        }
    }
}
