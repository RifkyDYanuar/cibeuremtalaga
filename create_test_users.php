<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Buat user admin test
User::create([
    'name' => 'Admin Test',
    'email' => 'admin@test.com',
    'password' => Hash::make('password'),
    'role' => 'admin'
]);

// Buat user regular test  
User::create([
    'name' => 'User Test',
    'email' => 'user@test.com',
    'password' => Hash::make('password'),
    'role' => 'user'
]);

echo "User test berhasil dibuat!\n";
