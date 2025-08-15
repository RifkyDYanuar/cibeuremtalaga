<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BpdMember;
use App\Models\BpdActivity;

class BpdSeeder extends Seeder
{
    public function run()
    {
        // Additional BPD Members
        $members = [
            [
                'name' => 'Siti Nurhasanah',
                'position' => 'ketua',
                'phone' => '081234567890',
                'email' => 'ketua.bpd@cibeureumtalaga.id',
                'bio' => 'Ketua BPD Desa Cibeureum Talaga yang berpengalaman dalam mengawal kebijakan pembangunan desa.',
                'photo' => 'sample-member.svg',
            ],
            [
                'name' => 'Ahmad Hidayat',
                'position' => 'wakil',
                'phone' => '081234567891',
                'email' => 'wakil.bpd@cibeureumtalaga.id', 
                'bio' => 'Wakil Ketua BPD yang aktif dalam penyerapan aspirasi masyarakat.',
                'photo' => 'sample-member.svg',
            ],
            [
                'name' => 'Rina Kartika',
                'position' => 'sekretaris',
                'phone' => '081234567892',
                'email' => 'sekretaris.bpd@cibeureumtalaga.id',
                'bio' => 'Sekretaris BPD yang mengelola administrasi dan dokumentasi kegiatan.',
                'photo' => 'sample-member.svg',
            ],
        ];

        foreach ($members as $member) {
            BpdMember::firstOrCreate(['email' => $member['email']], $member);
        }

        // Additional BPD Activities
        $activities = [
            [
                'title' => 'Rapat Koordinasi Bulanan',
                'description' => 'Rapat koordinasi rutin BPD membahas program kerja dan evaluasi kegiatan bulan sebelumnya.',
                'category' => 'rapat',
                'activity_date' => '2025-08-01',
                'location' => 'Balai Desa Cibeureum Talaga',
                'image' => 'sample-activity.svg',
            ],
            [
                'title' => 'Musyawarah Desa RPJM',
                'description' => 'Musyawarah membahas Rencana Pembangunan Jangka Menengah Desa periode 2025-2030.',
                'category' => 'musyawarah',
                'activity_date' => '2025-07-15',
                'location' => 'Aula Desa',
                'image' => 'sample-activity.svg',
            ],
            [
                'title' => 'Penyerapan Aspirasi Masyarakat',
                'description' => 'Kegiatan menampung aspirasi dan usulan program dari seluruh RT/RW di desa.',
                'category' => 'aspirasi',
                'activity_date' => '2025-07-20',
                'location' => 'Keliling RT/RW',
                'image' => 'sample-activity.svg',
            ],
            [
                'title' => 'Monitoring Pembangunan Jalan',
                'description' => 'Monitoring dan evaluasi progress pembangunan jalan desa yang sedang berjalan.',
                'category' => 'monitoring',
                'activity_date' => '2025-08-05',
                'location' => 'Lokasi Proyek Jalan',
                'image' => 'sample-activity.svg',
            ],
        ];

        foreach ($activities as $activity) {
            BpdActivity::firstOrCreate(['title' => $activity['title']], $activity);
        }
    }
}
