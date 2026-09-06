// ชนิดข้อมูลตรงกับ API Resource ฝั่ง Laravel ทุกฟิลด์

export interface TeamMember {
  slug: string
  name: string
  job_title: string
  bio: string | null
  photo: string | null
  email: string | null
  social_links: string[]
  url: string
}

export interface Faq {
  question: string
  answer: string
}

export interface Service {
  slug: string
  name: string
  short_description: string
  description: string
  price_from: number | null
  price_currency: string
  duration_days: number | null
  icon: string | null
  url: string
  published_at: string | null
  updated_at: string | null
  faqs?: Faq[]
}

export interface Portfolio {
  slug: string
  title: string
  client_name: string | null
  summary: string
  description: string | null
  cover_image: string | null
  completed_at: string | null
  service?: { slug: string, name: string, url: string }
  url: string
  updated_at: string | null
}

export interface Article {
  slug: string
  title: string
  excerpt: string
  body?: string
  cover_image: string | null
  author: TeamMember
  url: string
  published_at: string | null
  updated_at: string | null
}
