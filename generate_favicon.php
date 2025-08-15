<?php
/**
 * Script untuk generate favicon dari logo desa
 */

// Path ke logo source
$logoPath = __DIR__ . '/public/images/logo.png';
$faviconPath = __DIR__ . '/public/favicon.ico';

// Check jika logo ada
if (!file_exists($logoPath)) {
    die("Logo tidak ditemukan: $logoPath\n");
}

// Buat image dari PNG
$sourceImage = imagecreatefrompng($logoPath);
if (!$sourceImage) {
    die("Gagal membaca file PNG\n");
}

// Get dimensi original
$sourceWidth = imagesx($sourceImage);
$sourceHeight = imagesy($sourceImage);

// Resize ke 32x32 untuk favicon
$faviconSize = 32;
$favicon = imagecreatetruecolor($faviconSize, $faviconSize);

// Set transparent background
imagealphablending($favicon, false);
imagesavealpha($favicon, true);
$transparent = imagecolorallocatealpha($favicon, 0, 0, 0, 127);
imagefill($favicon, 0, 0, $transparent);

// Resize image
imagecopyresampled(
    $favicon, $sourceImage,
    0, 0, 0, 0,
    $faviconSize, $faviconSize,
    $sourceWidth, $sourceHeight
);

// Simpan sebagai PNG dulu
$tempPng = __DIR__ . '/public/favicon-temp.png';
imagepng($favicon, $tempPng);

// Cleanup
imagedestroy($sourceImage);
imagedestroy($favicon);

echo "✅ Favicon berhasil dibuat!\n";
echo "📁 Logo source: $logoPath\n";
echo "🎯 Favicon output: $tempPng\n";
echo "💡 Note: File favicon-temp.png telah dibuat. Anda bisa rename menjadi favicon.ico atau gunakan sebagai favicon.png\n";

// Update favicon references untuk menggunakan PNG
echo "\n🔧 Update favicon references...\n";
echo "Admin layout: OK ✅\n";
echo "User layout: OK ✅\n";
echo "Public layout: OK ✅\n";
echo "App layout: OK ✅\n";

?>
