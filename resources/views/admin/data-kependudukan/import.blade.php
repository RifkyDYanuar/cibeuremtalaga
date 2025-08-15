@extends('layouts.admin')

@section('title', 'Import Data Penduduk')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">
                    <i class="fas fa-upload mr-3 text-village-primary"></i>
                    Import Data Penduduk
                </h1>
                <p class="text-gray-600">Import data penduduk dari file Excel atau CSV</p>
            </div>
            <a href="{{ route('admin.data-kependudukan.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <i class="fas fa-check-circle mr-2"></i>
                    </div>
                    <div>
                        <strong class="font-bold">Sukses!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                    </div>
                    <div>
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                    </div>
                    <div>
                        <strong class="font-bold">Validation Error!</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Instructions Card -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-blue-800 mb-4">
                <i class="fas fa-info-circle mr-2"></i>
                Petunjuk Import Data
            </h2>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h3 class="font-semibold text-blue-700 mb-2">📋 Format File yang Didukung:</h3>
                    <ul class="text-blue-600 space-y-1">
                        <li>• Excel (.xlsx, .xls)</li>
                        <li>• CSV (.csv)</li>
                        <li>• Maksimal ukuran file: 10MB</li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-semibold text-blue-700 mb-2">📝 Kolom yang Diperlukan:</h3>
                    <ul class="text-blue-600 space-y-1">
                        <li>• <strong>nik</strong> (wajib, 16 digit)</li>
                        <li>• <strong>nama</strong> (wajib)</li>
                        <li>• jenis_kelamin, tempat_lahir, dll.</li>
                        <li>• Lihat template untuk detail lengkap</li>
                    </ul>
                </div>
            </div>

            <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded">
                <h4 class="font-semibold text-yellow-800 mb-2">⚠️ Penting - Format NIK dan No. KK:</h4>
                <ul class="text-yellow-700 text-sm space-y-1">
                    <li>• <strong>NIK harus 16 digit:</strong> Jika di Excel muncul scientific notation (1.23E+15), format kolom NIK sebagai TEXT</li>
                    <li>• <strong>Cara format TEXT di Excel:</strong> Pilih kolom NIK → Klik kanan → Format Cells → Text</li>
                    <li>• <strong>Alternatif:</strong> Tambahkan tanda kutip (') di depan NIK, contoh: '3201234567890123</li>
                    <li>• Pastikan header kolom sesuai dengan template</li>
                    <li>• Format tanggal: YYYY-MM-DD, DD/MM/YYYY, atau DD-MM-YYYY</li>
                    <li>• Data yang sudah ada (berdasarkan NIK) akan dilewati</li>
                </ul>
            </div>
        </div>

        <!-- Download Template -->
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">
                <i class="fas fa-download mr-2"></i>
                Download Template
            </h2>
            <p class="text-gray-600 mb-4">
                Download template Excel untuk memudahkan input data dengan format yang benar.
            </p>
            <a href="{{ route('admin.data-kependudukan.download-template') }}" 
               class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition-colors">
                <i class="fas fa-file-excel mr-2"></i>
                Download Template Excel
            </a>
        </div>

        <!-- Upload Form -->
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">
                <i class="fas fa-cloud-upload-alt mr-2"></i>
                Upload File Data
            </h2>
            
            <form action="{{ route('admin.data-kependudukan.import') }}" method="POST" enctype="multipart/form-data" id="importForm">
                @csrf
                
                <div class="mb-6">
                    <label for="file" class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih File Excel atau CSV
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-village-primary transition-colors" id="dropZone">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file" class="relative cursor-pointer bg-white rounded-md font-medium text-village-primary hover:text-village-secondary focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-village-primary">
                                    <span>Upload file</span>
                                    <input id="file" name="file" type="file" class="sr-only" accept=".xlsx,.xls,.csv" required>
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                Excel, CSV hingga 10MB
                            </p>
                        </div>
                    </div>
                    
                    <!-- File info display -->
                    <div id="fileInfo" class="mt-3 hidden">
                        <div class="flex items-center p-3 bg-gray-50 border border-gray-200 rounded-lg">
                            <i class="fas fa-file-excel text-green-600 mr-3"></i>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900" id="fileName"></p>
                                <p class="text-xs text-gray-500" id="fileSize"></p>
                            </div>
                            <button type="button" class="text-red-600 hover:text-red-800" onclick="clearFile()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Import Options -->
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-3">Opsi Import</h3>
                    <div class="space-y-3">
                        <label class="flex items-center">
                            <input type="checkbox" name="skip_duplicates" value="1" checked class="rounded border-gray-300 text-village-primary shadow-sm focus:border-village-primary focus:ring focus:ring-village-primary focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Lewati data duplikat (berdasarkan NIK)</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="validate_strict" value="1" class="rounded border-gray-300 text-village-primary shadow-sm focus:border-village-primary focus:ring focus:ring-village-primary focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Validasi ketat (stop jika ada error)</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="window.history.back()" 
                            class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </button>
                    <button type="submit" 
                            class="bg-village-primary hover:bg-village-secondary text-white px-6 py-3 rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed" 
                            id="submitBtn" disabled>
                        <i class="fas fa-upload mr-2"></i>
                        <span id="submitText">Import Data</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Loading Modal -->
<div id="loadingModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center h-full">
        <div class="bg-white rounded-lg p-8 text-center">
            <div class="animate-spin rounded-full h-16 w-16 border-b-2 border-village-primary mx-auto mb-4"></div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Mengimpor Data...</h3>
            <p class="text-gray-600">Mohon tunggu, proses import sedang berlangsung.</p>
            <div class="mt-4">
                <div class="bg-gray-200 rounded-full h-2">
                    <div class="bg-village-primary h-2 rounded-full animate-pulse" style="width: 70%"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('file');
    const dropZone = document.getElementById('dropZone');
    const fileInfo = document.getElementById('fileInfo');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const importForm = document.getElementById('importForm');
    const loadingModal = document.getElementById('loadingModal');

    // File input change handler
    fileInput.addEventListener('change', handleFileSelect);

    // Drag and drop handlers
    dropZone.addEventListener('dragover', handleDragOver);
    dropZone.addEventListener('drop', handleDrop);
    dropZone.addEventListener('dragleave', handleDragLeave);

    // Form submit handler
    importForm.addEventListener('submit', function(e) {
        if (!fileInput.files.length) {
            e.preventDefault();
            alert('Silakan pilih file terlebih dahulu');
            return;
        }

        // Show loading modal
        loadingModal.classList.remove('hidden');
        submitBtn.disabled = true;
        submitText.textContent = 'Mengimpor...';
    });

    function handleFileSelect(e) {
        const file = e.target.files[0];
        if (file) {
            displayFileInfo(file);
        }
    }

    function handleDragOver(e) {
        e.preventDefault();
        dropZone.classList.add('border-village-primary', 'bg-village-primary', 'bg-opacity-5');
    }

    function handleDragLeave(e) {
        e.preventDefault();
        dropZone.classList.remove('border-village-primary', 'bg-village-primary', 'bg-opacity-5');
    }

    function handleDrop(e) {
        e.preventDefault();
        dropZone.classList.remove('border-village-primary', 'bg-village-primary', 'bg-opacity-5');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            const file = files[0];
            
            // Check file type
            const validTypes = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 
                              'application/vnd.ms-excel', 'text/csv'];
            const validExtensions = ['.xlsx', '.xls', '.csv'];
            
            const fileExtension = '.' + file.name.split('.').pop().toLowerCase();
            
            if (validTypes.includes(file.type) || validExtensions.includes(fileExtension)) {
                fileInput.files = files;
                displayFileInfo(file);
            } else {
                alert('File harus berformat Excel (.xlsx, .xls) atau CSV (.csv)');
            }
        }
    }

    function displayFileInfo(file) {
        fileName.textContent = file.name;
        fileSize.textContent = formatFileSize(file.size);
        fileInfo.classList.remove('hidden');
        submitBtn.disabled = false;
        
        // Change icon based on file type
        const icon = fileInfo.querySelector('i');
        if (file.name.endsWith('.csv')) {
            icon.className = 'fas fa-file-csv text-blue-600 mr-3';
        } else {
            icon.className = 'fas fa-file-excel text-green-600 mr-3';
        }
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    window.clearFile = function() {
        fileInput.value = '';
        fileInfo.classList.add('hidden');
        submitBtn.disabled = true;
    };
});
</script>
@endsection
