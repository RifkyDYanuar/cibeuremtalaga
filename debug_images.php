<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Pembangunan;
use App\Models\BpdMember;
use App\Models\BpdActivity;
use Illuminate\Support\Facades\Storage;

echo "=== DEBUGGING IMAGE SYSTEM ===\n\n";

// Check Pembangunan images
echo "--- PEMBANGUNAN IMAGES ---\n";
$pembangunan = Pembangunan::all();
foreach ($pembangunan as $p) {
    echo "Project: {$p->nama_proyek}\n";
    echo "Gambar field: " . json_encode($p->gambar) . "\n";
    
    if ($p->gambar) {
        foreach ($p->gambar as $image) {
            $path = 'pembangunan/' . $image;
            $exists = Storage::disk('public')->exists($path);
            $fullPath = storage_path('app/public/' . $path);
            echo "  - Image: {$image}\n";
            echo "  - Storage path: {$path}\n";
            echo "  - Exists: " . ($exists ? 'YES' : 'NO') . "\n";
            echo "  - Full path: {$fullPath}\n";
            echo "  - File exists on disk: " . (file_exists($fullPath) ? 'YES' : 'NO') . "\n";
        }
    }
    echo "Generated URLs: " . json_encode($p->gambar_urls) . "\n";
    echo "Main image URL: {$p->main_image_url}\n\n";
}

// Check BPD Member images
echo "--- BPD MEMBER IMAGES ---\n";
$members = BpdMember::all();
foreach ($members as $member) {
    echo "Member: {$member->name} ({$member->position})\n";
    echo "Photo field: {$member->photo}\n";
    
    if ($member->photo) {
        $path = 'bpd/members/' . $member->photo;
        $exists = Storage::disk('public')->exists($path);
        $fullPath = storage_path('app/public/' . $path);
        echo "  - Storage path: {$path}\n";
        echo "  - Exists: " . ($exists ? 'YES' : 'NO') . "\n";
        echo "  - Full path: {$fullPath}\n";
        echo "  - File exists on disk: " . (file_exists($fullPath) ? 'YES' : 'NO') . "\n";
    }
    echo "Photo URL: {$member->photo_url}\n\n";
}

// Check BPD Activity images
echo "--- BPD ACTIVITY IMAGES ---\n";
$activities = BpdActivity::all();
foreach ($activities as $activity) {
    echo "Activity: {$activity->title}\n";
    echo "Image field: {$activity->image}\n";
    
    if ($activity->image) {
        $path = 'bpd/activities/' . $activity->image;
        $exists = Storage::disk('public')->exists($path);
        $fullPath = storage_path('app/public/' . $path);
        echo "  - Storage path: {$path}\n";
        echo "  - Exists: " . ($exists ? 'YES' : 'NO') . "\n";
        echo "  - Full path: {$fullPath}\n";
        echo "  - File exists on disk: " . (file_exists($fullPath) ? 'YES' : 'NO') . "\n";
    }
    echo "Image URL: {$activity->image_url}\n\n";
}

echo "=== DEBUG COMPLETE ===\n";
