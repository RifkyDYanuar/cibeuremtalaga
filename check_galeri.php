<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Galeri;

echo "=== Checking Galeri Data ===\n";

$galeris = Galeri::select('id', 'judul', 'gambar')->get();

foreach ($galeris as $galeri) {
    echo "ID: {$galeri->id} | Judul: {$galeri->judul} | Gambar: {$galeri->gambar}\n";
    
    // Check if file exists
    $imagePath = public_path('storage/galeri/' . $galeri->gambar);
    $exists = file_exists($imagePath) ? 'EXISTS' : 'NOT FOUND';
    echo "   File: {$imagePath} - {$exists}\n";
    echo "   URL: " . asset('storage/galeri/' . $galeri->gambar) . "\n\n";
}

echo "=== Storage Path Check ===\n";
echo "Storage Path: " . storage_path('app/public/galeri') . "\n";
echo "Public Storage Path: " . public_path('storage/galeri') . "\n";
echo "Storage Link Exists: " . (is_link(public_path('storage')) ? 'YES' : 'NO') . "\n";
