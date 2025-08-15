<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\BpdMember;

// Update specific positions with appropriate images
$ketua = BpdMember::where('position', 'ketua')->first();
if ($ketua) {
    $ketua->update(['photo' => 'ketua-bpd.svg']);
    echo "Updated Ketua BPD: {$ketua->name} with position-specific photo\n";
}

$sekretaris = BpdMember::where('position', 'sekretaris')->first();
if ($sekretaris) {
    $sekretaris->update(['photo' => 'sekretaris-bpd.svg']);
    echo "Updated Sekretaris BPD: {$sekretaris->name} with position-specific photo\n";
}

// Keep others with general sample
$others = BpdMember::whereNotIn('position', ['ketua', 'sekretaris'])->get();
foreach ($others as $member) {
    $member->update(['photo' => 'sample-member.svg']);
    echo "Updated {$member->position}: {$member->name} with general photo\n";
}

echo "All BPD member photos updated!\n";
