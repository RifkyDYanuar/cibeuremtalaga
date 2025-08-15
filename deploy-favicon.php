<?php
/**
 * Deploy Favicon Script
 * Memastikan favicon ada di lokasi yang tepat untuk hosting
 */

echo "🚀 Deploy Favicon untuk Hosting...\n\n";

// Path files
$sourceDir = __DIR__ . '/public';
$faviconFiles = [
    'favicon.ico' => $sourceDir . '/favicon.ico',
    'favicon.png' => $sourceDir . '/favicon.png',
    'logo.png' => $sourceDir . '/images/logo.png'
];

echo "📁 Checking files...\n";
foreach ($faviconFiles as $name => $path) {
    if (file_exists($path)) {
        $size = filesize($path);
        echo "✅ $name: " . number_format($size) . " bytes\n";
    } else {
        echo "❌ $name: NOT FOUND\n";
    }
}

echo "\n🔧 Recommendations for hosting:\n";
echo "1. Upload folder 'public' sebagai document root\n";
echo "2. Pastikan .htaccess ada di public folder\n";
echo "3. Set APP_URL di .env sesuai domain hosting\n";
echo "4. Jalankan: php artisan config:cache\n";
echo "5. Test favicon dengan: yourdomain.com/favicon.ico\n";

echo "\n📋 Favicon URLs yang harus accessible:\n";
echo "- https://yourdomain.com/favicon.ico\n";
echo "- https://yourdomain.com/favicon.png\n";
echo "- https://yourdomain.com/images/logo.png\n";

echo "\n🌐 Browser testing:\n";
echo "- Hard refresh: Ctrl+F5\n";
echo "- Incognito mode\n";
echo "- Different browsers\n";
echo "- Mobile devices\n";

// Create .htaccess rules for favicon
$htaccessRules = '
# Favicon rules
<IfModule mod_expires.c>
    ExpiresActive on
    ExpiresByType image/x-icon "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
</IfModule>

# Cache favicon
<IfModule mod_headers.c>
    <FilesMatch "\.(ico|png)$">
        Header set Cache-Control "public, max-age=31536000"
    </FilesMatch>
</IfModule>
';

echo "\n📝 Add these rules to your .htaccess:\n";
echo $htaccessRules;

?>
