# SEO & Analytics Setup Guide untuk Desa Cibeureum Talaga

## 1. Google Search Console Setup

### File Verifikasi:
- File verifikasi sudah dibuat: `public/googlec7b4b7f9c8e2e7c3.html`
- URL untuk verifikasi: https://cibeureumtalaga.id/googlec7b4b7f9c8e2e7c3.html

### Langkah-langkah:
1. Buka Google Search Console: https://search.google.com/search-console/
2. Tambah property dengan domain: https://cibeureumtalaga.id
3. Pilih metode verifikasi "HTML file upload"
4. Upload file googlec7b4b7f9c8e2e7c3.html (sudah tersedia)
5. Klik "Verify"

## 2. Sitemap XML

### URL Sitemap:
- https://cibeureumtalaga.id/sitemap.xml
- https://cibeureumtalaga.id/robots.txt

### Submit ke Search Console:
1. Setelah verifikasi berhasil
2. Go to "Sitemaps" di sidebar
3. Add new sitemap: sitemap.xml
4. Submit

## 3. Meta Tags Implementation

### Halaman yang sudah dioptimasi:
- ✅ Homepage (welcome.blade.php)
- ✅ Layout umum (layouts/public.blade.php)

### Meta tags include:
- Title & Description
- Open Graph (Facebook)
- Twitter Cards
- JSON-LD Structured Data
- Canonical URLs
- Mobile optimization

## 4. Robots.txt

### Configured untuk:
- Allow semua crawler
- Disallow area admin & private
- Reference ke sitemap

## 5. Google Analytics (Optional)

### Untuk menambah Google Analytics:
1. Buat akun di Google Analytics
2. Tambahkan tracking code ke layout:

```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'GA_MEASUREMENT_ID');
</script>
```

## 6. Monitoring & Optimization

### Setelah submit:
1. Monitor indexing status di Search Console
2. Check untuk crawl errors
3. Submit individual URLs jika diperlukan
4. Monitor search performance

### Keywords yang dioptimasi:
- "desa cibeureum talaga"
- "sistem informasi desa"
- "pengumuman desa"
- "agenda desa"
- "apbdes"
- "pemerintah desa cibeureum"
- "talaga majalengka"

## 7. Local SEO

### Structured Data include:
- Organization information
- Local business schema
- Contact information
- Address information
- Geographic coordinates

## 8. Performance Tips

### Untuk meningkatkan SEO:
1. Pastikan semua images memiliki alt tags
2. Optimize loading speed
3. Ensure mobile responsiveness
4. Regular content updates
5. Internal linking structure

## 9. Expected Timeline

### Indexing:
- Initial crawl: 1-3 hari
- Full indexing: 1-2 minggu
- Search visibility: 2-4 minggu

### Tips untuk akselerasi:
1. Submit URLs manually di Search Console
2. Share di social media
3. Update content regularly
4. Build quality backlinks
