// ตัวช่วยจัดรูปแบบที่ใช้ซ้ำหลายหน้า

export const formatPrice = (value: number) => new Intl.NumberFormat('th-TH').format(value)

export const formatDate = (iso: string) =>
  new Date(iso).toLocaleDateString('th-TH', { year: 'numeric', month: 'long', day: 'numeric' })
