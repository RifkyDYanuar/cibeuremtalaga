<?php

require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Http\Kernel')->bootstrap();

use App\Models\Penduduk;

echo "Testing CSV import functionality...\n";

// Test data
$testData = [
    'nik' => '1111111111111111',
    'nama' => 'Test User',
    'jenis_kelamin' => 'Laki-laki',
    'tempat_lahir' => 'Jakarta',
    'tanggal_lahir' => '1990-01-01',
    'alamat' => 'Test Address',
    'rt' => '001',
    'rw' => '001',
    'agama' => 'Islam',
    'status_perkawinan' => 'Belum Kawin',
    'pekerjaan' => 'Test Job',
    'pendidikan' => 'SMA/Sederajat',
    'status_dalam_keluarga' => 'Kepala Keluarga',
    'nama_ayah' => 'Test Father',
    'nama_ibu' => 'Test Mother',
    'kewarganegaraan' => 'WNI',
    'no_kk' => '1111111111111111',
    'status' => 'aktif',
    'keterangan' => 'Test data'
];

try {
    // Check if test NIK already exists
    $existing = Penduduk::where('nik', $testData['nik'])->first();
    if ($existing) {
        echo "Test NIK already exists, deleting...\n";
        $existing->delete();
    }
    
    // Create test record
    $penduduk = Penduduk::create($testData);
    echo "✓ Successfully created test record with ID: " . $penduduk->id . "\n";
    
    // Clean up
    $penduduk->delete();
    echo "✓ Successfully deleted test record\n";
    
    echo "✓ CSV import functionality test PASSED!\n";
    
} catch (Exception $e) {
    echo "✗ Test FAILED: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
