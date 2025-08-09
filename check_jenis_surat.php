<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\JenisSurat;

$jenisSurats = JenisSurat::all();

echo "ID - Nama Jenis Surat\n";
echo "====================\n";

foreach ($jenisSurats as $jenis) {
    echo $jenis->id . " - " . $jenis->nama . "\n";
}
