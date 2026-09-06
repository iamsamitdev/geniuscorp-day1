// @ts-check
import { defineConfig, envField } from 'astro/config'

export default defineConfig({
  // site จำเป็นสำหรับ Canonical, Open Graph และ Sitemap (Day 2, Day 4)
  site: 'https://www.geniuscorp.example',

  // ให้ทุก URL ลงท้ายด้วย / เสมอ (ตรงกับ url ที่ API ส่งมา)
  trailingSlash: 'always',

  // SSG
  output: 'static',

  build: {
    // /about/index.html - Apache/Nginx เสิร์ฟได้โดยไม่ต้องตั้ง rewrite
    format: 'directory',
  },

  env: {
    schema: {
      API_URL: envField.string({ context: 'server', access: 'public' }),
      API_TOKEN: envField.string({ context: 'server', access: 'secret' }),
    },
    validateSecrets: true,
  },
})
