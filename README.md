# Day 1 - GEO/AEO Full Stack Foundation (โค้ดเฉลย)

ผลลัพธ์ของวันนี้: Laravel API (Sanctum) + MySQL พร้อมข้อมูลจำลอง และเว็บ Astro SSG 7 เมนูดึงข้อมูลจริงตอน build

## A. geniuscorp-api (Laravel 13)

```bash
# สร้างโปรเจกต์ Laravel 13 ใหม่ชื่อ api
composer create-project laravel/laravel:^13.0 api
cd api
php artisan install:api             # ติดตั้ง Sanctum + routes/api.php
```

รันโปรเจกต์ Laravel ด้วยคำสั่ง:
```bash
php artisan serve
```

เข้าชมโปรเจกต์ที่รันอยู่ได้ที่: http://127.0.0.1:8000

จากนั้น **คัดลอกโฟลเดอร์/ไฟล์ในชุดนี้วางทับ** โปรเจกต์ที่สร้าง:

```
geniuscorp-api/
├── .env.example                              → คัดลอกเป็น .env แล้วแก้ DB_*
├── bootstrap/app.php                         → ทับ (เพิ่ม alias middleware ability/abilities)
├── routes/api.php                            → ทับ
├── app/Models/User.php                       → ทับ (เพิ่ม HasApiTokens)
├── app/Models/TeamMember.php
├── app/Models/Service.php
├── app/Models/Portfolio.php
├── app/Models/Article.php
├── app/Models/Faq.php
├── app/Http/Controllers/Api/V1/*.php          → ArticleController, PortfolioController, ServiceController, TeamMemberController
├── app/Http/Resources/*.php                   → ArticleResource, FaqResource, PortfolioResource, ServiceResource, TeamMemberResource
├── app/Console/Commands/IssueBuildToken.php
├── database/migrations/2026_09_05_*.php       → team_members, services, portfolios, articles, faqs
└── database/seeders/*.php                    → ทับ DatabaseSeeder.php (+ Article/Faq/Portfolio/Service/TeamMemberSeeder)
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
# สร้างโปรเจกต์ Astro 6 ใหม่ชื่อ web
npm create astro@latest web -- --template minimal --typescript strict --install --no-git

cd web
npm install
cp .env.example .env                # ใส่ API_URL และ API_TOKEN
npm run dev                         # http://localhost:4321
npm run build && npm run preview
```

จากนั้น **คัดลอกโฟลเดอร์/ไฟล์ในชุดนี้วางทับ** โปรเจกต์ที่สร้าง:

```
geniuscorp-web/
├── .env.example                        → คัดลอกเป็น .env แล้วแก้ API_URL และ API_TOKEN
├── astro.config.mjs                    → ทับ (site, trailingSlash, env schema)
├── src/lib/api.ts                      → ทับ
├── src/lib/format.ts
├── src/lib/types.ts
├── src/layouts/BaseLayout.astro        → ทับ
├── src/components/Header.astro
├── src/components/Footer.astro
├── src/components/ServiceCard.astro
├── src/components/PortfolioCard.astro
├── src/components/ArticleCard.astro
├── src/pages/index.astro
├── src/pages/about.astro
├── src/pages/team.astro
├── src/pages/contact.astro
├── src/pages/services/index.astro
├── src/pages/services/[slug].astro
├── src/pages/portfolio/index.astro
├── src/pages/portfolio/[slug].astro
├── src/pages/blog/index.astro
├── src/pages/blog/[slug].astro
└── src/styles/global.css               → ทับ
```


## สิ่งที่อยู่ในวันนี้

- ตาราง 5 ตาราง (slug, published_at, updated_at, author_id, ฟิลด์ตัวเลข) + Seeder ข้อมูลจำลอง GeniusCorp
- API Resources (ISO 8601, `url`, `faqs` whenLoaded), Controller v1, Sanctum token `content:read`
- Astro: `astro.config.mjs` (site, trailingSlash, env schema), `src/lib/{api,format,types}.ts`, `BaseLayout`, Header/Footer + การ์ด 3 ชนิด (Service/Portfolio/Article), หน้า 7 เมนู (หน้าแรก/เกี่ยวกับเรา/บริการ/ผลงาน/บทความ/ทีมงาน/ติดต่อเรา) + Dynamic Routes (`services/[slug]`, `portfolio/[slug]`, `blog/[slug]`)
- `src/styles/global.css` CSS มินิมอล

## ยังไม่มีในวันนี้ (ดู Day2)

SeoHead, JSON-LD, FAQ Section, Breadcrumb component, check-geo.mjs
