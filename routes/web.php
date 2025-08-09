<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\DataKependudukanController;
use App\Http\Controllers\ApbdesController;
use Illuminate\Support\Facades\Auth;

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Custom Login Routes (menggantikan Auth::routes yang bermasalah)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [HomeController::class, 'processLogin'])->name('login.process');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [HomeController::class, 'processRegister'])->name('register.process');

Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

// Routes untuk halaman publik
Route::get('/tentang', [PublicPageController::class, 'tentang'])->name('public.tentang');
Route::get('/berita', [PublicPageController::class, 'berita'])->name('public.berita'); 
Route::get('/berita/{pengumuman}', [PublicPageController::class, 'beritaDetail'])->name('public.berita.detail');
Route::get('/kontak', [PublicPageController::class, 'kontak'])->name('public.kontak');
Route::post('/kontak', [PublicPageController::class, 'storeKontak'])->name('public.kontak.store');
Route::get('/layanan/detail', [PublicPageController::class, 'layananDetail'])->name('public.layanan-detail');
Route::get('/panduan', [PublicPageController::class, 'panduan'])->name('public.panduan');
Route::get('/data-kependudukan', [DataKependudukanController::class, 'publicIndex'])->name('public.data-kependudukan');
Route::get('/apbdes', [ApbdesController::class, 'publicIndex'])->name('public.apbdes');
Route::get('/apbdes/export/pdf', [ApbdesController::class, 'exportPdf'])->name('public.apbdes.export.pdf');

Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard')->middleware('auth');
Route::get('/user/pengajuan/form', [UserController::class, 'formPengajuan'])->name('user.pengajuan.form');
Route::post('/user/pengajuan/form', [UserController::class, 'storePengajuan']);
Route::get('/user/riwayat', [UserController::class, 'riwayat'])->name('user.riwayat');
Route::get('/user/pengajuan/{id}', [UserController::class, 'detail'])->name('user.pengajuan.detail');

// Routes untuk user pengumuman
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('pengumuman', [PengumumanController::class, 'userIndex'])->name('user.pengumuman.index');
    Route::get('pengumuman/{pengumuman}', [PengumumanController::class, 'userShow'])->name('user.pengumuman.show');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
Route::get('/admin/pengajuan', [AdminController::class, 'listPengajuan'])->name('admin.pengajuan.list');
Route::get('/admin/pengajuan/{id}', [AdminController::class, 'detailPengajuan'])->name('admin.pengajuan.detail');
Route::post('/admin/pengajuan/{id}/update', [AdminController::class, 'updatePengajuan'])->name('admin.pengajuan.update');
Route::get('/admin/master/jenis-surat', [MasterDataController::class, 'index'])->name('admin.master.jenis_surat');
Route::post('/admin/master/jenis-surat', [MasterDataController::class, 'store'])->name('admin.master.jenis_surat.store');
Route::delete('/admin/master/jenis-surat/{id}', [MasterDataController::class, 'destroy'])->name('admin.master.jenis_surat.destroy');
Route::put('/admin/master/jenis-surat/{id}', [MasterDataController::class, 'update'])->name('admin.master.jenis_surat.update')->middleware('auth');
Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan')->middleware('auth');
Route::get('/admin/laporan/export/excel', [LaporanController::class, 'exportExcel'])->name('admin.laporan.export.excel')->middleware('auth');
Route::get('/admin/laporan/export/pdf', [LaporanController::class, 'exportPDF'])->name('admin.laporan.export.pdf')->middleware('auth');

// Routes untuk manajemen user admin
Route::get('/admin/users', [UserManagementController::class, 'index'])->name('admin.users.index')->middleware('auth');
Route::get('/admin/users/create', [UserManagementController::class, 'create'])->name('admin.users.create')->middleware('auth');
Route::post('/admin/users', [UserManagementController::class, 'store'])->name('admin.users.store')->middleware('auth');
Route::get('/admin/users/{user}', [UserManagementController::class, 'show'])->name('admin.users.show')->middleware('auth');
Route::get('/admin/users/{user}/edit', [UserManagementController::class, 'edit'])->name('admin.users.edit')->middleware('auth');
Route::put('/admin/users/{user}', [UserManagementController::class, 'update'])->name('admin.users.update')->middleware('auth');
Route::delete('/admin/users/{user}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy')->middleware('auth');

// Routes untuk admin pengumuman
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('pengumuman', PengumumanController::class)->names([
        'index' => 'admin.pengumuman.index',
        'create' => 'admin.pengumuman.create',
        'store' => 'admin.pengumuman.store',
        'show' => 'admin.pengumuman.show',
        'edit' => 'admin.pengumuman.edit',
        'update' => 'admin.pengumuman.update',
        'destroy' => 'admin.pengumuman.destroy'
    ]);
    
    // Routes untuk admin agenda
    Route::resource('agenda', AgendaController::class)->names([
        'index' => 'admin.agenda.index',
        'create' => 'admin.agenda.create',
        'store' => 'admin.agenda.store',
        'show' => 'admin.agenda.show',
        'edit' => 'admin.agenda.edit',
        'update' => 'admin.agenda.update',
        'destroy' => 'admin.agenda.destroy'
    ]);
    
    // Routes untuk export data kependudukan
    Route::get('data-kependudukan/export/excel', [DataKependudukanController::class, 'exportExcel'])->name('admin.data-kependudukan.export.excel');
    Route::get('data-kependudukan/export/pdf', [DataKependudukanController::class, 'exportPdf'])->name('admin.data-kependudukan.export.pdf');
    
    // Routes untuk admin data kependudukan dengan parameter yang benar
    Route::resource('data-kependudukan', DataKependudukanController::class)->parameters([
        'data-kependudukan' => 'penduduk'
    ])->names([
        'index' => 'admin.data-kependudukan.index',
        'create' => 'admin.data-kependudukan.create',
        'store' => 'admin.data-kependudukan.store',
        'show' => 'admin.data-kependudukan.show',
        'edit' => 'admin.data-kependudukan.edit',
        'update' => 'admin.data-kependudukan.update',
        'destroy' => 'admin.data-kependudukan.destroy'
    ]);
    
    // Routes untuk admin APBDES dengan middleware yang benar
    Route::get('apbdes', [ApbdesController::class, 'index'])->name('admin.apbdes.index');
    Route::get('apbdes/create', [ApbdesController::class, 'create'])->name('admin.apbdes.create');
    Route::post('apbdes', [ApbdesController::class, 'store'])->name('admin.apbdes.store');
    Route::get('apbdes/{apbdes}', [ApbdesController::class, 'show'])->name('admin.apbdes.show');
    Route::get('apbdes/{apbdes}/edit', [ApbdesController::class, 'edit'])->name('admin.apbdes.edit');
    Route::put('apbdes/{apbdes}', [ApbdesController::class, 'update'])->name('admin.apbdes.update');
    Route::delete('apbdes/{apbdes}', [ApbdesController::class, 'destroy'])->name('admin.apbdes.destroy');
    
    // API routes untuk APBDES
    Route::get('apbdes/api/stats', [ApbdesController::class, 'getStats'])->name('admin.apbdes.api.stats');
    Route::post('apbdes/bulk/status', [ApbdesController::class, 'bulkUpdateStatus'])->name('admin.apbdes.bulk.status');
    Route::post('apbdes/bulk/delete', [ApbdesController::class, 'bulkDelete'])->name('admin.apbdes.bulk.delete');
});

Route::get('/pengumuman-public', [PengumumanController::class, 'publicIndex'])->name('pengumuman.public');
Route::get('/pengumuman-public/{id}', [PengumumanController::class, 'publicShow'])->name('pengumuman.public.show');

// Routes untuk public agenda
Route::get('/agenda-public', [AgendaController::class, 'publicIndex'])->name('agenda.public');
Route::get('/agenda-public/{id}', [AgendaController::class, 'publicShow'])->name('agenda.public.show');
Route::get('/agenda/{id}', [AgendaController::class, 'publicShow'])->name('agenda.show');

// Routes untuk public pengumuman
Route::get('/pengumuman-public', [PengumumanController::class, 'publicIndex'])->name('pengumuman.public');
Route::get('/pengumuman-public/{id}', [PengumumanController::class, 'publicShow'])->name('pengumuman.public.show');

// Route untuk serve file storage dengan authentication
Route::get('/storage/surat_jadi/{filename}', function ($filename) {
    $path = storage_path('app/public/surat_jadi/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    return response()->file($path);
})->middleware('auth')->name('storage.surat_jadi');

Route::get('/storage/lampiran/{filename}', function ($filename) {
    $path = storage_path('app/public/lampiran/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    return response()->file($path);
})->middleware('auth')->name('storage.lampiran');

// SEO Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

// Google Search Console Verification
Route::get('/googlec7b4b7f9c8e2e7c3.html', function () {
    return response()->file(public_path('googlec7b4b7f9c8e2e7c3.html'));
})->name('google.verification');

// Tidak ada middleware auth/role, semua route bebas diakses
// Route logout sudah otomatis oleh Auth::routes()