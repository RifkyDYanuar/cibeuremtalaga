<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Pengumuman;
use App\Models\Agenda;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">';
        
        // Static pages
        $staticPages = [
            [
                'url' => url('/'),
                'changefreq' => 'daily',
                'priority' => '1.0',
                'lastmod' => now()->toISOString()
            ],
            [
                'url' => url('/tentang'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
                'lastmod' => now()->toISOString()
            ],
            [
                'url' => url('/berita'),
                'changefreq' => 'daily',
                'priority' => '0.9',
                'lastmod' => now()->toISOString()
            ],
            [
                'url' => url('/kontak'),
                'changefreq' => 'monthly',
                'priority' => '0.7',
                'lastmod' => now()->toISOString()
            ],
            [
                'url' => url('/data-kependudukan'),
                'changefreq' => 'weekly',
                'priority' => '0.8',
                'lastmod' => now()->toISOString()
            ],
            [
                'url' => url('/apbdes'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
                'lastmod' => now()->toISOString()
            ],
            [
                'url' => url('/agenda-public'),
                'changefreq' => 'daily',
                'priority' => '0.9',
                'lastmod' => now()->toISOString()
            ],
            [
                'url' => url('/pengumuman-public'),
                'changefreq' => 'daily',
                'priority' => '0.9',
                'lastmod' => now()->toISOString()
            ]
        ];

        foreach ($staticPages as $page) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . htmlspecialchars($page['url']) . '</loc>';
            $sitemap .= '<lastmod>' . $page['lastmod'] . '</lastmod>';
            $sitemap .= '<changefreq>' . $page['changefreq'] . '</changefreq>';
            $sitemap .= '<priority>' . $page['priority'] . '</priority>';
            $sitemap .= '</url>';
        }

        // Dynamic content - Pengumuman
        try {
            $pengumuman = Pengumuman::orderBy('updated_at', 'desc')
                ->take(100)
                ->get();

            foreach ($pengumuman as $item) {
                $sitemap .= '<url>';
                $sitemap .= '<loc>' . htmlspecialchars(url('/pengumuman-public/' . $item->id)) . '</loc>';
                $sitemap .= '<lastmod>' . $item->updated_at->toISOString() . '</lastmod>';
                $sitemap .= '<changefreq>weekly</changefreq>';
                $sitemap .= '<priority>0.8</priority>';
                
                // Add news markup for recent announcements (last 3 days)
                if ($item->created_at >= now()->subDays(3)) {
                    $sitemap .= '<news:news>';
                    $sitemap .= '<news:publication>';
                    $sitemap .= '<news:name>Desa Cibeureum Talaga</news:name>';
                    $sitemap .= '<news:language>id</news:language>';
                    $sitemap .= '</news:publication>';
                    $sitemap .= '<news:publication_date>' . $item->created_at->toISOString() . '</news:publication_date>';
                    $sitemap .= '<news:title><![CDATA[' . $item->judul . ']]></news:title>';
                    $sitemap .= '</news:news>';
                }
                
                // Add image if exists
                if (isset($item->gambar) && $item->gambar) {
                    $sitemap .= '<image:image>';
                    $sitemap .= '<image:loc>' . asset('storage/' . $item->gambar) . '</image:loc>';
                    $sitemap .= '<image:title><![CDATA[' . $item->judul . ']]></image:title>';
                    $sitemap .= '<image:caption><![CDATA[' . strip_tags(substr($item->isi ?? '', 0, 100)) . ']]></image:caption>';
                    $sitemap .= '</image:image>';
                }
                
                $sitemap .= '</url>';
            }
        } catch (\Exception $e) {
            // Handle if pengumuman table doesn't exist or has different structure
        }

        // Dynamic content - Agenda
        try {
            $agenda = Agenda::orderBy('updated_at', 'desc')
                ->take(100)
                ->get();

            foreach ($agenda as $item) {
                $sitemap .= '<url>';
                $sitemap .= '<loc>' . htmlspecialchars(url('/agenda-public/' . $item->id)) . '</loc>';
                $sitemap .= '<lastmod>' . $item->updated_at->toISOString() . '</lastmod>';
                $sitemap .= '<changefreq>weekly</changefreq>';
                $sitemap .= '<priority>0.7</priority>';
                $sitemap .= '</url>';
            }
        } catch (\Exception $e) {
            // Handle if agenda table doesn't exist or has different structure
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200, [
            'Content-Type' => 'application/xml; charset=utf-8'
        ]);
    }

    public function robots()
    {
        $robots = "User-agent: *\n";
        $robots .= "Allow: /\n";
        $robots .= "Disallow: /admin/\n";
        $robots .= "Disallow: /user/\n";
        $robots .= "Disallow: /login\n";
        $robots .= "Disallow: /register\n";
        $robots .= "Disallow: /storage/surat_jadi/\n";
        $robots .= "Disallow: /storage/lampiran/\n";
        $robots .= "\n";
        $robots .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($robots, 200, [
            'Content-Type' => 'text/plain; charset=utf-8'
        ]);
    }
}
