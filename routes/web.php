<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\DataKependudukanController;
use App\Http\Controllers\ApbdesController;
use App\Http\Controllers\MaintenanceController;
use Illuminate\Support\Facades\Auth;

// Maintenance routes (accessible anytime for preview)
Route::get('/maintenance', [MaintenanceController::class, 'show'])->name('maintenance');
Route::get('/maintenance-preview', [MaintenanceController::class, 'show'])->name('maintenance.preview');
Route::get('/maintenance-status', [MaintenanceController::class, 'status'])->name('maintenance.status');

// Admin maintenance management routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/maintenance', [App\Http\Controllers\Admin\MaintenanceManagementController::class, 'index'])->name('admin.maintenance.index');
    Route::post('/artisan/maintenance/on', [App\Http\Controllers\Admin\MaintenanceManagementController::class, 'enable'])->name('admin.maintenance.enable');
    Route::post('/artisan/maintenance/off', [App\Http\Controllers\Admin\MaintenanceManagementController::class, 'disable'])->name('admin.maintenance.disable');
    Route::post('/artisan/maintenance/add-ip', [App\Http\Controllers\Admin\MaintenanceManagementController::class, 'addIP'])->name('admin.maintenance.add-ip');
    Route::post('/artisan/maintenance/remove-ip', [App\Http\Controllers\Admin\MaintenanceManagementController::class, 'removeIP'])->name('admin.maintenance.remove-ip');
    Route::get('/artisan/maintenance/list-ips', [App\Http\Controllers\Admin\MaintenanceManagementController::class, 'listIPs'])->name('admin.maintenance.list-ips');
});

// API route for current IP (accessible without auth for maintenance page)
Route::get('/api/current-ip', [App\Http\Controllers\Admin\MaintenanceManagementController::class, 'getCurrentIP'])->name('api.current-ip');

// Apply maintenance middleware only to specific routes when needed
Route::middleware(['maintenance'])->group(function () {
    // Add routes here that should be affected by maintenance mode
    // Example: Route::get('/some-route', [SomeController::class, 'method']);
});

// Admin maintenance control routes
Route::middleware(['auth'])->prefix('admin/maintenance')->name('admin.maintenance.')->group(function () {
    Route::get('/', function () {
        return view('admin.maintenance');
    })->name('index');
    Route::post('/enable', [MaintenanceController::class, 'enable'])->name('enable');
    Route::post('/disable', [MaintenanceController::class, 'disable'])->name('disable');
    Route::get('/info', [MaintenanceController::class, 'info'])->name('info');
});

// Halaman utama
Route::get('/', function () {
    $pengumuman = \App\Models\Pengumuman::latest()->take(5)->get();
    $agenda = \App\Models\Agenda::where('tanggal_mulai', '>=', now())->orderBy('tanggal_mulai')->take(3)->get();
    
    // Ambil data IDM terbaru untuk ditampilkan di welcome
    $latestIdm = \App\Models\IdmDesa::where('is_published', true)
        ->orderBy('tahun', 'desc')
        ->first();
    
    return view('welcome', compact('pengumuman', 'agenda', 'latestIdm'));
})->name('welcome');

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

// Routes untuk pengajuan user (sederhana)
Route::get('/user/pengajuan/form', [UserController::class, 'formPengajuan'])->name('user.pengajuan.form')->middleware('auth');
Route::post('/user/pengajuan/form', [UserController::class, 'storePengajuan'])->middleware('auth');
Route::get('/user/riwayat', [UserController::class, 'riwayat'])->name('user.riwayat')->middleware('auth');
Route::get('/user/pengajuan/{id}', [UserController::class, 'detail'])->name('user.pengajuan.detail')->middleware('auth');

// Routes untuk user pengumuman
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('pengumuman', [PengumumanController::class, 'userIndex'])->name('user.pengumuman.index');
    Route::get('pengumuman/{pengumuman}', [PengumumanController::class, 'userShow'])->name('user.pengumuman.show');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');

// Routes untuk admin pengajuan (sederhana)
Route::get('/admin/pengajuan', [AdminController::class, 'listPengajuan'])->name('admin.pengajuan.list')->middleware('auth');
Route::get('/admin/pengajuan/{id}', [AdminController::class, 'detailPengajuan'])->name('admin.pengajuan.detail')->middleware('auth');
Route::post('/admin/pengajuan/{id}/update', [AdminController::class, 'updatePengajuan'])->name('admin.pengajuan.update')->middleware('auth');
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
    
    // Routes untuk import data kependudukan
    Route::get('data-kependudukan/import', [DataKependudukanController::class, 'importForm'])->name('admin.data-kependudukan.import-form');
    Route::post('data-kependudukan/import', [DataKependudukanController::class, 'import'])->name('admin.data-kependudukan.import');
    Route::get('data-kependudukan/download-template', [DataKependudukanController::class, 'downloadTemplate'])->name('admin.data-kependudukan.download-template');
    Route::delete('data-kependudukan/bulk-delete', [DataKependudukanController::class, 'bulkDelete'])->name('admin.data-kependudukan.bulk-delete');
    
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
    
    // Routes untuk admin BPD
    Route::prefix('bpd')->name('admin.bpd.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\BpdController::class, 'index'])->name('index');
        
        // Members management
        Route::get('members', [\App\Http\Controllers\Admin\BpdController::class, 'members'])->name('members');
        Route::get('members/create', [\App\Http\Controllers\Admin\BpdController::class, 'createMember'])->name('members.create');
        Route::post('members', [\App\Http\Controllers\Admin\BpdController::class, 'storeMember'])->name('members.store');
        Route::delete('members/bulk-delete', [\App\Http\Controllers\Admin\BpdController::class, 'bulkDestroyMembers'])->name('members.bulk-delete');
        Route::get('members/{id}/edit', [\App\Http\Controllers\Admin\BpdController::class, 'editMember'])->name('members.edit');
        Route::put('members/{id}', [\App\Http\Controllers\Admin\BpdController::class, 'updateMember'])->name('members.update');
        Route::delete('members/{id}', [\App\Http\Controllers\Admin\BpdController::class, 'destroyMember'])->name('members.destroy');
        
        // Activities management
        Route::get('activities', [\App\Http\Controllers\Admin\BpdController::class, 'activities'])->name('activities');
        Route::get('activities/create', [\App\Http\Controllers\Admin\BpdController::class, 'createActivity'])->name('activities.create');
        Route::post('activities', [\App\Http\Controllers\Admin\BpdController::class, 'storeActivity'])->name('activities.store');
        Route::delete('activities/bulk-delete', [\App\Http\Controllers\Admin\BpdController::class, 'bulkDestroyActivities'])->name('activities.bulk-delete');
        Route::get('activities/{id}/edit', [\App\Http\Controllers\Admin\BpdController::class, 'editActivity'])->name('activities.edit');
        Route::put('activities/{id}', [\App\Http\Controllers\Admin\BpdController::class, 'updateActivity'])->name('activities.update');
        Route::delete('activities/{id}', [\App\Http\Controllers\Admin\BpdController::class, 'destroyActivity'])->name('activities.destroy');
        
        // Content management
        Route::get('content', [\App\Http\Controllers\Admin\BpdController::class, 'content'])->name('content');
        Route::post('content', [\App\Http\Controllers\Admin\BpdController::class, 'storeContent'])->name('content.store');
    });
    
    // Routes untuk admin Pembangunan
    Route::prefix('pembangunan')->name('admin.pembangunan.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\PembangunanController::class, 'index'])->name('index');
        Route::get('create', [\App\Http\Controllers\Admin\PembangunanController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\PembangunanController::class, 'store'])->name('store');
        Route::delete('bulk-delete', [\App\Http\Controllers\Admin\PembangunanController::class, 'bulkDestroy'])->name('bulk-delete');
        Route::get('{id}', [\App\Http\Controllers\Admin\PembangunanController::class, 'show'])->name('show');
        Route::get('{id}/edit', [\App\Http\Controllers\Admin\PembangunanController::class, 'edit'])->name('edit');
        Route::put('{id}', [\App\Http\Controllers\Admin\PembangunanController::class, 'update'])->name('update');
        Route::delete('{id}', [\App\Http\Controllers\Admin\PembangunanController::class, 'destroy'])->name('destroy');
    });
    
    // Routes untuk admin Galeri
    Route::resource('galeri', \App\Http\Controllers\Admin\GaleriController::class)->names([
        'index' => 'admin.galeri.index',
        'create' => 'admin.galeri.create',
        'store' => 'admin.galeri.store',
        'show' => 'admin.galeri.show',
        'edit' => 'admin.galeri.edit',
        'update' => 'admin.galeri.update',
        'destroy' => 'admin.galeri.destroy'
    ]);
    Route::delete('galeri/bulk-delete', [\App\Http\Controllers\Admin\GaleriController::class, 'bulkDestroy'])->name('admin.galeri.bulk-delete');
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

// Google Search Console Verification (Domain property)
Route::get('/googlec7b4b7f9c8e2e7c3.html', function () {
    return response()->file(public_path('googlec7b4b7f9c8e2e7c3.html'));
})->name('google.verification');

// Tidak ada middleware auth/role, semua route bebas diakses
// Route logout sudah otomatis oleh Auth::routes()

// Test BPD Route
Route::get('/test-bpd', function () {
    return view('bpd', [
        'members' => collect(),
        'activities' => collect(),
        'profil' => null,
        'visi' => null,
        'misi' => null,
        'dasar_hukum' => null,
        'contact_phone' => null,
        'contact_email' => null,
        'contact_address' => null,
        'jam_pelayanan' => null
    ]);
});

// Halaman BPD
Route::get('/bpd', function () {
    $members = \App\Models\BpdMember::orderBy('name', 'asc')->get();
    $activities = \App\Models\BpdActivity::latest()->take(6)->get();
    
    // Get content data using key field
    $content = \App\Models\BpdContent::pluck('content', 'key');
    
    $profil = $content['bpd_profil'] ?? null;
    $visi = $content['bpd_visi'] ?? null;
    $misi = $content['bpd_misi'] ?? null;
    $dasar_hukum = $content['bpd_dasar_hukum'] ?? null;
    $contact_phone = $content['bpd_contact_phone'] ?? null;
    $contact_email = $content['bpd_contact_email'] ?? null;
    $contact_address = $content['bpd_contact_address'] ?? null;
    $jam_pelayanan = $content['bpd_jam_pelayanan'] ?? null;
    
    return view('bpd', compact(
        'members', 'activities', 'profil', 'visi', 'misi', 'dasar_hukum',
        'contact_phone', 'contact_email', 'contact_address', 'jam_pelayanan'
    ));
})->name('public.bpd');

// Halaman Pembangunan Desa (public)
Route::get('/pembangunan', function () {
    $pembangunan = \App\Models\Pembangunan::published()->latest()->paginate(12);
    $stats = [
        'total' => \App\Models\Pembangunan::published()->count(),
        'selesai' => \App\Models\Pembangunan::published()->where('status', 'selesai')->count(),
        'proses' => \App\Models\Pembangunan::published()->where('status', 'proses')->count(),
        'total_anggaran' => \App\Models\Pembangunan::published()->sum('anggaran')
    ];
    
    return view('public.pembangunan', compact('pembangunan', 'stats'));
})->name('public.pembangunan');

Route::get('/pembangunan/{id}', function ($id) {
    $pembangunan = \App\Models\Pembangunan::published()->findOrFail($id);
    $related = \App\Models\Pembangunan::published()
        ->where('kategori', $pembangunan->kategori)
        ->where('id', '!=', $id)
        ->latest()->take(3)->get();
    
    return view('public.pembangunan-detail', compact('pembangunan', 'related'));
})->name('public.pembangunan.detail');

// Redirect tentang-desa ke tentang
Route::get('/tentang-desa', function () {
    return redirect('/tentang');
})->name('public.tentang-desa');

// Halaman Pembangunan (public)
Route::get('/pembangunan', function () {
    $pembangunan = \App\Models\Pembangunan::published()->latest()->paginate(9);
    
    // Statistics
    $stats = [
        'total' => \App\Models\Pembangunan::published()->count(),
        'selesai' => \App\Models\Pembangunan::published()->where('status', 'selesai')->count(),
        'proses' => \App\Models\Pembangunan::published()->where('status', 'proses')->count(),
        'total_anggaran' => \App\Models\Pembangunan::published()->sum('anggaran'),
    ];
    
    return view('public.pembangunan', compact('pembangunan', 'stats'));
})->name('public.pembangunan');

// Detail Pembangunan (public)
Route::get('/pembangunan/{id}', function ($id) {
    $pembangunan = \App\Models\Pembangunan::published()->findOrFail($id);
    $related = \App\Models\Pembangunan::published()
                    ->where('id', '!=', $id)
                    ->where('kategori', $pembangunan->kategori)
                    ->take(3)
                    ->get();
    
    return view('public.pembangunan-detail', compact('pembangunan', 'related'));
})->name('public.pembangunan.detail');

// Routes untuk public galeri
Route::get('/galeri', [\App\Http\Controllers\GaleriPublicController::class, 'index'])->name('galeri.public');
Route::get('/galeri/{galeri}', [\App\Http\Controllers\GaleriPublicController::class, 'show'])->name('galeri.public.show');

// Routes untuk IDM DESA (Public)
Route::prefix('idm')->name('public.idm.')->group(function () {
    Route::get('/', [\App\Http\Controllers\IdmPublicController::class, 'index'])->name('index');
    Route::get('/tahun/{tahun}', [\App\Http\Controllers\IdmPublicController::class, 'indexByYear'])->name('year');
    Route::get('/detail/{tahun}', [\App\Http\Controllers\IdmPublicController::class, 'detail'])->name('detail');
    Route::get('/api', [\App\Http\Controllers\IdmPublicController::class, 'api'])->name('api');
});

// Routes untuk admin IDM DESA
Route::prefix('admin/idm')->middleware('auth')->name('admin.idm.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\IdmDesaController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\Admin\IdmDesaController::class, 'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\Admin\IdmDesaController::class, 'store'])->name('store');
    Route::get('/{idm}', [\App\Http\Controllers\Admin\IdmDesaController::class, 'show'])->name('show');
    Route::get('/{idm}/edit', [\App\Http\Controllers\Admin\IdmDesaController::class, 'edit'])->name('edit');
    Route::put('/{idm}', [\App\Http\Controllers\Admin\IdmDesaController::class, 'update'])->name('update');
    Route::delete('/{idm}', [\App\Http\Controllers\Admin\IdmDesaController::class, 'destroy'])->name('destroy');
    Route::post('/bulk-delete', [\App\Http\Controllers\Admin\IdmDesaController::class, 'bulkDestroy'])->name('bulk-delete');
});