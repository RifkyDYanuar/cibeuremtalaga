<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\BpdMember;
use App\Models\BpdActivity;

echo "=== FIXING IMAGE PATHS ===\n";

// Fix BPD Member with double path
$members = BpdMember::all();
foreach ($members as $member) {
    if ($member->photo && strpos($member->photo, 'bpd/members/') === 0) {
        // Remove the folder prefix, keep only filename
        $filename = str_replace('bpd/members/', '', $member->photo);
        $member->update(['photo' => $filename]);
        echo "Fixed member {$member->name}: {$member->photo} -> {$filename}\n";
    }
}

// Fix BPD Activity with double path (if any)
$activities = BpdActivity::all();
foreach ($activities as $activity) {
    if ($activity->image && strpos($activity->image, 'bpd/activities/') === 0) {
        // Remove the folder prefix, keep only filename
        $filename = str_replace('bpd/activities/', '', $activity->image);
        $activity->update(['image' => $filename]);
        echo "Fixed activity {$activity->title}: {$activity->image} -> {$filename}\n";
    }
}

echo "=== FIXING COMPLETE ===\n";
