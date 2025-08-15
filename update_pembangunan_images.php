<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Pembangunan;

// Update jalan project
$jalan = Pembangunan::where('nama_proyek', 'like', '%Jalan%')->first();
if ($jalan) {
    $jalan->update(['gambar' => ['sample-jalan.svg']]);
    echo "Updated jalan project with image\n";
}

// Update balai project  
$balai = Pembangunan::where('nama_proyek', 'like', '%Balai%')->first();
if ($balai) {
    $balai->update(['gambar' => ['sample-balai.svg']]);
    echo "Updated balai project with image\n";
}

echo "All updates completed!\n";
