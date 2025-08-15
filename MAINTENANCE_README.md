# Maintenance Mode Documentation

## Overview
Sistem maintenance mode yang flexibel untuk website Desa yang memungkinkan admin untuk mengaktifkan mode maintenance tanpa mengganggu operasi normal.

## Features
- ✅ Manual maintenance mode activation/deactivation
- ✅ IP whitelist management
- ✅ Professional maintenance page with countdown
- ✅ Admin dashboard integration
- ✅ Real-time status monitoring
- ✅ No automatic global enforcement

## How to Use

### 1. Access Maintenance Management
- Login as admin
- Go to **Admin Dashboard** → **Maintenance**
- URL: `/admin/maintenance`

### 2. Enable Maintenance Mode
1. Fill in optional duration and reason
2. Click "Enable Maintenance Mode"
3. System will create maintenance flag
4. Regular users will see maintenance page

### 3. Disable Maintenance Mode
1. Click "Disable Maintenance Mode"
2. System will remove maintenance flag
3. Website returns to normal operation

### 4. IP Whitelist Management
- **Add IP**: Enter IP address and click add
- **Remove IP**: Click trash icon next to IP
- **Current IP**: Automatically detected and displayed
- Whitelisted IPs can access site during maintenance

### 5. Artisan Commands (Alternative)
```bash
# Enable maintenance mode
php artisan maintenance:on

# Disable maintenance mode  
php artisan maintenance:off

# Check maintenance status
php artisan maintenance:status
```

## Files Structure
```
app/
├── Http/
│   ├── Controllers/
│   │   ├── MaintenanceController.php           # Public maintenance page
│   │   └── Admin/
│   │       └── MaintenanceManagementController.php  # Admin management
│   ├── Middleware/
│   │   └── MaintenanceMode.php                 # Maintenance middleware
│   └── Console/
│       └── Commands/
│           ├── MaintenanceOn.php               # Enable command
│           ├── MaintenanceOff.php              # Disable command
│           └── MaintenanceStatus.php           # Status command
resources/
├── views/
│   ├── maintenance.blade.php                   # Public maintenance page
│   └── admin/
│       └── maintenance/
│           └── manage.blade.php                # Admin management page
storage/
└── app/
    └── maintenance/
        ├── config.json                         # Maintenance config
        └── whitelist.json                      # IP whitelist
```

## Configuration Files

### maintenance/config.json
```json
{
    "enabled": true,
    "enabled_at": "2025-01-15T10:30:00.000Z",
    "duration": "2 hours", 
    "reason": "System upgrade",
    "enabled_by": "Admin Name"
}
```

### maintenance/whitelist.json
```json
[
    "127.0.0.1",
    "192.168.1.100",
    "::1"
]
```

## Routes

### Public Routes
- `GET /maintenance` - Maintenance page
- `GET /maintenance-preview` - Preview maintenance page
- `GET /maintenance-status` - Check status (JSON)

### Admin Routes (Protected)
- `GET /admin/maintenance` - Management dashboard
- `POST /artisan/maintenance/on` - Enable maintenance
- `POST /artisan/maintenance/off` - Disable maintenance
- `POST /artisan/maintenance/add-ip` - Add IP to whitelist
- `POST /artisan/maintenance/remove-ip` - Remove IP from whitelist
- `GET /artisan/maintenance/list-ips` - List whitelisted IPs

### API Routes
- `GET /api/current-ip` - Get current user IP

## Middleware Usage

### Apply to Specific Routes
```php
// In routes/web.php
Route::middleware(['maintenance'])->group(function () {
    Route::get('/some-route', [SomeController::class, 'method']);
    // Add more routes that should be affected by maintenance
});
```

### Global Application (Optional)
Uncomment line in `bootstrap/app.php`:
```php
$middleware->append(\App\Http\Middleware\MaintenanceMode::class);
```

## Security Features
- ✅ Admin-only access to management
- ✅ CSRF protection for all actions
- ✅ IP-based access control
- ✅ Automatic current IP detection
- ✅ Secure file-based configuration

## Troubleshooting

### Common Issues
1. **Can't access during maintenance**: Check if your IP is whitelisted
2. **Management page not working**: Ensure you're logged in as admin
3. **AJAX errors**: Check CSRF token in page head
4. **Files not created**: Check storage permissions

### Debug Commands
```bash
# Check current status
php artisan maintenance:status

# View config files
cat storage/app/maintenance/config.json
cat storage/app/maintenance/whitelist.json

# Check permissions
ls -la storage/app/maintenance/
```

## Best Practices
1. Always add your current IP to whitelist before enabling
2. Provide estimated duration and reason when enabling
3. Test preview page before actual maintenance
4. Use specific route groups instead of global middleware
5. Monitor system during maintenance periods

## Future Enhancements
- [ ] Scheduled maintenance activation
- [ ] Email notifications to users
- [ ] Maintenance history logging
- [ ] Multiple admin approval system
- [ ] API endpoint protection options
