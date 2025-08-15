<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\BpdMember;
use App\Models\BpdActivity;

// Update BPD member with sample image
$member = BpdMember::first();
if ($member) {
    $member->update(['photo' => 'sample-member.svg']);
    echo "Updated BPD member: {$member->name} with photo\n";
}

// Update BPD activity with sample image
$activity = BpdActivity::first();
if ($activity) {
    $activity->update(['image' => 'sample-activity.svg']);
    echo "Updated BPD activity: {$activity->title} with image\n";
}

echo "All BPD updates completed!\n";
