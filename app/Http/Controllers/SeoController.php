<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Agenda;

class SeoController extends Controller
{
    public function generateMetaTags($type, $slug = null)
    {
        $metaTags = [
            'title' => 'Desa Cibeureum Talaga - Sistem Informasi Desa',
            'description' => 'Portal resmi Desa Cibeureum Talaga dengan layanan informasi dan pelayanan online',
            'keywords' => 'desa cibeureum talaga, sistem informasi desa, pemerintah desa',
            'og_title' => 'Desa Cibeureum Talaga',
            'og_description' => 'Portal resmi Desa Cibeureum Talaga',
            'og_image' => asset('logo.svg'),
            'canonical' => url()->current()
        ];

        switch ($type) {
            case 'pengumuman':
                if ($slug) {
                    $pengumuman = Pengumuman::where('slug', $slug)->first();
                    if ($pengumuman) {
                        $metaTags['title'] = $pengumuman->judul . ' - Pengumuman Desa Cibeureum Talaga';
                        $metaTags['description'] = strip_tags(substr($pengumuman->isi, 0, 155)) . '...';
                        $metaTags['keywords'] = 'pengumuman desa, ' . strtolower($pengumuman->judul) . ', cibeureum talaga';
                        $metaTags['og_title'] = $pengumuman->judul;
                        $metaTags['og_description'] = strip_tags(substr($pengumuman->isi, 0, 155)) . '...';
                        if ($pengumuman->gambar) {
                            $metaTags['og_image'] = asset('storage/' . $pengumuman->gambar);
                        }
                    }
                } else {
                    $metaTags['title'] = 'Pengumuman - Desa Cibeureum Talaga';
                    $metaTags['description'] = 'Pengumuman terbaru dari Pemerintah Desa Cibeureum Talaga, Kecamatan Talaga, Kabupaten Majalengka';
                    $metaTags['keywords'] = 'pengumuman desa, berita desa, info desa cibeureum talaga';
                }
                break;

            case 'agenda':
                if ($slug) {
                    $agenda = Agenda::where('slug', $slug)->first();
                    if ($agenda) {
                        $metaTags['title'] = $agenda->nama_kegiatan . ' - Agenda Desa Cibeureum Talaga';
                        $metaTags['description'] = strip_tags(substr($agenda->deskripsi, 0, 155)) . '...';
                        $metaTags['keywords'] = 'agenda desa, kegiatan desa, ' . strtolower($agenda->nama_kegiatan);
                        $metaTags['og_title'] = $agenda->nama_kegiatan;
                        $metaTags['og_description'] = strip_tags(substr($agenda->deskripsi, 0, 155)) . '...';
                    }
                } else {
                    $metaTags['title'] = 'Agenda Kegiatan - Desa Cibeureum Talaga';
                    $metaTags['description'] = 'Agenda kegiatan Pemerintah Desa Cibeureum Talaga, Kecamatan Talaga, Kabupaten Majalengka';
                    $metaTags['keywords'] = 'agenda desa, kegiatan desa, jadwal kegiatan cibeureum talaga';
                }
                break;

            case 'apbdes':
                $metaTags['title'] = 'APBDes - Anggaran Pendapatan dan Belanja Desa Cibeureum Talaga';
                $metaTags['description'] = 'Informasi APBDes (Anggaran Pendapatan dan Belanja Desa) Cibeureum Talaga - Transparansi keuangan desa';
                $metaTags['keywords'] = 'apbdes, anggaran desa, keuangan desa, transparansi, cibeureum talaga';
                break;

            case 'profil':
                $metaTags['title'] = 'Profil Desa - Desa Cibeureum Talaga';
                $metaTags['description'] = 'Profil lengkap Desa Cibeureum, Kecamatan Talaga, Kabupaten Majalengka - Sejarah, visi misi, dan struktur pemerintahan';
                $metaTags['keywords'] = 'profil desa, sejarah desa, visi misi desa, struktur pemerintahan, cibeureum talaga';
                break;

            case 'contact':
                $metaTags['title'] = 'Kontak - Desa Cibeureum Talaga';
                $metaTags['description'] = 'Hubungi Pemerintah Desa Cibeureum Talaga - Alamat, telepon, dan informasi kontak lainnya';
                $metaTags['keywords'] = 'kontak desa, alamat desa, telepon desa, pemerintah cibeureum talaga';
                break;
        }

        return $metaTags;
    }

    public function generateStructuredData($type, $data = null)
    {
        $baseData = [
            "@context" => "https://schema.org",
            "@type" => "GovernmentOrganization",
            "name" => "Desa Cibeureum Talaga",
            "url" => "https://cibeureumtalaga.id"
        ];

        switch ($type) {
            case 'pengumuman':
                if ($data) {
                    return [
                        "@context" => "https://schema.org",
                        "@type" => "NewsArticle",
                        "headline" => $data->judul,
                        "description" => strip_tags(substr($data->isi, 0, 155)),
                        "author" => [
                            "@type" => "Organization",
                            "name" => "Pemerintah Desa Cibeureum Talaga"
                        ],
                        "publisher" => [
                            "@type" => "Organization",
                            "name" => "Desa Cibeureum Talaga",
                            "url" => "https://cibeureumtalaga.id"
                        ],
                        "datePublished" => $data->created_at->toISOString(),
                        "dateModified" => $data->updated_at->toISOString(),
                        "url" => url('pengumuman/' . $data->slug)
                    ];
                }
                break;

            case 'agenda':
                if ($data) {
                    return [
                        "@context" => "https://schema.org",
                        "@type" => "Event",
                        "name" => $data->nama_kegiatan,
                        "description" => strip_tags($data->deskripsi),
                        "startDate" => $data->tanggal_mulai,
                        "endDate" => $data->tanggal_selesai,
                        "location" => [
                            "@type" => "Place",
                            "name" => $data->tempat,
                            "address" => "Desa Cibeureum, Talaga, Majalengka"
                        ],
                        "organizer" => [
                            "@type" => "Organization",
                            "name" => "Pemerintah Desa Cibeureum Talaga",
                            "url" => "https://cibeureumtalaga.id"
                        ]
                    ];
                }
                break;
        }

        return $baseData;
    }
}
