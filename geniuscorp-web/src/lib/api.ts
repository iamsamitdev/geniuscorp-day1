// ฟังก์ชันดึงข้อมูลทั้งหมด: รันเฉพาะตอน build (server context) เพราะ import จาก astro:env/server
import { API_URL, API_TOKEN } from 'astro:env/server'
import type { Article, Portfolio, Service, TeamMember } from './types'

interface ApiEnvelope<T> {
  data: T
}

async function apiGet<T>(path: string): Promise<T> {
  const url = `${API_URL}${path}`
  const res = await fetch(url, {
    headers: {
      Accept: 'application/json',
      Authorization: `Bearer ${API_TOKEN}`,
    },
  })

  if (!res.ok) {
    // ทำให้ build ล้มเหลวทันทีพร้อมบอกว่า endpoint ไหนพัง ดีกว่าได้เว็บที่หน้าว่าง
    throw new Error(`API ${res.status} ${res.statusText} at ${url}`)
  }

  const json = (await res.json()) as ApiEnvelope<T>
  return json.data
}

export const getServices = () => apiGet<Service[]>('/services')
export const getService = (slug: string) => apiGet<Service>(`/services/${slug}`)

export const getPortfolios = () => apiGet<Portfolio[]>('/portfolios')
export const getPortfolio = (slug: string) => apiGet<Portfolio>(`/portfolios/${slug}`)

export const getArticles = () => apiGet<Article[]>('/articles')
export const getArticle = (slug: string) => apiGet<Article>(`/articles/${slug}`)

export const getTeam = () => apiGet<TeamMember[]>('/team')
