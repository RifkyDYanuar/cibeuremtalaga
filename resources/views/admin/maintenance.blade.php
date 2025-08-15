@extends('layouts.admin')

@section('title', 'Maintenance Mode Control')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                <i class="fas fa-tools mr-3 text-blue-600"></i>
                Maintenance Mode Control
            </h1>
            <p class="text-gray-600 mt-2">Kelola mode maintenance website</p>
        </div>

        <!-- Current Status Card -->
        <div class="mb-8" id="status-card">
            <!-- Status will be loaded here -->
        </div>

        <!-- Control Panel -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Enable Maintenance -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-play text-red-500 text-xl mr-3"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Enable Maintenance</h2>
                </div>
                
                <form id="enable-form" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alasan Maintenance</label>
                        <textarea name="reason" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Scheduled system update...">Pemeliharaan rutin sistem</textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Estimasi Durasi</label>
                        <select name="duration" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="30 minutes">30 Menit</option>
                            <option value="1 hour">1 Jam</option>
                            <option value="2 hours" selected>2 Jam</option>
                            <option value="4 hours">4 Jam</option>
                            <option value="8 hours">8 Jam</option>
                            <option value="1 day">1 Hari</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">IP yang Diizinkan</label>
                        <input type="text" name="allowed_ips" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="127.0.0.1, 192.168.1.100" value="127.0.0.1">
                        <p class="text-xs text-gray-500 mt-1">Pisahkan dengan koma untuk multiple IP</p>
                    </div>
                    
                    <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition-colors duration-200 flex items-center justify-center">
                        <i class="fas fa-tools mr-2"></i>
                        Enable Maintenance Mode
                    </button>
                </form>
            </div>

            <!-- Disable Maintenance -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-stop text-green-500 text-xl mr-3"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Disable Maintenance</h2>
                </div>
                
                <p class="text-gray-600 mb-6">Nonaktifkan mode maintenance dan buat website dapat diakses semua pengguna.</p>
                
                <button id="disable-btn" class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition-colors duration-200 flex items-center justify-center">
                    <i class="fas fa-check mr-2"></i>
                    Disable Maintenance Mode
                </button>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8 bg-gray-50 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">
                <i class="fas fa-lightning-bolt mr-2"></i>
                Quick Actions
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <button onclick="quickMaintenance(30, 'Database optimization')" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors">
                    <i class="fas fa-database mr-2"></i>
                    DB Maintenance (30m)
                </button>
                <button onclick="quickMaintenance(120, 'System update')" class="bg-purple-500 text-white py-2 px-4 rounded-md hover:bg-purple-600 transition-colors">
                    <i class="fas fa-sync mr-2"></i>
                    System Update (2h)
                </button>
                <button onclick="quickMaintenance(60, 'Security patch')" class="bg-orange-500 text-white py-2 px-4 rounded-md hover:bg-orange-600 transition-colors">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Security Patch (1h)
                </button>
                <a href="/maintenance-preview" target="_blank" class="bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-gray-700 transition-colors text-center inline-flex items-center justify-center">
                    <i class="fas fa-eye mr-2"></i>
                    Preview Page
                </a>
            </div>
        </div>

        <!-- Artisan Commands -->
        <div class="mt-8 bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">
                <i class="fas fa-terminal mr-2"></i>
                Artisan Commands
            </h3>
            <div class="bg-gray-900 rounded-md p-4 text-green-400 font-mono text-sm space-y-2">
                <div># Enable maintenance mode</div>
                <div class="text-white">php artisan maintenance on --reason="System update" --duration="2 hours" --ips="127.0.0.1"</div>
                <div class="mt-4"># Disable maintenance mode</div>
                <div class="text-white">php artisan maintenance off</div>
                <div class="mt-4"># Check status</div>
                <div class="text-white">php artisan maintenance status</div>
            </div>
        </div>
    </div>
</div>

<!-- Loading Modal -->
<div id="loading-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-sm mx-4">
        <div class="text-center">
            <i class="fas fa-spinner fa-spin text-blue-500 text-3xl mb-4"></i>
            <p class="text-gray-700">Processing...</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    loadMaintenanceStatus();
    
    // Enable form handler
    document.getElementById('enable-form').addEventListener('submit', function(e) {
        e.preventDefault();
        enableMaintenance();
    });
    
    // Disable button handler
    document.getElementById('disable-btn').addEventListener('click', function() {
        disableMaintenance();
    });
    
    // Auto refresh status every 30 seconds
    setInterval(loadMaintenanceStatus, 30000);
});

function loadMaintenanceStatus() {
    fetch('/admin/maintenance/info')
        .then(response => response.json())
        .then(data => {
            updateStatusCard(data);
        })
        .catch(error => {
            console.error('Error loading status:', error);
        });
}

function updateStatusCard(data) {
    const statusCard = document.getElementById('status-card');
    
    if (data.maintenance) {
        const info = data.data;
        statusCard.innerHTML = `
            <div class="bg-red-50 border border-red-200 rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-exclamation-triangle text-red-500 text-2xl mr-3"></i>
                    <h2 class="text-xl font-semibold text-red-800">Maintenance Mode ACTIVE</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <strong>Enabled at:</strong> ${new Date(info.enabled_at).toLocaleString()}
                    </div>
                    <div>
                        <strong>Enabled by:</strong> ${info.enabled_by}
                    </div>
                    <div>
                        <strong>Reason:</strong> ${info.reason}
                    </div>
                    <div>
                        <strong>Duration:</strong> ${info.estimated_duration}
                    </div>
                </div>
            </div>
        `;
    } else {
        statusCard.innerHTML = `
            <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 text-2xl mr-3"></i>
                    <h2 class="text-xl font-semibold text-green-800">Website Normal - Maintenance INACTIVE</h2>
                </div>
                <p class="text-green-700 mt-2">Website dapat diakses oleh semua pengguna.</p>
            </div>
        `;
    }
}

function enableMaintenance() {
    const form = document.getElementById('enable-form');
    const formData = new FormData(form);
    
    showLoading();
    
    fetch('/admin/maintenance/enable', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            reason: formData.get('reason'),
            duration: formData.get('duration'),
            allowed_ips: formData.get('allowed_ips')
        })
    })
    .then(response => response.json())
    .then(data => {
        hideLoading();
        if (data.success) {
            showAlert('Maintenance mode enabled successfully!', 'success');
            loadMaintenanceStatus();
        } else {
            showAlert('Failed to enable maintenance mode', 'error');
        }
    })
    .catch(error => {
        hideLoading();
        showAlert('Error: ' + error.message, 'error');
    });
}

function disableMaintenance() {
    if (!confirm('Are you sure you want to disable maintenance mode?')) {
        return;
    }
    
    showLoading();
    
    fetch('/admin/maintenance/disable', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    })
    .then(response => response.json())
    .then(data => {
        hideLoading();
        if (data.success) {
            showAlert('Maintenance mode disabled successfully!', 'success');
            loadMaintenanceStatus();
        } else {
            showAlert('Failed to disable maintenance mode', 'error');
        }
    })
    .catch(error => {
        hideLoading();
        showAlert('Error: ' + error.message, 'error');
    });
}

function quickMaintenance(minutes, reason) {
    const duration = minutes < 60 ? `${minutes} minutes` : `${Math.floor(minutes/60)} hour${Math.floor(minutes/60) > 1 ? 's' : ''}`;
    
    if (!confirm(`Enable maintenance for ${duration}?\nReason: ${reason}`)) {
        return;
    }
    
    showLoading();
    
    fetch('/admin/maintenance/enable', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            reason: reason,
            duration: duration,
            allowed_ips: '127.0.0.1'
        })
    })
    .then(response => response.json())
    .then(data => {
        hideLoading();
        if (data.success) {
            showAlert(`Maintenance mode enabled for ${duration}!`, 'success');
            loadMaintenanceStatus();
        } else {
            showAlert('Failed to enable maintenance mode', 'error');
        }
    })
    .catch(error => {
        hideLoading();
        showAlert('Error: ' + error.message, 'error');
    });
}

function showLoading() {
    document.getElementById('loading-modal').classList.remove('hidden');
    document.getElementById('loading-modal').classList.add('flex');
}

function hideLoading() {
    document.getElementById('loading-modal').classList.add('hidden');
    document.getElementById('loading-modal').classList.remove('flex');
}

function showAlert(message, type) {
    const alertClass = type === 'success' ? 'bg-green-500' : 'bg-red-500';
    const alert = document.createElement('div');
    alert.className = `fixed top-4 right-4 ${alertClass} text-white px-6 py-3 rounded-lg shadow-lg z-50`;
    alert.textContent = message;
    
    document.body.appendChild(alert);
    
    setTimeout(() => {
        alert.remove();
    }, 5000);
}
</script>
@endpush
