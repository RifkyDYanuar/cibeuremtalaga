@extends('layouts.admin')

@section('title', 'Maintenance Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            <i class="fas fa-tools mr-3 text-blue-600"></i>
            Maintenance Management
        </h1>

        <!-- Current Status -->
        <div class="mb-8">
            <div class="bg-gray-50 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">Current Status</h2>
                        <div class="flex items-center space-x-4" id="status-info">
                            <!-- Status will be loaded via AJAX -->
                        </div>
                    </div>
                    <div>
                        <button onclick="checkStatus()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-sync-alt mr-2"></i>
                            Refresh Status
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Control Panel -->
        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <!-- Enable Maintenance -->
            <div class="bg-red-50 border border-red-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-red-800 mb-4">
                    <i class="fas fa-power-off mr-2"></i>
                    Enable Maintenance Mode
                </h3>
                <p class="text-red-700 mb-4">
                    This will activate maintenance mode. Only whitelisted IPs can access the site.
                </p>
                
                <form id="enable-form" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-red-700 mb-2">
                            Estimated Duration (optional)
                        </label>
                        <input type="text" id="duration" placeholder="e.g., 2 hours, 30 minutes"
                               class="w-full px-3 py-2 border border-red-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-red-700 mb-2">
                            Reason (optional)
                        </label>
                        <input type="text" id="reason" placeholder="e.g., System update, Database maintenance"
                               class="w-full px-3 py-2 border border-red-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                    </div>
                    
                    <button type="submit" class="w-full px-4 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-semibold">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Enable Maintenance Mode
                    </button>
                </form>
            </div>

            <!-- Disable Maintenance -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-green-800 mb-4">
                    <i class="fas fa-check-circle mr-2"></i>
                    Disable Maintenance Mode
                </h3>
                <p class="text-green-700 mb-4">
                    This will restore normal website operation for all users.
                </p>
                
                <button onclick="disableMaintenance()" class="w-full px-4 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors font-semibold">
                    <i class="fas fa-play mr-2"></i>
                    Disable Maintenance Mode
                </button>
            </div>
        </div>

        <!-- IP Whitelist Management -->
        <div class="bg-gray-50 rounded-lg p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                <i class="fas fa-shield-alt mr-2"></i>
                IP Whitelist Management
            </h3>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="font-medium text-gray-700 mb-2">Add IP Address</h4>
                    <div class="flex space-x-2">
                        <input type="text" id="new-ip" placeholder="192.168.1.1" 
                               class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <button onclick="addIP()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Your current IP: <span id="current-ip" class="font-mono">Loading...</span></p>
                </div>
                
                <div>
                    <h4 class="font-medium text-gray-700 mb-2">Whitelisted IPs</h4>
                    <div id="ip-list" class="space-y-2 max-h-32 overflow-y-auto">
                        <!-- IP list will be loaded via AJAX -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview & Tools -->
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('maintenance.preview') }}" target="_blank" 
               class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                <i class="fas fa-eye mr-2"></i>
                Preview Maintenance Page
            </a>
            
            <button onclick="testConnection()" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                <i class="fas fa-wifi mr-2"></i>
                Test Connection
            </button>
        </div>
    </div>
</div>

<!-- Loading Modal -->
<div id="loading-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center h-full">
        <div class="bg-white rounded-lg p-6 text-center">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mx-auto mb-4"></div>
            <p class="text-gray-700">Processing...</p>
        </div>
    </div>
</div>

<script>
// Show loading modal
function showLoading() {
    document.getElementById('loading-modal').classList.remove('hidden');
}

// Hide loading modal
function hideLoading() {
    document.getElementById('loading-modal').classList.add('hidden');
}

// Show notification
function showNotification(message, type = 'info') {
    const colors = {
        success: 'bg-green-500',
        error: 'bg-red-500',
        warning: 'bg-yellow-500',
        info: 'bg-blue-500'
    };
    
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 ${colors[type]} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform transition-transform translate-x-full`;
    notification.innerHTML = `
        <div class="flex items-center">
            <span>${message}</span>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => notification.remove(), 300);
    }, 5000);
}

// Get current IP
async function getCurrentIP() {
    try {
        const response = await fetch('/api/current-ip');
        const data = await response.json();
        document.getElementById('current-ip').textContent = data.ip;
        return data.ip;
    } catch (error) {
        document.getElementById('current-ip').textContent = 'Unknown';
        return null;
    }
}

// Check maintenance status
async function checkStatus() {
    try {
        const response = await fetch('/maintenance-status');
        const data = await response.json();
        
        const statusInfo = document.getElementById('status-info');
        if (data.enabled) {
            statusInfo.innerHTML = `
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                    <span class="text-red-700 font-semibold">Maintenance Mode Active</span>
                </div>
                ${data.reason ? `<div class="text-sm text-gray-600">Reason: ${data.reason}</div>` : ''}
                ${data.duration ? `<div class="text-sm text-gray-600">Duration: ${data.duration}</div>` : ''}
            `;
        } else {
            statusInfo.innerHTML = `
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                    <span class="text-green-700 font-semibold">Website Online</span>
                </div>
            `;
        }
    } catch (error) {
        showNotification('Failed to check status', 'error');
    }
}

// Enable maintenance mode
document.getElementById('enable-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const duration = document.getElementById('duration').value;
    const reason = document.getElementById('reason').value;
    
    if (!confirm('Are you sure you want to enable maintenance mode? This will make the website inaccessible to regular users.')) {
        return;
    }
    
    showLoading();
    
    try {
        const response = await fetch('/artisan/maintenance/on', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ duration, reason })
        });
        
        const data = await response.json();
        
        if (data.success) {
            showNotification('Maintenance mode enabled successfully', 'success');
            checkStatus();
            // Clear form
            document.getElementById('duration').value = '';
            document.getElementById('reason').value = '';
        } else {
            showNotification(data.message || 'Failed to enable maintenance mode', 'error');
        }
    } catch (error) {
        showNotification('Network error occurred', 'error');
    } finally {
        hideLoading();
    }
});

// Disable maintenance mode
async function disableMaintenance() {
    if (!confirm('Are you sure you want to disable maintenance mode?')) {
        return;
    }
    
    showLoading();
    
    try {
        const response = await fetch('/artisan/maintenance/off', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            showNotification('Maintenance mode disabled successfully', 'success');
            checkStatus();
        } else {
            showNotification(data.message || 'Failed to disable maintenance mode', 'error');
        }
    } catch (error) {
        showNotification('Network error occurred', 'error');
    } finally {
        hideLoading();
    }
}

// Add IP to whitelist
async function addIP() {
    const ip = document.getElementById('new-ip').value.trim();
    
    if (!ip) {
        showNotification('Please enter an IP address', 'warning');
        return;
    }
    
    showLoading();
    
    try {
        const response = await fetch('/artisan/maintenance/add-ip', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ ip })
        });
        
        const data = await response.json();
        
        if (data.success) {
            showNotification('IP added to whitelist', 'success');
            document.getElementById('new-ip').value = '';
            loadIPList();
        } else {
            showNotification(data.message || 'Failed to add IP', 'error');
        }
    } catch (error) {
        showNotification('Network error occurred', 'error');
    } finally {
        hideLoading();
    }
}

// Remove IP from whitelist
async function removeIP(ip) {
    if (!confirm(`Remove ${ip} from whitelist?`)) {
        return;
    }
    
    showLoading();
    
    try {
        const response = await fetch('/artisan/maintenance/remove-ip', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ ip })
        });
        
        const data = await response.json();
        
        if (data.success) {
            showNotification('IP removed from whitelist', 'success');
            loadIPList();
        } else {
            showNotification(data.message || 'Failed to remove IP', 'error');
        }
    } catch (error) {
        showNotification('Network error occurred', 'error');
    } finally {
        hideLoading();
    }
}

// Load IP whitelist
async function loadIPList() {
    try {
        const response = await fetch('/artisan/maintenance/list-ips');
        const data = await response.json();
        
        const ipList = document.getElementById('ip-list');
        if (data.ips && data.ips.length > 0) {
            ipList.innerHTML = data.ips.map(ip => `
                <div class="flex items-center justify-between bg-white px-3 py-2 rounded border">
                    <span class="font-mono text-sm">${ip}</span>
                    <button onclick="removeIP('${ip}')" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash text-sm"></i>
                    </button>
                </div>
            `).join('');
        } else {
            ipList.innerHTML = '<div class="text-gray-500 text-sm">No IPs whitelisted</div>';
        }
    } catch (error) {
        document.getElementById('ip-list').innerHTML = '<div class="text-red-500 text-sm">Failed to load IP list</div>';
    }
}

// Test connection
async function testConnection() {
    showLoading();
    
    try {
        const start = Date.now();
        const response = await fetch('/maintenance-status');
        const end = Date.now();
        
        if (response.ok) {
            showNotification(`Connection OK (${end - start}ms)`, 'success');
        } else {
            showNotification('Connection failed', 'error');
        }
    } catch (error) {
        showNotification('Connection error', 'error');
    } finally {
        hideLoading();
    }
}

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    checkStatus();
    getCurrentIP();
    loadIPList();
    
    // Auto-refresh status every 30 seconds
    setInterval(checkStatus, 30000);
});
</script>
@endsection
