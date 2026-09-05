# Day 1 - GEO/AEO Mindset & Full Stack Foundation (โค้ดเฉลย)

ผลลัพธ์ของวันนี้: Laravel API (Sanctum) + MySQL พร้อมข้อมูลจำลอง และเว็บ Astro SSG 7 เมนูดึงข้อมูลจริงตอน build

## A. geniuscorp-api (Laravel 13)

```bash
laravel new geniuscorp-api          # Starter kit: None
cd geniuscorp-api
php artisan install:api             # ติดตั้ง Sanctum + routes/api.php
```

จากนั้น **คัดลอกโฟลเดอร์/ไฟล์ในชุดนี้วางทับ** โปรเจกต์ที่สร้าง:

```
geniuscorp-api/
├── .env.example                  → คัดลอกเป็น .env แล้วแก้ DB_*
├── bootstrap/app.php             → ทับ (เพิ่ม alias middleware ability/abilities)
├── routes/api.php                → ทับ
├── app/Models/User.php           → ทับ (เพิ่ม HasApiTokens)
├── app/Models/{TeamMember,Service,Portfolio,Article,Faq}.php
├── app/Http/Controllers/Api/V1/*.php
├── app/Http/Resources/*.php
├── app/Console/Commands/IssueBuildToken.php
├── database/migrations/2026_09_05_*.php
└── database/seeders/*.php        → ทับ DatabaseSeeder.php
```

```sql
CREATE DATABASE geniuscorp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

```bash
php artisan migrate --seed
php artisan geo:issue-build-token   # เก็บ token ไว้ใส่ .env ของ Astro
php artisan serve                   # หรือใช้ Laragon: http://geniuscorp-api.test
```

ทดสอบ: `GET /api/v1/services` พร้อม `Authorization: Bearer <token>` และ `Accept: application/json` → 200 (3 บริการ ไม่มี draft)

## B. geniuscorp-web (Astro 6)

```bash
cd geniuscorp-web
npm install
cp .env.example .env                # ใส่ API_URL และ API_TOKEN
npm run dev                         # http://localhost:4321
npm run build && npm run preview
```

## สิ่งที่อยู่ในวันนี้

- ตาราง 5 ตาราง (slug, published_at, updated_at, author_id, ฟิลด์ตัวเลข) + Seeder ข้อมูลจำลอง GeniusCorp
- API Resources (ISO 8601, `url`, `faqs` whenLoaded), Controller v1, Sanctum token `content:read`
- Astro: `astro.config.mjs` (site, trailingSlash, env schema), `src/lib/api.ts`, `BaseLayout`, Header/Footer/Cards, หน้า 7 เมนู + Dynamic Routes
- `src/styles/global.css` CSS มินิมอล

## ยังไม่มีในวันนี้ (ดู Day2)

SeoHead, JSON-LD, FAQ Section, Breadcrumb component, check-geo.mjs
