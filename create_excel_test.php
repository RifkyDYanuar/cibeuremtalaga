<?php

require_once 'vendor/autoload.php';

// Test creating Excel file
$headers = [
    'nik', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir',
    'alamat', 'rt', 'rw', 'agama', 'status_perkawinan', 'pekerjaan',
    'pendidikan', 'status_dalam_keluarga', 'nama_ayah', 'nama_ibu',
    'kewarganegaraan', 'no_kk', 'status', 'keterangan'
];

$sampleData = [
    [
        '1111111111111111', 'Test Excel User', 'Laki-laki', 'Jakarta', '1990-01-01',
        'Jl. Test Excel No. 123', '001', '001', 'Islam', 'Belum Kawin', 'Programmer',
        'Sarjana', 'Kepala Keluarga', 'Ayah Test', 'Ibu Test',
        'WNI', '1111111111111111', 'aktif', 'Test data from Excel'
    ]
];

$data = [$headers];
foreach ($sampleData as $row) {
    $data[] = $row;
}

try {
    require_once 'vendor/shuchkin/simplexlsxgen/src/SimpleXLSXGen.php';
    $xlsx = Shuchkin\SimpleXLSXGen::fromArray($data);
    $xlsx->saveAs('storage/app/public/sample_import.xlsx');
    echo "✓ Excel test file created successfully!\n";
} catch (Exception $e) {
    echo "✗ Error creating Excel file: " . $e->getMessage() . "\n";
}
